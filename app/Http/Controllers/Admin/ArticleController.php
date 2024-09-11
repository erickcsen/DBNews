<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ArticleController extends Controller
{
    
    public function index(Request $request) {
        $search = $request->input('search');
        $query = Article::with(['category','user','subcategory']);
        
        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhereHas('user', function($q) use ($search) {
                      $q->where('email', 'like', "%{$search}%");
                  });
        }

        $arts = $query->paginate(5);

        return view('admin.article.main', compact('arts'));
    }
    
    public function create() {
        $category = Category::all();
        $subcategory = Subcategory::all();
        return view('admin.article.create', compact('category', 'subcategory'));
    }

    public function upload(Request $request) {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $ext = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $ext;

            $request->file('upload')->move(public_path('storage/images/uploadArticle'), $fileName);

            $url = asset('storage/images/uploadArticle/' . $fileName);
            return response()->json(['fileName' => $fileName,'uploaded'=>1,'url'=>$url]);
        }
        return response()->json(['error' => 'No file uploaded.'], 400);
    
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'article_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'required|in:publish,draft'
        ]);
    
        $art = new Article();
        $art->title = $request->title;
        $art->slug = Str::slug($request->title);
        $art->description = $request->description; 
        $art->category_id = $request->category_id; 
        $art->subcategory_id = $request->subcategory_id; 
        $art->user_id = Auth::id(); 
        $art->views = 0;
        $art->is_active = $request->is_active; 
    
        if ($request->hasFile('article_img')) {
            $path = $request->file('article_img')->store('public/images/article');
            $art->article_img = $path;
        }
    
        $art->save();
        Alert::success('Success', 'Article added successfully');
        return redirect()->route('article.index');
    }
    
    public function edit($id) {
        $article = Article::findOrFail($id);
        $category = Category::all();
        $subcategory = Subcategory::all();
        return view('admin.article.edit', compact('article', 'category', 'subcategory'));
    }
    
    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'article_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'required|in:publish,draft'
        ]);
    
        $article = Article::findOrFail($id);
        $article->title = $request->title;
        $article->slug = Str::slug($request->title);
        $article->description = $request->description;
        $article->category_id = $request->category_id;
        $article->subcategory_id = $request->subcategory_id;
        $article->is_active = $request->is_active;
    
        if ($request->hasFile('article_img')) {
            
            // Hapus gambar lama jika ada
            if ($article->article_img && file_exists(storage_path('app/public/images/article/' . basename($article->article_img)))) {
                unlink(storage_path('app/public/images/article/' . basename($article->article_img)));
            }
            $path = $request->file('article_img')->store('public/images/article');
            $article->article_img = $path;
        }
    
        $article->save();
        Alert::success('Success', 'Article updated successfully');
        return redirect()->route('article.index');
    }

    public function destroy($id) {
        $article = Article::findOrFail($id);
    
        // Hapus gambar terkait jika ada
        if ($article->article_img && file_exists(storage_path('app/public/images/article/' . basename($article->article_img)))) {
            unlink(storage_path('app/public/images/article/' . basename($article->article_img)));
        }
    
        $article->delete();
        Alert::success('Success', 'Article deleted successfully');
        return redirect()->route('article.index');
    }
    
}
