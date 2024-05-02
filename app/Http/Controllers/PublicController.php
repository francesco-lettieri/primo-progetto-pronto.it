<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home() {

        $announcements=Announcement::where('is_accepted', true)->take(6)->orderBy('created_at','desc')->get();
        return view('welcome',compact('announcements'));
}


public function show(Category $category) {
    // dd($category->announcements->where('is_accepted', true));
    $announcements= $category->announcements->where('is_accepted', true);
    return view('show',compact('category','announcements'));
}


    public function search(Request $request){
        $announcements=Announcement::search($request->searched)->paginate(10);
        // dd($announcements);
        return view('announcement.index', compact('announcements'));
    }
  
    public function setLanguage($lang){
      
        session()->put('locale',$lang);
        return redirect()->back();
    }

}