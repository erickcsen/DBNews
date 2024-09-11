<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');
        $query = ad::with(['user']);
        
        if ($search) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhereHas('user', function($q) use ($search) {
                      $q->where('email', 'like', "%{$search}%");
                  });
        }

        $ads = $query->paginate(5);
        
        return view('admin.ad.main', compact('ads'));
    }

    public function create() {
        return view('admin.ad.create');
    }

    public function store(Request $request) {
        
        $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'required|string',
            'position' => 'required|string',
            'ad_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'required|in:publish,draft'
        ]);

        $ad = new Ad();
        $ad->title = $request->title;
        $ad->link = $request->link;
        $ad->position = $request->position;
        $ad->user_id = Auth::id();
        $ad->is_active = $request->is_active;

        if ($request->hasFile('ad_img')) {
            $path = $request->file('ad_img')->store('public/images/ad');
            $ad->ad_img = $path;
        }

        $ad->save();

        Alert::success('Success', 'Ad added successfully');
        return redirect()->route('ad.index');
    }
    
    public function edit($id) {
        $ad = Ad::findOrFail($id);
        return view('admin.ad.edit', compact('ad'));
    }
    
    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|string|max:255',
            'position' => 'required|string',
            'link' => 'required|string',
            'ad_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'required|in:publish,draft'
        ]);
    
        $ad = Ad::findOrFail($id);
        $ad->title = $request->title;
        $ad->link = $request->link;
        $ad->position = $request->position;
        $ad->user_id = Auth::id();
        $ad->is_active = $request->is_active; 
    
        if ($request->hasFile('ad_img')) {
            
            // Hapus gambar lama jika ada
            if ($ad->ad_img && file_exists(storage_path('app/public/images/ad/' . basename($ad->ad_img)))) {
                unlink(storage_path('app/public/images/ad/' . basename($ad->ad_img)));
            }
            $path = $request->file('ad_img')->store('public/images/ad');
            $ad->ad_img = $path;
        }
    
        $ad->save();
        Alert::success('Success', 'ad updated successfully');
        return redirect()->route('ad.index');
    }
    
    public function destroy($id) {
        $ad = Ad::findOrFail($id);
    
        // Hapus gambar terkait jika ada
        if ($ad->ad_img && file_exists(storage_path('app/public/images/ad/' . basename($ad->ad_img)))) {
            unlink(storage_path('app/public/images/ad/' . basename($ad->ad_img)));
        }
    
        $ad->delete();
        Alert::success('Success', 'ad deleted successfully');
        return redirect()->route('ad.index');
    }
}
