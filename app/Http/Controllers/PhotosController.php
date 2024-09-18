<?php

namespace App\Http\Controllers;

use App\Models\Photos;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    public function get_photo(Request $request){
        $search = ($request->search)? $request->search:"";
        $order_by = ($request->order_by)? $request->order_by: 'created_at desc';
        $index = ($request->index)? $request->index: 0;
        $jumlah = ($request->jumlah)? $request->jumlah : 10;
        $data = (isset($request->id)) ?
            Photos::with("user")->where("name","like", "%{$search}%")->where("id", $request->id)->orderBy(explode(' ', $order_by)[0],explode(' ', $order_by)[1])->skip($index)->take($jumlah)->get():
            Photos::with("user")->where("name", "like", "%{$search}%")->orderBy(explode(' ', $order_by)[0],explode(' ', $order_by)[1])->skip($index)->take($jumlah)->get() 
        ;

        for ($i=0; $i < count($data); $i++) { 
            $data[$i]->path = Storage::url($data[$i]->path);
        }
        return response()->json($data);
    }
    public function total_photo(Request $request){
        $search = ($request->search) ? $request->search : "";
        $data = Photos::where("name", "like", "%{$search}%")->count();
        return response()->json($data);
    }
    public function delete_photo($id){
        $data = Photos::find($id);
        if ($data==null) abort(404);
        $jumlah_dipakai = Article::where('article_img', $data->path)->count();
        if ($jumlah_dipakai == 0) {
            if (file_exists(storage_path('app/public/images/article/' . basename($data->path)))) {
                unlink(storage_path('app/public/images/article/' . basename($data->path)));
            }
            $data->delete();
        } else {
            $data->delete();
        }
        return response()->json(["hasil"=>"success"]);
    }
}
