<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class VoraAdminController extends Controller
{
	
    // Dashboard
    public function dashboard_1(){
        $page_title = 'Dashboard';
        $page_description = 'Some description for the page';
        return view('vora.dashboard.index', compact('page_title', 'page_description'));
    }
	
    // Page Error 400
    public function page_error_400(){
        $page_title = 'Page Error 400';
        $page_description = 'Some description for the page';
        return view('vora.page.error_400', compact('page_title', 'page_description'));
    }
	
    // Page Error 403
    public function page_error_403(){
        $page_title = 'Page Error 403';
        $page_description = 'Some description for the page';
        return view('vora.page.error_403', compact('page_title', 'page_description'));
    }
	
    // Page Error 404
    public function page_error_404(){
        $page_title = 'Page Error 404';
        $page_description = 'Some description for the page';
        return view('vora.page.error_404', compact('page_title', 'page_description'));
    }
	
    // Page Error 500
    public function page_error_500(){
        $page_title = 'Page Error 500';
        $page_description = 'Some description for the page';
        return view('vora.page.error_500', compact('page_title', 'page_description'));
    }
	
    // Page Error 503
    public function page_error_503(){
        $page_title = 'Page Error 503';
        $page_description = 'Some description for the page';
        return view('vora.page.error_503', compact('page_title', 'page_description'));
    }
	
    // Page Forgot Password
    public function page_forgot_password(){
        $page_title = 'Page Forgot Password';
        $page_description = 'Some description for the page';
        return view('vora.page.forgot_password', compact('page_title', 'page_description'));
    }
	
    // Page Lock Screen
    public function page_lock_screen(){
        $page_title = 'Page Lock Screen';
        $page_description = 'Some description for the page';
        return view('vora.page.lock_screen', compact('page_title', 'page_description'));
    }
	
    // Page Login
    public function page_login(){
        $page_title = 'Page Login';
        $page_description = 'Some description for the page';
        return view('vora.page.login', compact('page_title', 'page_description'));
    }
	
    // Page Register
    public function page_register(){
        $page_title = 'Page Register';
        $page_description = 'Some description for the page';
        return view('vora.page.register', compact('page_title', 'page_description'));
    }
	
    
}
