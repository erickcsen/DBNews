<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleView;
use App\Models\Comment;
use App\Models\HomeView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $query = Article::with(['category', 'user', 'subcategory'])->get();
        
        // Ambil alamat IP pengguna
        $ipAddress = request()->ip();

        // Cek jika IP sudah mengakses halaman utama
        $pageViewExists = HomeView::where('ip_address', $ipAddress)->exists();

        if (!$pageViewExists) {
            // Jika IP belum mengakses halaman utama, tambahkan catatan IP
            HomeView::create([
                'ip_address' => $ipAddress,
            ]);
        }

        // Hitung total IP unik untuk halaman utama
        $totalVisitor = HomeView::count();

        return view('home', compact('query', 'totalVisitor'));
    }

    public function detail($id)
{
    $article = Article::with(['category', 'user', 'subcategory', 'comments.replies.user'])->findOrFail($id);

    // Ambil alamat IP pengguna
    $ipAddress = request()->ip();
    
    // Ambil alamat email pengguna jika terautentikasi
    $userEmail = auth()->check() ? auth()->user()->email : null;

    // Cek jika IP sudah melihat artikel ini
    $viewExists = ArticleView::where('article_id', $id)
        ->where('ip_address', $ipAddress)
        ->where(function ($query) use ($userEmail) {
            // Jika ada email pengguna, tambahkan juga kondisi untuk email
            if ($userEmail) {
                $query->where('email', $userEmail);
            }
        })
        ->exists();

    if (!$viewExists) {
        // Jika IP belum melihat artikel ini, tambahkan tampilan dan catat IP
        $article->increment('views');
        ArticleView::create([
            'article_id' => $id,
            'ip_address' => $ipAddress,
            'email' => $userEmail ? $userEmail : 'Not logged in'
        ]);
    }

    // Kembalikan tampilan detail artikel
    return view('detail', compact('article'));
}


    
    public function storeComment(Request $request, $articleId)
    {
        $request->validate([
            'comment_text' => 'required|string',
        ]);

        $article = Article::findOrFail($articleId);
        $article->comments()->create([
            'user_id' => auth()->id(),
            'comment_text' => $request->input('comment_text'),
        ]);

        return redirect()->route('detail', $articleId);
    }

    public function replyComment(Request $request, $commentId)
    {
        $request->validate([
            'reply_text' => 'required|string',
        ]);

        $parentComment = Comment::findOrFail($commentId);

        // Create the reply comment
        $reply = new Comment();
        $reply->comment_text = $request->input('reply_text');
        $reply->user_id = auth()->id();
        $reply->article_id = $parentComment->article_id;
        $reply->parent_id = $parentComment->id;
        $reply->save();

        return redirect()->route('detail', $parentComment->article_id);
    }

    public function deleteComment($id)
    {
        $comment = Comment::findOrFail($id);

        // Ensure only the owner or admin can delete
        if (auth()->id() === $comment->user_id || auth()->user()->role == 1) {
            $comment->delete();
        }

        return redirect()->back();
    }
}
