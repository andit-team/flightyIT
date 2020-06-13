<?php

namespace App\Http\Controllers;

use Sentinel;
use App\SiteSetting;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassword;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Cms;
use Core;
use Session;

class HomeController extends Controller
{
    public function __construct(){

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $PageSlug = empty($request->segment(1)) ? 'home' : $request->segment(1);
        
        // $MatchSearchTemplate = [''];
        // $PageSlug   = in_array($PageSlug, $MatchSearchTemplate) ?  'search' : $PageSlug ; 
        	                 
        $cms        = Cms::where('post_url', $PageSlug)->first();
        if(empty($cms)){
            return view('frontend.404');
        }
        $cms = $cms->toArray();
        $post_type  = $cms['post_type'];
        $categorySlug = $request->segment(2);
        if($PageSlug === 'category' && !empty($categorySlug)){            
            $this->getCategoryPage($categorySlug);            
        } elseif( $post_type == 'Page' ) {
            return $this->getCmsPage($cms, $PageSlug);            
        } elseif($post_type == 'Post' ){
            dd($cms);
            $this->news_detail($cms);            
        } else {            
           $this->viewFrontContent( 'frontend/404' );    
        }


    }

    private function getCmsPage( $cms, $PageSlug = ''){

        if($cms['template']){
            $PageSlug = $cms['template'];//substr($cms['template'], 0, -10);
        } 
                 
        if (view()->exists('frontend.theme.'.$PageSlug)) {
            $view = 'frontend/theme/'.$PageSlug;
        } else {
             $view = 'frontend/theme/page';
        } 
        
        $cms_page                       = [ 'cms' => $cms ] ;
        $cms_page['meta_title']         = $cms['post_title'];
        $cms_page['meta_description']   = Core::short_text($cms ['seo_description'], 120);
        $cms_page['meta_keywords']      = $cms ['seo_keyword'];
        $cms_page['thumb']              = $cms ['thumb'];
        $cms_page['title']              = $cms ['post_title'];
        $cms_page['id']                 = $cms ['id'];
        $cms_page['parent_id']          = $cms ['parent_id'];
        $cms_page['content']          = $cms ['content'];
        return view($view,compact('cms_page'));
    }


































    public function login(){
        if (Sentinel::check()) {
            \Session::flash('success','Welcome to dashboard!');
            return redirect('system-admin/dashboard');
        }
        return view('admin.auth.login');
    }


    public function logout(){
        session()->forget('settings');
        session()->flush();
        Sentinel::logout(null, true);
        return redirect('/');
    }

    public function process_login(Request $request){
        if (Sentinel::check()) {
            return redirect('dashboard');
        }
        $request->validate([
            'email'     => 'required|email|exists:users,email',
            'password'  => 'required',
        ]);

        $settings = SiteSetting::first()->toArray();
        Session::push('settings', $settings);
        Session::put('locale',$settings['language']);

        $credentials = [
            "email" => $request->email,
            "password" => $request->password
        ];

        if ($request->remember) {
            $remember = true;
        } else {
            $remember = false;
        }

        try {
            if (Sentinel::authenticate($credentials, $remember)) {
                if (Sentinel::getUser()->blocked == 1) {
                    flash(__('You Have Been Blocked'))->error();
                    Sentinel::logout(null, true);
                    return redirect('login');
                }
                return redirect('system-admin/dashboard');
            } else {
                return redirect()->back()->with(['status'=>'Invlide Login Details','class'=>'danger']);
            }
        } catch (ThrottlingException $ex) {
            return redirect()->back()->with(['status'=>'Too Many Attempts! please wait 266 second.','class'=>'danger']);
        } catch (NotActivatedException $ex) {
            return redirect()->back()->with(['status'=>'Your account is not active yet!','class'=>'danger']);
        }
    }


    


    public function register(){
        if (Sentinel::check()) {
            return redirect('dashboard');
        }
        return view('frontend.register');
    }


    public function process_register(Request $request){
        if (Sentinel::check()) {
            return redirect('dashboard');
        }
        $request->validate([
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
            'rpassword' => 'required|same:password',
            'first_name' => 'required',
            'last_name' => 'required',
            'terms'     => 'accepted'
        ]);

        $credentials = array(
            "name"          => $request->first_name." ".$request->last_name,
            "email"         => $request->email,
            "password"      => $request->password,
            "first_name"    => $request->first_name,
            "last_name"     => $request->last_name,
            "created_at"    => now()
        );
        $user = Sentinel::registerAndActivate($credentials);

        $role = Sentinel::findRoleByName('Seller');
        $role->users()->attach($user);
        $msg = trans('login.success');
        return redirect('login')->with(['status'=>'Registration Success! Please Login Here.','class'=>'success']);
    }

    public function password_reset(){
        if (Sentinel::check()) {
            return redirect('dashboard');
        }
        return view('frontend.password_reset');
    }

    /*
     * Resets Password Options
     */
    public function process_password_reset(Request $request){
        if (Sentinel::check()) {
            return redirect('dashboard');
        }

        $request->validate([
            'email' => 'required|exists:users,email'
        ]);

        $credentials = ['email' => $request->email];
        $user = Sentinel::findByCredentials($credentials);
        //Sending email with code
        $reminder = Reminder::exists($user) ?: Reminder::create($user);
        $code = $reminder->code;
        $data = [
            'name'  => $user->first_name." ".$user->last_name,
            'link'  => "<a href='".url('confirm_password_reset')."/{$user->id}/{$code}'> Reset Here.</a>",
        ];
        Core::sendEmail(['to'=>$request->email,'data'=>$data,'template'=>'forget-password','attachments'=>'']);
        return redirect('login')->with(['status'=>'Link hass been send please check your email','class'=>'success']);
    }

    public function confirm_password_reset($id, $code){
        if (Sentinel::check()) {
            return redirect('dashboard');
        }
        $user = Sentinel::findById($id);
        if(Reminder::where('user_id',$id)->where('code',$code)->count() > 0){
            return view('frontend.confirm_password_reset', compact('id', 'code'));
        }else{
            return redirect('404');
        }
    }

    public function process_confirm_password_reset(Request $request, $id, $code){
        if (Sentinel::check()) {
            return redirect('dashboard');
        }
        $request->validate([
            'password' => 'required',
            'rpassword' => 'required|same:password',
        ]);
        $credentials = array(
            "email" => $request->email,
            'password' => $request->password,
        );
        $user = Sentinel::findById($id);
        if (!Reminder::complete($user, $code, $request->password)) {
            return redirect('password_reset')->with(['status'=>'Your Key is expaired or invalid','class'=>'danger']);
        }
        return redirect('login')->with(['status'=>'Your Password hass been updated!','class'=>'success']);
    }
}
