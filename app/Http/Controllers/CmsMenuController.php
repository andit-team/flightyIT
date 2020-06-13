<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CmsMenuController extends Controller
{
    public function index(Request $request){
        $id = !empty($request->id) ? $request->id : 0;
        return view('admin.cms.menu.menu',compact($id));
    }
}
