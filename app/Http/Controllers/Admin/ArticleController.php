<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Photos;
use App\Models\Article;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ArticleView;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ArticleController extends Controller
{
    
    public function index(Request $request) {
        $search = $request->input('search');
        $query = Article::with(['category','subcategory']);
        
        $user_id = Auth::user()->id;
        $role = Auth::user()->role;
        if ($role==1) $query->whereHas('user', function($query) use ($user_id){
            $query->where("id", $user_id);
        });

        if ($search) {
            $query->where('title', 'like', "%".$search."%");
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
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'subcategory_id' => 'nullable|exists:subcategories,id',
                'article_img' => 'nullable|image',
                'article_img_txt' => 'nullable|string',
                'sumber_foto'=> 'nullable|string',
                'deskripsi_meta'=> 'nullable|string',
                'kata_kunci_meta'=> 'nullable|string',
                'is_active' => 'required|in:publish,draft'
            ]);
    
            $slug = Str::slug($request->title);
            $jumlah_slug = Article::where('slug', 'like', $slug)->count();
            $slug = ($jumlah_slug > 0) ? $slug . '' . $jumlah_slug : $slug;
            
            $art = new Article();
            $art->title = $request->title;
            $art->slug = $slug;
            $art->description = $request->description; 
            $art->sumber_foto = $request->sumber_foto;
            $art->category_id = $request->category_id; 
            $art->subcategory_id = $request->subcategory_id; 
            $art->deskripsi_meta = $request->deskripsi_meta;
            $art->kata_kunci_meta = $request->kata_kunci_meta;
            $art->user_id = Auth::id(); 
            $art->views = 0;
            $art->is_active = $request->is_active; 
        
            if ($request->hasFile('article_img')) {
                $path = $request->file('article_img')->store('public/images/article');
                $art->article_img = $path;
                /** Tambahkan Database Table Photos */
                $name = $request->file('article_img')->getClientOriginalName();
                $size = $request->file('article_img')->getSize();
                $size_txt = ($size > 1024) ? intval($size / 1024)." mb": $size ." kb";
                Photos::create([
                    "user_id" => Auth::user()->id,
                    "name" => $name,
                    "path" => $path,
                    "size" => $size,
                    "size_txt" => $size_txt
                ]);
            } else {
                if ($request->article_img_txt == null) return redirect()->route("article.create");
                $art->article_img = $request->article_img_txt;
            }
            
            $art->save();
            Alert::success('Success', 'Article added successfully');
            return redirect()->route('article.index');
        } catch(Exception $error){
            dd($error);
        }
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
            'article_img' => 'nullable|image',
            'article_img_txt' => 'nullable|string',
            'sumber_foto' => 'nullable|string',
            'deskripsi_meta' => 'nullable|string',
            'kata_kunci_meta' => 'nullable|string',
            'is_active' => 'required|in:publish,draft'
        ]);

        $slug = Str::slug($request->title);
        $jumlah_slug = Article::where('slug', 'like', $slug)->count();
        $slug = ($jumlah_slug > 1) ? $slug . '' . $jumlah_slug : $slug;

        $article = Article::findOrFail($id);
        $article->title = $request->title;
        $article->slug = $slug;
        $article->description = $request->description;
        $article->sumber_foto = $request->sumber_foto;
        $article->category_id = $request->category_id;
        $article->subcategory_id = $request->subcategory_id;
        $article->deskripsi_meta = $request->deskripsi_meta;
        $article->kata_kunci_meta = $request->kata_kunci_meta;
        $article->is_active = $request->is_active;

        if ($request->hasFile('article_img')) {

            // Hapus gambar lama jika ada
            // if ($article->article_img && file_exists(storage_path('app/public/images/article/' . basename($article->article_img)))) {
            //     unlink(storage_path('app/public/images/article/' . basename($article->article_img)));
            // }

            $path = $request->file('article_img')->store('public/images/article');
            $article->article_img = $path;

            /** Tambahkan Database Table Photos */
            $name = $request->file('article_img')->getClientOriginalName();
            $size = $request->file('article_img')->getSize();
            $size_txt = ($size > 1024) ? intval($size / 1024) . " mb" : $size . " kb";
            Photos::create([
                "user_id" => Auth::user()->id,
                "name" => $name,
                "path" => $path,
                "size" => $size,
                "size_txt" => $size_txt
            ]);
        } else {
            $article->article_img = $request->article_img_txt;
        }
    
        $article->save();
        Alert::success('Success', 'Article updated successfully');
        return redirect()->route('article.index');
    }

    public function destroy($id) {
        $article = Article::findOrFail($id);
    
        // Hapus gambar terkait jika ada
        $photo = Photos::where("path", 'like', $article->article_img)->count();
        if ($photo == 0) {
            $photo = Article::where("article_img", 'like', $article->article_img)->count();
            if ($photo == 0) {
                if ($article->article_img && file_exists(storage_path('app/public/images/article/' . basename($article->article_img)))) {
                    unlink(storage_path('app/public/images/article/' . basename($article->article_img)));
                }
            }
        }

        $article->delete();
        Alert::success('Success', 'Article deleted successfully');
        return redirect()->route('article.index');
    }
    
    public function show($id) {
        $query = Article::with(['category', 'subcategory']);

        $user_id = Auth::user()->id;
        $role = Auth::user()->role;
        if ($role == 1) $query->whereHas('user', function ($query) use ($user_id) {
            $query->where("id", $user_id);
        });

        $query->where("id", $id);

        $arts = $query->get();
        if (count($arts) == 0) return abort(404);
        
        $emails = [];
        $views = ArticleView::where("article_id", $id)->orderBy('created_at','desc')->paginate(30);
        foreach ($views as $item) {
            $email = $item->email;
            $emails[count($emails)] = $email;
        }

        $users = User::with([]);
        if (count($emails) > 0) $users->where("email",$email);
        foreach ($emails as $email) {
            $users->orWhere("email",$email);
        }

        $users = $users->get();
        return view('admin.article.detail_view', ["arts"=>$arts, "views"=>$views, "emails"=>$emails, "users"=>$users]);
    }
}
