<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Activity;
use App\Permission;
use Sentinel;
use Session;

class Core
{
    private $userId;
    // private $roleId;
    // private $userStatus;
    public function __construct()
    {
        if (Sentinel::check()) {
            $this->userId = Sentinel::getUser()->id;
            // $this->roleId = $user->role_id;
            // $this->userStatus = $user->status;
        }
    }

    public function test(){
        echo 'test-core';
    }

    public function getModule(){
        if(Sentinel::getUser()->inRole('admin')){
            return 'HMS';
        }elseif(Sentinel::getUser()->inRole('Pharmacy')){
            return 'Pharmacy';
        }elseif(Sentinel::getUser()->inRole('laboratory')){
            return 'Laboratory';
        }elseif(Sentinel::getUser()->inRole('diagnostic')){
            return 'Diagnostic';
        }
    }
    public function getUserName($id)
    {
        $user =  DB::table('users')->where('id',$id)->first();
        return $user->first_name.' '.$user->last_name;
    }
    public function isAdmin()
    {
        $user = Sentinel::getUser();
        if ($user->inRole('admin')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function ownResults($model, $user_id = 'user_id')
    {
        $user = Sentinel::getUser();
        if ($user->inRole('admin')) {
            return $model->orderBy('id', 'desc')->where('Status','Active')->get();
        } else {
            return $model->where($user_id, $this->userId)->where('Status','Active')->orderBy('id', 'desc')->get();
        }
    }
    public function ownItems($model, $user_id = "user_id")
    {
        $user = Sentinel::getUser();
        if ($user->inRole('admin')) {
            return true;
        }
        if ($model->$user_id == $this->userId) {
            return true;
        }
        abort(404);
    }

    public function roleOptions($object, $selected = "client")
    {
        $option = '';
        if (empty($object)) {
            return "<option value = ''>No Data</option>";
        }
        foreach ($object as $obj) {
            $option .= "<option value = '{$obj->slug}' ";
            $option .= ($selected == $obj->slug) ? 'selected' : '';
            $option .= ">{$obj->name}</option>";
        }

        return $option;
    }
    public function GetOptions($object, $column, $selected = 0, $id = 'id')
    {
        $option = '';
        if (empty($object)) {
            return "<option value = ''>No Data</option>";
        }
        foreach ($object as $obj) {
            $option .= "<option value = '{$obj->$id}' ";
            $option .= ($selected == $obj->$id) ? 'selected' : '';
            $option .= ">" . ucfirst($obj->$column) . "</option>";
        }

        return $option;
    }
    public function getOptionArray ($arr , $selected=NULL){
        $option = '';
        foreach($arr as $key => $val){
            // $slug = Str::slug($val,"-");
            $option .= "<option value = '{$key}'";
            $option .= ($selected == $key) ? 'selected' : '';
            $option .= ">".$val."</option>";
        }
        return $option;
    }


    public function getUniqueSlug($model, $value,$row = "slug")
    {
        $slug = Str::slug($value);
        $slugCount = count($model->whereRaw("{$row} REGEXP '^{$slug}(-[0-9]+)?$' and id != '{$model->id}'")->get());

        return ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
    }

    public function limit_text($text, $limit)
    {
        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos = array_keys($words);
            $text = substr($text, 0, $pos[$limit]) . '...';
        }
        return $text;
    }
    public function short_text($text, $limit){
        return strlen($text) > $limit ? substr($text,0,$limit).".." : $text;
    }

    public static function activities($action = "", $module = "", $notes = "")
    {
        $activity = new Activity();
        $activity->user_id = Sentinel::getUser()->id;
        $activity->name = Sentinel::getUser()->first_name . ' ' . Sentinel::getUser()->last_name;
        $activity->action = $action;
        $activity->module = $module;
        $activity->notes = $notes;
        $activity->save();
    }

    public function sendNotification($users = array(), $content = "", $url = "")
    {
        $users = ($users) ?: [$this->userId];
        foreach ($users as $id) {
            $a = [];
            $a['created_at'] = date('Y-m-d H:i:s');
            $a['user'] = $id;
            $a['content'] = $content;
            $a['is_read'] = 0;
            $a['from'] = $this->userId;
            $a['url'] = $url;
            DB::table('notifications')->insert($a);
        }

        return true;
    }
    public function countUserinRole($role_id)
    {
        return DB::table('role_users')->where('role_id', $role_id)->count();
    }

    public static function sendEmail($config = [])
    {
        $to = $config['to'];
        $data = $config['data'];
        $template = $config['template'];

        $template = DB::table('email_templates')->where('slug', $template)->first();
        if (!empty($template)) {
            $html = $template->content;
            foreach ($data as $key => $val) {
                $html = str_replace('[' . $key . ']', $val, $html);
                $template->subject = str_replace('[' . $key . ']', $val, $template->subject);
            }
            $subject = $template->subject;
            $attachments = ($config['attachments']) ?: [];

            \Mail::send("email_template.emails.email", ['content' => $html], function ($message) use ($to, $subject, $template, $attachments) {
                $message->priority(1);
                $message->to($to);

                if ($template->from_email) {
                    $from_name = ($template->from_name) ?: 'Sharif';
                    $message->from($template->from_email, $from_name);
                }

                if ($template->cc_email) {
                    $message->cc($template->cc_email);
                }

                // https://stackoverflow.com/questions/47051151/how-to-send-attachment-files-to-email-using-laravel
                if (count($attachments)) {
                    foreach ($attachments as $attachment) {
                        $message->attach($attachment);
                    }
                }

                $message->subject($subject);
            });

            DB::table('mailboxes')->insert([
                'to'            => $to,
                'from'          => $template->from_email,
                'template'      => $config['template'],
                'message'       => $html,
                'subject'       => $subject,
                // 'attachments'   => $attachments,
                'status'    => 'unread',
                'created_at'    => now(),
            ]);
        }
    }


    public function savePermission($arr,$pid = 0){
        $keys = array_keys($arr);
        $l = count($keys);
        for($i = 0; $i<$l; $i++){
            if($this->isMulti($arr[$keys[$i]]) == "TRUE"){
                $d = [
                    'name'  => $keys[$i],
                    'parent_id' => $pid,
                    'slug'  => Str::slug($keys[$i]),
                    'description' => 'Parent Item'
                ];
                $p = Permission::create($d);
                $this->savePermission($arr[$keys[$i]],$p->id);
            }else{
                $d = [
                    'name'  => $arr[$keys[$i]][0],
                    'parent_id' => $pid,
                    'slug'  => Str::slug($arr[$keys[$i]][1]),
                    'description' => $arr[$keys[$i]][2],
                ];
                $p = Permission::create($d);
            }
        }
    }


    public function isMulti($arr){
        if(is_array($arr)){
            if (count($arr) != count($arr, COUNT_RECURSIVE)) {
                return 'TRUE';
            }else{
                return 'FALSE';
            }
        }
    }

    
    //System Settings -----------------------------------------------------------------------------------------

    public function globalDateTime($timestamp){
        if (empty($timestamp)) {
            return '<span class="text-danger">No Date Time</span>';
        }
        return date('d-M-y h:i A', strtotime($timestamp));
    }
    public function dateFormat($date){
        $dateFormat = session()->get('settings')[0]['date_format'];
        return date($dateFormat,strtotime($date));
    }
    public function dateTimeFormat($date){
        // $dateFormat = session()->get('settings')[0]['date_format'];
        return date('h:i A',strtotime($date));
    }
    public function amountFormat($amount){
        // $cur = "$";
        return $amount;
    }
    public function amountFormatWithCurrency($amount,$NotZiro = 0){
        if($amount == 0){
            return ($NotZiro != '0')? '-': $this->curPosition(0);
        }
        return $this->curPosition($amount);
    }
    public function getCurrency(){
        // return '€';
        return session()->get('settings')[0]['currency_symbol'];
    }
    public function curPosition($amount){
        $cur = $this->getCurrency();
        if($amount >= 0){
            if(session()->get('settings')[0]['cur_position'] == 'before'){
                return $cur.' '.number_format($amount,2);
            }else{
                return number_format($amount,2).' '.$cur;
            }
        }
        if(session()->get('settings')[0]['cur_position'] == 'before'){
            return $cur.' ('.number_format(abs($amount),2).')';
        }else{
            return '('.number_format(abs($amount),2).') '.$cur;
        }
    }

    public function getLowQty(){
        return 10;
    }
    public function getUpcomingDate(){
        $day = 30;
        $today = date('Y-m-d H:i:s');
        return date('Y-m-d',date(strtotime("+{$day} day", strtotime($today))));
    }

    public function findIdBySlug($table, $slug){
        $data = DB::table($table)->where('slug',$slug)->first();
        if(empty($data)){return 0;}
        return $data->id;
    }

    public function getinfo($table, $item, $id)
    {
        return DB::table($table)->where($item, $id)->first();
    }


    
    public function nextBatchNumber()
    {
        $batch_number = DB::table('Core_batches')->max('batch_number');
        if (empty($batch_number)) {
            $batch_number = 0;
        }
        $batch_number = $batch_number + 1;
        return sprintf('%04d', $batch_number);
    }
    public function GenaratePatientSlug(){
        $lastProduct = DB::table('patients')->limit(1)->orderBy('id', 'DESC')->first();
        if (empty($lastProduct)) {
            return '0001';
        }
        return sprintf('%04d', $lastProduct->id + 1);
    }
    public function GenarateInvoiceNumber($table, $slug = 'sale')
    {
        $lastProduct = DB::table($table)->limit(1)->orderBy('id', 'DESC')->first();
        if (empty($lastProduct)) {
            return strtoupper($slug) . '0001';
        }
        return strtoupper($slug) . sprintf('%04d', $lastProduct->id + 1);
    }
    public function getSiteInfo()
    {
        return DB::table('site_settings')->first();
    }

    public function convertNumberToWord($num = false)
    {
        $num = str_replace(array(',', ' '), '', trim($num));
        if (!$num) {
            return 'Undefined Taka Only.';
        }
        $num = (int) $num;
        if($num == 0){
            return 'Zero Taka Only.';
        }
        $words = array();
        $list1 = array(
            '', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
            'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
        );
        $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
        $list3 = array(
            '', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
            'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
            'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
        );
        $num_length = strlen($num);
        $levels = (int) (($num_length + 2) / 3);
        $max_length = $levels * 3;
        $num = substr('00' . $num, -$max_length);
        $num_levels = str_split($num, 3);
        for ($i = 0; $i < count($num_levels); $i++) {
            $levels--;
            $hundreds = (int) ($num_levels[$i] / 100);
            $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ' ' : '');
            $tens = (int) ($num_levels[$i] % 100);
            $singles = '';
            if ($tens < 20) {
                $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '');
            } else {
                $tens = (int) ($tens / 10);
                $tens = ' ' . $list2[$tens] . ' ';
                $singles = (int) ($num_levels[$i] % 10);
                $singles = ' ' . $list1[$singles] . ' ';
            }
            $words[] = $hundreds . $tens . $singles . (($levels && (int) ($num_levels[$i])) ? ' ' . $list3[$levels] . ' ' : '');
        } //end for loop
        $commas = count($words);
        if ($commas > 1) {
            $commas = $commas - 1;
        }
        $inword = implode(' ', $words);
        return ucwords($inword . 'Taka Only.');
    }

    public function StockIncrement($table, $column, $id, $qty)
    {
        DB::table($table)->where('id', $id)->increment($column, $qty);
    }
    public function StockDecrement($table, $column, $id, $qty)
    {
        DB::table($table)->where('id', $id)->decrement($column, $qty);
    }


    

    public function getTimezones($selected = "Asia/Dhaka"){
        $option = '';
        $timezones = [
            "Africa/Abidjan",
            "Africa/Accra","Africa/Addis_Ababa","Africa/Algiers","Africa/Asmara","Africa/Asmera","Africa/Bamako","Africa/Bangui","Africa/Banjul","Africa/Bissau","Africa/Blantyre","Africa/Brazzaville","Africa/Bujumbura","Africa/Cairo","Africa/Casablanca","Africa/Ceuta","Africa/Conakry","Africa/Dakar","Africa/Dar_es_Salaam","Africa/Djibouti","Africa/Douala","Africa/El_Aaiun","Africa/Freetown","Africa/Gaborone","Africa/Harare","Africa/Johannesburg","Africa/Juba","Africa/Kampala","Africa/Khartoum","Africa/Kigali","Africa/Kinshasa","Africa/Lagos","Africa/Libreville","Africa/Lome","Africa/Luanda","Africa/Lubumbashi","Africa/Lusaka","Africa/Malabo","Africa/Maputo","Africa/Maseru","Africa/Mbabane","Africa/Mogadishu","Africa/Monrovia","Africa/Nairobi","Africa/Ndjamena","Africa/Niamey","Africa/Nouakchott","Africa/Ouagadougou","Africa/Porto-Novo","Africa/Sao_Tome",
            "Africa/Timbuktu","Africa/Tripoli","Africa/Tunis","Africa/Windhoek","AKST9AKDT","America/Adak","America/Anchorage","America/Anguilla","America/Antigua","America/Araguaina","America/Argentina/Buenos_Aires","America/Argentina/Catamarca","America/Argentina/ComodRivadavia","America/Argentina/Cordoba","America/Argentina/Jujuy","America/Argentina/La_Rioja","America/Argentina/Mendoza","America/Argentina/Rio_Gallegos","America/Argentina/Salta","America/Argentina/San_Juan","America/Argentina/San_Luis","America/Argentina/Tucuman","America/Argentina/Ushuaia","America/Aruba",
            "America/Asuncion","America/Atikokan","America/Atka","America/Bahia","America/Bahia_Banderas","America/Barbados","America/Belem","America/Belize","America/Blanc-Sablon","America/Boa_Vista",
            "America/Bogota","America/Boise","America/Buenos_Aires","America/Cambridge_Bay","America/Campo_Grande","America/Cancun","America/Caracas","America/Catamarca","America/Cayenne","America/Cayman","America/Chicago","America/Chihuahua","America/Coral_Harbour","America/Cordoba","America/Costa_Rica","America/Creston","America/Cuiaba","America/Curacao","America/Danmarkshavn","America/Dawson","America/Dawson_Creek","America/Denver","America/Detroit","America/Dominica","America/Edmonton","America/Eirunepe","America/El_Salvador","America/Ensenada","America/Fort_Wayne","America/Fortaleza","America/Glace_Bay","America/Godthab","America/Goose_Bay","America/Grand_Turk","America/Grenada","America/Guadeloupe","America/Guatemala","America/Guayaquil","America/Guyana","America/Halifax","America/Havana","America/Hermosillo","America/Indiana/Indianapolis","America/Indiana/Knox","America/Indiana/Marengo","America/Indiana/Petersburg","America/Indiana/Tell_City","America/Indiana/Vevay","America/Indiana/Vincennes","America/Indiana/Winamac","America/Indianapolis",
            "America/Inuvik","America/Iqaluit","America/Jamaica","America/Jujuy","America/Juneau","America/Kentucky/Louisville","America/Kentucky/Monticello","America/Knox_IN",
            "America/Kralendijk","America/La_Paz","America/Lima","America/Los_Angeles","America/Louisville","America/Lower_Princes","America/Maceio","America/Managua","America/Manaus","America/Marigot","America/Martinique","America/Matamoros","America/Mazatlan","America/Mendoza","America/Menominee","America/Merida","America/Metlakatla","America/Mexico_City","America/Miquelon","America/Moncton","America/Monterrey","America/Montevideo","America/Montreal","America/Montserrat","America/Nassau","America/New_York","America/Nipigon","America/Nome","America/Noronha","America/North_Dakota/Beulah","America/North_Dakota/Center","America/North_Dakota/New_Salem","America/Ojinaga",
            "America/Panama","America/Pangnirtung","America/Paramaribo","America/Phoenix","America/Port_of_Spain","America/Port-au-Prince","America/Porto_Acre",
            "America/Porto_Velho","America/Puerto_Rico","America/Rainy_River","America/Rankin_Inlet","America/Recife","America/Regina","America/Resolute","America/Rio_Branco","America/Rosario","America/Santa_Isabel","America/Santarem","America/Santiago","America/Santo_Domingo","America/Sao_Paulo","America/Scoresbysund","America/Shiprock","America/Sitka","America/St_Barthelemy","America/St_Johns","America/St_Kitts","America/St_Lucia","America/St_Thomas","America/St_Vincent","America/Swift_Current","America/Tegucigalpa","America/Thule","America/Thunder_Bay","America/Tijuana","America/Toronto","America/Tortola","America/Vancouver","America/Virgin","America/Whitehorse","America/Winnipeg","America/Yakutat","America/Yellowknife","Antarctica/Casey","Antarctica/Davis","Antarctica/DumontDUrville","Antarctica/Macquarie","Antarctica/Mawson","Antarctica/McMurdo","Antarctica/Palmer","Antarctica/Rothera","Antarctica/South_Pole","Antarctica/Syowa","Antarctica/Vostok","Arctic/Longyearbyen","Asia/Aden","Asia/Almaty","Asia/Amman","Asia/Anadyr","Asia/Aqtau","Asia/Aqtobe","Asia/Ashgabat","Asia/Ashkhabad","Asia/Baghdad","Asia/Bahrain","Asia/Baku","Asia/Bangkok","Asia/Beirut","Asia/Bishkek","Asia/Brunei","Asia/Calcutta","Asia/Choibalsan","Asia/Chongqing","Asia/Chungking","Asia/Colombo","Asia/Dacca","Asia/Damascus","Asia/Dhaka","Asia/Dili","Asia/Dubai","Asia/Dushanbe","Asia/Gaza","Asia/Harbin","Asia/Hebron","Asia/Ho_Chi_Minh","Asia/Hong_Kong","Asia/Hovd","Asia/Irkutsk","Asia/Istanbul","Asia/Jakarta","Asia/Jayapura","Asia/Jerusalem","Asia/Kabul","Asia/Kamchatka","Asia/Karachi","Asia/Kashgar","Asia/Kathmandu","Asia/Katmandu","Asia/Kolkata","Asia/Krasnoyarsk","Asia/Kuala_Lumpur","Asia/Kuching","Asia/Kuwait","Asia/Macao","Asia/Macau","Asia/Magadan","Asia/Makassar","Asia/Manila","Asia/Muscat","Asia/Nicosia","Asia/Novokuznetsk","Asia/Novosibirsk","Asia/Omsk","Asia/Oral","Asia/Phnom_Penh","Asia/Pontianak","Asia/Pyongyang","Asia/Qatar","Asia/Qyzylorda","Asia/Rangoon","Asia/Riyadh","Asia/Saigon","Asia/Sakhalin","Asia/Samarkand","Asia/Seoul","Asia/Shanghai","Asia/Singapore","Asia/Taipei","Asia/Tashkent","Asia/Tbilisi","Asia/Tehran","Asia/Tel_Aviv","Asia/Thimbu","Asia/Thimphu","Asia/Tokyo","Asia/Ujung_Pandang","Asia/Ulaanbaatar","Asia/Ulan_Bator","Asia/Urumqi","Asia/Vientiane","Asia/Vladivostok","Asia/Yakutsk","Asia/Yekaterinburg","Asia/Yerevan","Atlantic/Azores","Atlantic/Bermuda","Atlantic/Canary","Atlantic/Cape_Verde","Atlantic/Faeroe","Atlantic/Faroe","Atlantic/Jan_Mayen","Atlantic/Madeira","Atlantic/Reykjavik","Atlantic/South_Georgia","Atlantic/St_Helena","Atlantic/Stanley","Australia/ACT","Australia/Adelaide","Australia/Brisbane","Australia/Broken_Hill","Australia/Canberra","Australia/Currie","Australia/Darwin","Australia/Eucla","Australia/Hobart","Australia/LHI","Australia/Lindeman","Australia/Lord_Howe","Australia/Melbourne","Australia/North","Australia/NSW","Australia/Perth","Australia/Queensland","Australia/South","Australia/Sydney","Australia/Tasmania","Australia/Victoria","Australia/West","Australia/Yancowinna","Brazil/Acre","Brazil/DeNoronha","Brazil/East","Brazil/West","Canada/Atlantic","Canada/Central","Canada/Eastern","Canada/East-Saskatchewan","Canada/Mountain",
            "Canada/Newfoundland","Canada/Pacific","Canada/Saskatchewan","Canada/Yukon","CET","Chile/Continental","Chile/EasterIsland","CST6CDT","Cuba","EET","Egypt","Eire",
            "EST","EST5EDT","Etc./GMT","Etc./GMT+0","Etc./UCT","Etc./Universal","Etc./UTC","Etc./Zulu","Europe/Amsterdam",
            "Europe/Andorra","Europe/Athens","Europe/Belfast","Europe/Belgrade","Europe/Berlin","Europe/Bratislava","Europe/Brussels","Europe/Bucharest","Europe/Budapest","Europe/Chisinau","Europe/Copenhagen","Europe/Dublin","Europe/Gibraltar","Europe/Guernsey","Europe/Helsinki","Europe/Isle_of_Man","Europe/Istanbul","Europe/Jersey","Europe/Kaliningrad","Europe/Kiev","Europe/Lisbon","Europe/Ljubljana","Europe/London","Europe/Luxembourg","Europe/Madrid","Europe/Malta","Europe/Mariehamn","Europe/Minsk","Europe/Monaco","Europe/Moscow","Europe/Nicosia","Europe/Oslo","Europe/Paris","Europe/Podgorica","Europe/Prague","Europe/Riga","Europe/Rome","Europe/Samara","Europe/San_Marino","Europe/Sarajevo","Europe/Simferopol","Europe/Skopje","Europe/Sofia","Europe/Stockholm","Europe/Tallinn","Europe/Tirane","Europe/Tiraspol","Europe/Uzhgorod","Europe/Vaduz","Europe/Vatican","Europe/Vienna","Europe/Vilnius","Europe/Volgograd","Europe/Warsaw","Europe/Zagreb","Europe/Zaporozhye","Europe/Zurich","GB","GB-Eire","GMT","GMT+0","GMT0","GMT-0","Greenwich","Hong Kong","HST","Iceland","Indian/Antananarivo","Indian/Chagos","Indian/Christmas","Indian/Cocos","Indian/Comoro","Indian/Kerguelen","Indian/Mahe","Indian/Maldives","Indian/Mauritius","Indian/Mayotte","Indian/Reunion","Iran","Israel","Jamaica","Japan","JST-9","Kwajalein","Libya","MET","Mexico/BajaNorte","Mexico/BajaSur","Mexico/General","MST","MST7MDT","Navajo","NZ","NZ-CHAT","Pacific/Apia","Pacific/Auckland","Pacific/Chatham","Pacific/Chuuk","Pacific/Easter","Pacific/Efate","Pacific/Enderbury","Pacific/Fakaofo","Pacific/Fiji","Pacific/Funafuti","Pacific/Galapagos","Pacific/Gambier","Pacific/Guadalcanal","Pacific/Guam","Pacific/Honolulu","Pacific/Johnston","Pacific/Kiritimati","Pacific/Kosrae","Pacific/Kwajalein","Pacific/Majuro","Pacific/Marquesas","Pacific/Midway","Pacific/Nauru","Pacific/Niue","Pacific/Norfolk","Pacific/Noumea","Pacific/Pago_Pago","Pacific/Palau","Pacific/Pitcairn","Pacific/Pohnpei","Pacific/Ponape","Pacific/Port_Moresby","Pacific/Rarotonga","Pacific/Saipan","Pacific/Samoa","Pacific/Tahiti","Pacific/Tarawa","Pacific/Tongatapu","Pacific/Truk","Pacific/Wake","Pacific/Wallis","Pacific/Yap","Poland","Portugal","PRC","PST8PDT","ROC","ROK","Singapore","Turkey","UCT","Universal","US/Alaska","US/Aleutian","US/Arizona","US/Central","US/Eastern","US/East-Indiana","US/Hawaii",
            "US/Indiana-Starke","US/Michigan",
            "US/Mountain","US/Pacific","US/Pacific-New","US/Samoa",
            "UTC","WET","W-SU","Zul"
        ];

        foreach ($timezones as $val) {
            $option .= "<option value = '{$val}' ";
            $option .= ($selected == $val) ? 'selected' : '';
            $option .= ">" . ucfirst($val) . "</option>";
        }
        return $option;
    }

    public function getCurrencies ($selected = 9){
        $option = '';
        $currencies = DB::table('currencies')->get();
        foreach($currencies as $cur){
            $option .= "<option value = '{$cur->id}' ";
            $option .= ($selected == $cur->id) ? 'selected' : '';
            $option .= ">{$cur->country}-{$cur->currency}-{$cur->symbol}</option>";
        }
        return $option;
    }

    public function fileUpload($request, $input = 'image', $old = 'old_image', $path = '/uploads',$name = NULL) {
        $request->validate([
            $input => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile($input)) {
            
            if(!empty($old)){
                // dd(public_path().$request->$old);
                if(file_exists(public_path().$path.'/'.$request->$old)){

                    unlink(public_path().$path.'/'.$request->$old);
                }
            }
            $image = $request->file($input);
            $name = !empty($name) ? $name : time();
            $name = $name.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path($path);
            $image->move($destinationPath, $name);
            $url =  $path.'/'.$name;
            return $url;
        }
        if(!empty($old)){
            return $request->$old;
        }
        return '';
    }
    

}