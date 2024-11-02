<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Photos;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class FileManagerController extends Controller
{
    public function index(Request $request) {

        $search = ($request->search) ? $request->search : "";
        $order_by = ($request->order_by) ? $request->order_by : 'created_at desc';
        $data = Photos::with("user")->
                where("name", "like", "%{$search}%")->
                orderBy(
                    explode(' ', $order_by)[0], 
                    explode(' ', $order_by)[1]
                )->paginate(10);

        for ($i = 0; $i < count($data); $i++) {
            $data[$i]->path = Storage::url($data[$i]->path);
        }
        
        return view("admin.filemanager.main", ["data"=>$data]);
    }

    public function create() {
        return view('admin.filemanager.create');
    }

    public function store(Request $request){
        try {
            $request->validate([
                'article_img' => 'required|image',
            ]);

            if ($request->hasFile('article_img')) {
                $path = $request->file('article_img')->store('public/images/article');
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
            }

            return redirect()->route('filemanager.index');
        } catch (Exception $error) {
            Alert::error('Error', $error->getMessage());
            return redirect()->back()->withErrors($error->getMessage())->withInput();
        }
    }

    public function show($id) {
        $data = Photos::with("user")->
                where("id", $id)->
                get()->
                first();

        return view("admin.filemanager.show", ["data" => $data]);
    }

    public function destroy($id)
    {
        $data = Photos::find($id);
        if ($data == null) {
            Alert::error('Error', 'Photos not found');
            return redirect()->back()->withErrors("Photos not found")->withInput();
        }
        $jumlah_dipakai = Article::where('article_img', $data->path)->count();
        if ($jumlah_dipakai == 0) {
            if (file_exists(storage_path('app/public/images/article/' . basename($data->path)))) {
                unlink(storage_path('app/public/images/article/' . basename($data->path)));
            }
            $data->delete();
        } else {
            $data->delete();
        }
        Alert::success('Success', 'Photos deleted successfully');
        return redirect()->route('filemanager.index');
    }
}
