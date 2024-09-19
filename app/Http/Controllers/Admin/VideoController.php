<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class VideoController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');
        $query = Video::with(['category','user']);

        $user_id = Auth::user()->id;
        $role = Auth::user()->role;

        if ($role == 1) $query->whereHas('user', function ($query) use ($user_id) {
            $query->where("id", $user_id);
        });
        
        if ($search) {
            $query->where('title', 'like', "%{$search}%");
        }

        $vids = $query->paginate(5);
        
        return view('admin.video.main', compact('vids'));
    }
    
    public function create() {
        $cat = Category::all();
        return view('admin.video.create', compact('cat'));
    }



    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'is_active' => 'required|in:publish,draft',
            'kata_kunci_meta' => 'nullable|string',
        ]);
    
        $vid = new Video();
        $vid->title = $request->title;
        $vid->link = $request->link;
        $vid->slug = Str::slug($request->title);
        $vid->description = $request->description; 
        $vid->category_id = $request->category_id; 
        $vid->kata_kunci_meta = $request->kata_kunci_meta; 
        $vid->user_id = Auth::id();
        $vid->is_active = $request->is_active;
        $vid->views = 0;
    
    
        $vid->save();
        Alert::success('Success', 'Video added successfully');
        return redirect()->route('video.index');
    }

    public function edit($id) {
        $video = Video::findOrFail($id);
        $categories = Category::all();
        return view('admin.video.edit', compact('video', 'categories'));
    }
    
    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'kata_kunci_meta' => 'nullable|string',
            'is_active' => 'required|in:publish,draft'
        ]);
    
        $vid = Video::findOrFail($id);
        $vid->title = $request->title;
        $vid->link = $request->link;
        $vid->slug = Str::slug($request->title);
        $vid->description = $request->description; 
        $vid->category_id = $request->category_id;
        $vid->kata_kunci_meta = $request->kata_kunci_meta; 
        $vid->user_id = Auth::id();
        $vid->is_active = $request->is_active; 

        $vid->save();
        Alert::success('Success', 'Video updated successfully');
        return redirect()->route('video.index');
    }
    
    public function destroy($id) {
        $video = Video::findOrFail($id);
    
        $video->delete();
        Alert::success('Success', 'Video deleted successfully');
        return redirect()->route('video.index');
    }
}
