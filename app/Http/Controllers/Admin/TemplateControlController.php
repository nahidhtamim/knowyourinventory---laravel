<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class TemplateControlController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewTemplates(){
        $templates = Template::all();
        return view('admin.template.view-templates', compact('templates'));
    }

    public function saveTemplate(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'link' => 'required',
        ));
        
        $template = new Template();
        $template->name = $request->input('name');
        $template->description = $request->input('description');
        $template->link = $request->input('link');
        $template->slug = Str::slug($request->input('name'));
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $file->move('upload/template/', $fileName);
            $template->image = $fileName; 
        }
        
        if ($request->hasFile('demo_video')) {
            $file = $request->file('demo_video');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Use original file name
            $file->move('upload/template/', $fileName);
            $template->demo_video = $fileName; 
        }        
        $template->status = $request->input('status')==true ? '1':'0';
        $template->save();
        return redirect()->back()->with('status', 'Your template has been saved');
    }

    public function editTemplate($id){
        $template = Template::Find($id);
        return view('admin.template.edit-template', compact('template'));
    }

    public function updateTemplate(Request $request, $id)
    {
        $this->validate($request, array(
            'name' => 'required',
            'description' => 'required',
        ));
        $template = Template::Find($id);
        $template->name = $request->input('name');
        $template->description = $request->input('description');
        $template->slug = Str::slug($request->input('name'));
        if($request->hasfile('image'))
        {
            $destination = 'upload/template/'.$template->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $file->move('upload/template/', $fileName);
            $template->image = $fileName; 
        }
        if ($request->hasFile('demo_video')) {

            $destination = 'upload/template/'.$template->imademo_videoge;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('demo_video');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Use original file name
            $file->move('upload/template/', $fileName);
            $template->demo_video = $fileName; 
        }   
        $template->update();
        return redirect('/admin/view-templates')->with('status', 'Your template item has been updated');
    }

    public function deleteTemplate($id){
        $template = Template::Find($id);
        $template->delete();
        return redirect('/admin/view-templates')->with('status', 'Your template item has been deleted');
    }

    public function activeTemplate($id)
    {
        $template = Template::find($id);
        $template->status = '1';
        $template->update();
        return redirect()->back()->with('status', 'template Activated');
    }

    public function deactiveTemplate($id)
    {
        $template = Template::find($id);
        $template->status = '0';
        $template->update();
        return redirect()->back()->with('warning', 'template De-activated');
    }
}
