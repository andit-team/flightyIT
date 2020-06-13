<?php

namespace App\Http\Controllers;
use Core;
use App\Cms;
use Sentinel;
use Session;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function index(){
        $cmsData = Cms::where('parent_id',0)->get();
        $cms = [];
        foreach($cmsData as $page){
            $cms[$page->id]            = $page;
            $cms[$page->id]['name']    = $page->post_title;
            $cms[$page->id]['child']   = $this->butildCMSTree( $page->id );
        }
        // dd($cms);
        return view('admin.cms.index',compact('cms'));


    }

    private function butildCMSTree( $parent_id = 0 ){
        $child =  Cms::where('parent_id', $parent_id )->where('post_type', 'page' )->get();
        return $child;
    }


    public function create(){
        return view('admin.cms.create');
    }


    public function store(Request $request,Cms $cms){
        $name = 'cms_photo_' . date('Y-m-d-H-i-s_') . rand(0, 9);
        $thumb = Core::fileUpload($request,'thumb','','/uploads/cms',$name);

        $data = [
            'user_id'       => Sentinel::getUser()->id,
            'parent_id'     => $request->parent_id,
            'post_type'     => 'page',
            'menu_name'     => $request->page_title,
            'post_title'    => $request->page_title,
            'post_url'      => Core::getUniqueSlug($cms,$request->page_url,'post_url'),//slugify($this->input->post('post_url',TRUE)),
            'content'       => $request->content,
            'seo_title'     => $request->seo_title,
            'seo_keyword'   => $request->seo_keyword,
            'seo_description' => $request->seo_description,
            'thumb'         => $thumb,
            'template'      => $request->template,
            'status'        => $request->status,
            'page_order'    => $request->page_order,
            'created_at'    => now()
        ];

        $cms->create($data);

        Session::flash('success','Page Added Succeed!');
        Core::activities("Added", "Page", "Added a New Page");
        return redirect('system-admin/cms');
    }

    public function edit(Cms $cm){
        return view('admin.cms.edit',compact('cm'));
    }


    public function update(Request $request,Cms $cm){
        // dd($request->all());
        $name = 'cms_photo_' . date('Y-m-d-H-i-s_') . rand(0, 9);
        $thumb = Core::fileUpload($request,'thumb','old_thumb','/uploads/cms',$name);
        $post_url = Core::getUniqueSlug($cm,$request->page_url,'post_url');
        $data = [
            'parent_id'     => $request->parent_id,
            'menu_name'     => $request->page_title,
            'post_title'    => $request->page_title,
            'post_url'      => $post_url,
            'content'       => $request->content,
            'seo_title'     => $request->seo_title,
            'seo_keyword'   => $request->seo_keyword,
            'seo_description' => $request->seo_description,
            'thumb'         => $thumb,
            'template'      => $request->template,
            'status'        => $request->status,
            'page_order'    => $request->page_order,
            'updated_at'    => now()
        ];

        $cm->update($data);

        Session::flash('success','Page Update Succeed!');
        Core::activities("Updated", "Page", "Update ".$post_url." New Page");
        return redirect("system-admin/cms/{$post_url}/edit");
    }
}
