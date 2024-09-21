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
            'description' => 'string',
            'commitment' => 'string',
        ]);

        $abt = new About();
        $abt->description = $request->description;
        $abt->commitment = $request->commitment;

        $abt->save();

        Alert::success('Success', 'About successfully');
        return redirect()->route('about.index');
    }
    
    public function edit($id) {
        $abt = About::findOrFail($id);
        return view('admin.about.edit', compact('abt'));
    }
    
    public function update(Request $request, $id) {
        $request->validate([
            'description' => 'string',
            'commitment' => 'string',
        ]);
    
        $abt = About::findOrFail($id);
        $abt->description = $request->description;
        $abt->commitment = $request->commitment;
    
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
