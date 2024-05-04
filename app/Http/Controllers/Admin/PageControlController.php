<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class pageControlController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewPages(){
        $pages = Page::all();
        return view('admin.page.view-pages', compact('pages'));
    }

    public function savepage(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
        ));
        
        $page = new Page();
        $page->name = $request->input('name');
        $page->description = $request->input('description');
        $page->meta_tag = $request->input('meta_tag');
        $page->slug = Str::slug($request->input('name'));
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $file->move('upload/page/', $fileName);
            $page->image = $fileName; 
        }
        $page->status = $request->input('status')==true ? '1':'0';
        $page->save();
        return redirect()->back()->with('status', 'Your page has been saved');
    }

    public function editpage($id){
        $page = Page::Find($id);
        return view('admin.page.edit-page', compact('page'));
    }

    public function updatepage(Request $request, $id)
    {
        $this->validate($request, array(
            'name' => 'required',
            'description' => 'required',
        ));
        $page = Page::Find($id);
        $page->name = $request->input('name');
        $page->description = $request->input('description');
        $page->meta_tag = $request->input('meta_tag');
        $page->slug = Str::slug($request->input('name'));
        if($request->hasfile('image'))
        {
            $destination = 'upload/page/'.$page->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $file->move('upload/page/', $fileName);
            $page->image = $fileName; 
        }
        $page->update();
        return redirect('/admin/view-pages')->with('status', 'Your page item has been updated');
    }

    public function deletepage($id){
        $page = Page::Find($id);
        $page->delete();
        return redirect('/admin/view-pages')->with('status', 'Your page item has been deleted');
    }

    public function activepage($id)
    {
        $page = Page::find($id);
        $page->status = '1';
        $page->update();
        return redirect()->back()->with('status', 'page Activated');
    }

    public function deactivepage($id)
    {
        $page = Page::find($id);
        $page->status = '0';
        $page->update();
        return redirect()->back()->with('warning', 'page De-activated');
    }
}
