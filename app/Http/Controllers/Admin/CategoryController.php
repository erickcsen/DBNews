<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');
        $query = Category::with(['user','subcategories']);
        
        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhereHas('user', function($q) use ($search) {
                      $q->where('email', 'like', "%{$search}%");
                  });
        }

        $cats = $query->paginate(5);
        
        return view('admin.category.main', compact('cats'));
    }

    public function create() {
        $cat = Category::all();
        return view('admin.category.create', compact('cat'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|unique:categories,name',
            'is_active' => 'required|in:publish,draft'
        ]);

        $cat = new Category();
        $cat->name = $request->name;
        $cat->slug = Str::slug($request->name);
        $cat->user_id = Auth::id();
        $cat->is_active = $request->is_active; 

        $cat->save();

        Alert::success('Success', 'Category addded successfully');
        return redirect()->route('category.index');
    }

    public function edit($id) {
        $cat = Category::findOrFail($id);
        return view('admin.category.edit', compact('cat'));
    }
    
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:255',
            'is_active' => 'required|in:publish,draft'
        ]);
    
        $cat = Category::findOrFail($id);
        $cat->name = $request->name;
        $cat->slug = Str::slug($request->name);
        $cat->user_id = Auth::id();
        $cat->is_active = $request->is_active; 

        $cat->save();
        Alert::success('Success', 'category updated successfully');
        return redirect()->route('category.index');
    }

    public function destroy($id) {
        $cat = Category::findOrFail($id);

        $cat->delete();
        Alert::success('Success', 'category deleted successfully');
        return redirect()->route('category.index');
    }
}
