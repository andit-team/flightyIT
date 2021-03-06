<?php

namespace App\Http\Controllers;

use App\SiteSetting;
use Core;
use Sentinel;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('authorized');
    }

    public function general(){
        // if (!Sentinel::hasAccess('siteSetting-edit')) {Session::flash('error', 'Permission Denied!'); return redirect()->back();}
        $siteSetting = SiteSetting::first();
        return view('admin.site_settings.general', compact('siteSetting'));
    }

    public function generalUpdate(Request $request, SiteSetting $siteSetting){


        $logo           = Core::fileUpload($request,'logo','old_logo','uploads/siteSettings','site-logo');
        $login_banar    = Core::fileUpload($request,'login_banar','old_login_banar','uploads/siteSettings','site-login-banar');
        $reg_banar      = Core::fileUpload($request,'reg_banar','old_reg_banar','uploads/siteSettings','site-reg-banar');

        $data = [
            'site_name'      => $request->site_name,
            'logo'           => $logo,
            'login_banar'    => $login_banar,
            'reg_banar'      => $reg_banar,
            'email'          => $request->email,
            'phone_number'   => $request->phone_number,
            'address'        => $request->address,
            'footer_text'    => $request->footer,
            'updated_at'     => now(),
        ];
        \DB::table('site_settings')->where('id', 1)->update($data);

        session()->forget('settings');
        $settings = SiteSetting::first()->toArray();
        Session::push('settings', $settings);

        Session::flash('success', 'Setting Updated Succeed!');
        Core::activities("Update", "", "Updated site setting");
        return redirect('system-admin/settings/system-setting/general');
    }


    public function site(){
        // if (!Sentinel::hasAccess('siteSetting-edit')) {Session::flash('error', 'Permission Denied!'); return redirect()->back();}
        $siteSetting = SiteSetting::first();
        return view('admin.site_settings.site', compact('siteSetting'));
    }

    public function siteUpdate(Request $request){
        $validatedData = $request->validate([
            'language'                  => 'required',
            'timezone'                  => 'required',
            'currency'                  => 'required',
            'cur_position'              => 'required',
            'date_format'               => 'required',
            'sale_prefix'               => 'required',
            'purchase_prefix'           => 'required',
            'transaction_prefix'        => 'required',
            'bank_transaction_prefix'   => 'required',
            'sale_return_prefix'        => 'required',
            'purchase_return_prefix'    => 'required',
            'batch_prefix'              => 'required',
            'sale_tax'                  => 'required|numeric',
            'purchase_tax'              => 'required|numeric',
            'prefix_diagnostic_bill'              => 'required',
            'voucher_type'              => 'required',
        ]);
        $data = [
            'language'                  => $request->language,
            'timezone'                  => $request->timezone,
            'currency'                  => $request->currency,
            'cur_position'              => $request->cur_position,
            'currency_symbol'           => DB::table('currencies')->where('id',$request->currency)->first()->symbol,
            'date_format'               => $request->date_format,
            'sale_prefix'               => $request->sale_prefix,
            'purchase_prefix'           => $request->purchase_prefix,
            'transaction_prefix'        => $request->transaction_prefix,
            'bank_transaction_prefix'   => $request->bank_transaction_prefix,
            'sale_return_prefix'        => $request->sale_return_prefix,
            'purchase_return_prefix'    => $request->purchase_return_prefix,
            'batch_prefix'              => $request->batch_prefix,
            'sale_tax'                  => $request->sale_tax,
            'purchase_tax'              => $request->purchase_tax,
            'voucher_type'              => $request->voucher_type,
            'prefix_diagnostic_bill'  => $request->prefix_diagnostic_bill,
            'updated_at'                => now(),
        ];
        \DB::table('site_settings')->where('id', 1)->update($data);

        session()->forget('settings');
        session()->forget('locale');
        Session::put('locale',$request->language);
        $settings = SiteSetting::first()->toArray();
        Session::push('settings', $settings);

        Session::flash('success', 'Setting Updated Succeed!');
        Core::activities("Update", "", "Updated site setting");
        return redirect('system-admin/settings/system-setting/site');

    }


    private function validateForm($request){
        $validatedData = $request->validate([
            'title'     => 'required',
            // 'logo'      => 'required',
            'footer'    => 'required',
        ]);
    }
}
