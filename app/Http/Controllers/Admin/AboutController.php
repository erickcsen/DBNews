<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AboutController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');
        $query = About::query(); 
    
        if ($search) {
            $query->where('title', 'like', "%{$search}%");
        }
    
        $abts = $query->paginate(5);
        
        return view('admin.about.main', compact('abts'));
    }

    public function create() {
        return view('admin.about.create');
    }

    public function store(Request $request) {
        
        $request->validate([
            'title' => 'required|string|max:255',
            'audience' => 'required|string',
            'reader' => 'required|string',
            'top_article' => 'required|string',
            'visitor' => 'required|string',
            'description' => 'required|string',
            'commitment' => 'required|string',
            'alamat' => 'required|string',
            'telepon' => 'required|string',
            'instagram' => 'required|string',
            'facebook' => 'required|string',
            'tiktok' => 'required|string',
            'x' => 'required|string',
            'about_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $abt = new About();
        $abt->title = $request->title;
        $abt->audience = $request->audience;
        $abt->reader = $request->reader;
        $abt->top_article = $request->top_article;
        $abt->visitor = $request->visitor;
        $abt->description = $request->description;
        $abt->commitment = $request->commitment;
        $abt->alamat = $request->alamat;
        $abt->telepon = $request->telepon;
        $abt->instagram = $request->instagram;
        $abt->facebook = $request->facebook;
        $abt->tiktok = $request->tiktok;
        $abt->x = $request->x;

        if ($request->hasFile('about_img')) {
            $path = $request->file('about_img')->store('public/images/about');
            $abt->about_img = $path;
        }

        $abt->save();

        Alert::success('Success', 'About About successfully');
        return redirect()->route('about.index');
    }
    
    public function edit($id) {
        $abt = About::findOrFail($id);
        return view('admin.about.edit', compact('abt'));
    }
    
    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|string|max:255',
            'audience' => 'required|string',
            'reader' => 'required|string',
            'top_article' => 'required|string',
            'visitor' => 'required|string',
            'description' => 'required|string',
            'commitment' => 'required|string',
            'alamat' => 'required|string',
            'telepon' => 'required|string',
            'instagram' => 'required|string',
            'facebook' => 'required|string',
            'tiktok' => 'required|string',
            'x' => 'required|string',
            'about_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $abt = About::findOrFail($id);
        $abt->title = $request->title;
        $abt->audience = $request->audience;
        $abt->reader = $request->reader;
        $abt->top_article = $request->top_article;
        $abt->visitor = $request->visitor;
        $abt->description = $request->description;
        $abt->commitment = $request->commitment;
        $abt->alamat = $request->alamat;
        $abt->telepon = $request->telepon;
        $abt->instagram = $request->instagram;
        $abt->facebook = $request->facebook;
        $abt->tiktok = $request->tiktok;
        $abt->x = $request->x;
    
        if ($request->hasFile('about_img')) {
            
            // Hapus gambar lama jika ada
            if ($abt->about_img && file_exists(storage_path('app/public/images/about/' . basename($abt->about_img)))) {
                unlink(storage_path('app/public/images/about/' . basename($abt->about_img)));
            }
            $path = $request->file('about_img')->store('public/images/about');
            $abt->about_img = $path;
        }
    
        $abt->save();
        Alert::success('Success', 'About updated successfully');
        return redirect()->route('about.index');
    }
    
    public function destroy($id) {
        $abt = About::findOrFail($id);
    
        // Hapus gambar terkait jika ada
        if ($abt->about_img && file_exists(storage_path('app/public/images/about/' . basename($abt->about_img)))) {
            unlink(storage_path('app/public/images/about/' . basename($abt->about_img)));
        }
    
        $abt->delete();
        Alert::success('Success', 'About deleted successfully');
        return redirect()->route('about.index');
    }
}
