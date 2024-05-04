<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\ThemeInfo;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function adminIndex()
    {
        $pages = Page::where('status', '1')->get();
        $color = ThemeInfo::Find('1');
        return view('admin.admin-dashboard', compact('pages', 'color'));
    }

    public function updateColor(Request $request, $id)
    {
        $this->validate($request, array(
            'data' => 'required',
        ));
        $color = ThemeInfo::Find($id);
        $color->data = $request->input('data');
        $color->update();
        return redirect()->back()->with('status', 'Theme Color Updated Successfully');
    }
}
