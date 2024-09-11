<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SubcategoryController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');
        $query = Subcategory::with(['category','user']);
        
        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhereHas('user', function($q) use ($search) {
                      $q->where('email', 'like', "%{$search}%");
                  });
        }

        $scats = $query->paginate(5);
        
        return view('admin.subcategory.main', compact('scats'));
    }

    public function create() {
        $cat = Category::all();
        return view('admin.subcategory.create', compact('cat'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id'
        ]);
    
        $scat = new Subcategory();
        $scat->name = $request->name;
        $scat->category_id = $request->category_id; 
        $scat->user_id = Auth::id();

        $scat->save();
        Alert::success('Success', 'Sub category added successfully');
        return redirect()->route('subcategory.index');
    }
    
    public function edit($id) {
        $scat = Subcategory::findOrFail($id);
        $categories = Category::all();
        return view('admin.subcategory.edit', compact('scat', 'categories'));
    }
    
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id'
        ]);
    
        $scat = Subcategory::findOrFail($id);
        $scat->name = $request->name;
        $scat->category_id = $request->category_id; 
        $scat->user_id = Auth::id();
    
        $scat->save();
        Alert::success('Success', 'Subcategory updated successfully');
        return redirect()->route('subcategory.index');
    }
    
    public function destroy($id) {
        $scat = Subcategory::findOrFail($id);
    
        $scat->delete();
        Alert::success('Success', 'Sub category deleted successfully');
        return redirect()->route('subcategory.index');
    }
}
