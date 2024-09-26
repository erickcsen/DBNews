<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Carbon\Carbon;
use App\Models\User;
use App\Models\About;
use App\Models\Video;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Category;
use App\Models\HomeView;
use App\Models\ArticleView;
use App\Models\Subcategory;
use App\Models\ArticleShare;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\VideoView;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as Request2;

class VisitorsController extends Controller
{
    public function home(Request2 $request){
        $ads_side = Ad::where("position","side")->inRandomOrder()->paginate(10);
        $ads_bottom = Ad::where("position", "bottom")->inRandomOrder()->paginate(10);
        $category = VisitorsController::category_menu();

        $youtube_video = 
            Video::with(["category","user"])->
                orderBy("id", "desc")->
                paginate(3);

        $article = 
            Article::with(["category","user","subcategory"])->
                orderBy("id", "desc")->
                paginate(1);

        $today_headline = 
            Article::with(["category","user","subcategory"])->
                orderBy("created_at", "desc")->
                paginate(2);

        $berita_terpopuler = 
            Article::with(["category","user","subcategory"])->
                orderBy("views", "desc")->
                paginate(3);

        $berita_terbaru = 
            Article::with(["category","user","subcategory"])->
                orderBy("id", "desc")->
                paginate(3);

        // Mendapatkan tanggal satu minggu yang lalu
        $oneWeekAgo = Carbon::now()->subWeek();
        $berita_terbaik_mingguan = 
            Article::with(["category","user","subcategory"])
                ->where("created_at",">=", $oneWeekAgo)
                ->orderBy("views", "desc")->paginate(4);

        $randomCategory = Category::whereHas('article')->with(["article"])->inRandomOrder()->first();

        $randomArticle = 
            Article::with(["category","user","subcategory"]);
        if ($randomCategory)
            $randomArticle = $randomArticle->
                whereHas("category", function ($query) use ($randomCategory) {
                    $query->where('id', $randomCategory->id);
                });
        $randomArticle = $randomArticle->orderBy("views", "desc")->paginate(5);

        // Ambil alamat IP pengguna
        $ipAddress = $request->header('X-Forwarded-For');
        // X-Forwarded-For mungkin berisi beberapa IP yang dipisahkan oleh koma
        // Biasanya IP pertama adalah IP asli pengunjung
        $ipAddress = explode(',', $ipAddress)[0];
        $ipAddress = ($ipAddress=="")?request()->ip() : $ipAddress;

        // Cek jika IP sudah mengakses halaman utama
        $pageViewExists = HomeView::where('ip_address', $ipAddress)->exists();

        if (!$pageViewExists) {
            // Jika IP belum mengakses halaman utama, tambahkan catatan IP
            HomeView::create([
                'ip_address' => $ipAddress,
            ]);
        }

        $response = response()->view('visitors/home', [
            "ads_side"=>$ads_side,
            "ads_bottom"=>$ads_bottom,
            "category"=>$category,
            "article" => $article,
            "today_headline" => $today_headline,
            "berita_terpopuler" => $berita_terpopuler,
            "berita_terbaru" => $berita_terbaru,
            "youtube_video" => $youtube_video,
            "berita_terbaik_mingguan" => $berita_terbaik_mingguan,
            "randomArticle" => $randomArticle,
            "randomCategory" => $randomCategory
        ]);

        $response->headers->set('Content-Security-Policy', "frame-ancestors 'self' https://www.youtube.com");
        // dd($response);

        return $response;
    }
    public function about_us(){
        $category = Category::with(['subcategories'])->whereHas("article")->get(); // Category Menu

        /** Data Dummy */
        $TextAbout = "".
            "DB News adalah bagian dari keluarga besar DB Klik, yang memiliki sejarah panjang dalam industri distribusi IT. Dimulai pada tahun 2004 dengan nama DataBaru Computer, DB Klik berfokus pada bisnis distribusi tradisional dan secara resmi berdiri di Surabaya pada tahun 2018. Melihat potensi yang berkembang di sektor IT, DB Klik terus berinovasi dan memperluas pasar, membangun reputasi yang solid dalam industri. <br><br>".
            "Berdasarkan pengalaman dan reputasi DB Klik, DB News diluncurkan untuk menyediakan berita terbaru dan paling dapat diandalkan dalam berbagai bidang, seperti news, hiburan, lifestyle, sport, dan tech. Kami bertujuan untuk memberikan informasi yang akurat dan relevan, serta menjaga Anda tetap terhubung dengan perkembangan terkini dari berbagai sektor. <br><br>".
            "Dalam kerangka ini, DB News juga berfungsi sebagai ruang bagi kaum muda Indonesia untuk berkreasi dan berkontribusi. Kami menyajikan berbagai program diskusi, laporan, opini, serta interaksi melalui kanal digital kami. Di era digital ini, jejak digital sangat penting, dan kami ingin menyebarluaskan energi positif serta inspirasi yang dapat membentuk dan mempengaruhi masyarakat. <br><br>".
            "DB News adalah tempat untuk bertukar ide dan gagasan. Kami menjunjung tinggi idealisme, keberagaman, kritisisme, dan toleransi, serta mendorong setiap individu untuk berperan aktif. Setiap zaman memiliki cerita sendiri, dan kami berharap dapat berkontribusi dalam membentuk wajah dan identitas negeri ini. <br>".
        "";

        $AudienceReached = "12k+";
        $TopArticles = "120+";
        $VisitorGrowth = "38%";
        $ActiveReader = "3k+";
        $Phone = "628999373777";

        $Commitments = "".
            "Kami berkomitmen untuk terus menyediakan artikel dan berita berita terbaru yang pastinya sangat informatif, relevan dan memastikan Anda selalu mendapatkan informasi-informasi terkini.".
        "";
        /** Data Dummy */

        $about_value = About::orderBy("id","desc")->paginate(1);
        if(count($about_value) > 0){
            $value = $about_value[0];
            $TextAbout = $value->description;
            // $AudienceReached = $value->;
            // $TopArticles = $value->;
            // $VisitorGrowth = $value->;
            // $ActiveReader = $value->;
            // $Phone = $value->;
            $Commitments = $value->commitment;
        }

        $TopArticles = Article::where("views",">","0")->count();
        $AudienceReached = 0;
        $ActiveReader = 0;

        // Mendapatkan jumlah view penonton dan pembaca
        $sql = 'select count(DISTINCT ip_address) + count(DISTINCT email) jumlah from video_views vv;';
        $Audience = DB::select($sql);
        $sql = 'select count(DISTINCT ip_address) + count(DISTINCT email) jumlah from article_views;';
        $Reader = DB::select($sql);

        $AudienceReached = (count($Audience) > 0) ? $Audience[0]->jumlah : 0;
        $ActiveReader = (count($Reader) > 0) ? $Reader[0]->jumlah : 0;

        // Mendapatkan view bulan saat ini dan bulan lalu
        $sql = '
            select 
	            count(ip_address) jumlah_pengunjung, 
                DATE_FORMAT(av.created_at,"%m") tanggal
            from 
                article_views av
            GROUP BY DATE_FORMAT(av.created_at,"%m") 
            ORDER BY DATE_FORMAT(av.created_at,"%m") DESC 
            LIMIT 0,2;
        ';
        $sql2 = '
            select 
	            count(hv.ip_address) jumlah_pengunjung, 
                DATE_FORMAT(hv.created_at,"%m") tanggal
            from 
                home_views hv 
            where 
            hv.ip_address <> (
                select 
                    av.ip_address
                from 
                    article_views av
                where av.ip_address = hv.ip_address 
                GROUP BY av.ip_address
            ) and 
            hv.ip_address <> (
                select 
                    vv.ip_address
                from 
                    video_views vv
                where vv.ip_address = hv.ip_address 
                GROUP BY vv.ip_address
            ) 
            GROUP BY DATE_FORMAT(hv.created_at,"%m") 
            ORDER BY DATE_FORMAT(hv.created_at,"%m") DESC 
            LIMIT 0,2;
        ';
        $sql3 = '
            select 
	            count(ip_address) jumlah_pengunjung, 
                DATE_FORMAT(vv.created_at,"%m") tanggal
            from 
                video_views vv
            where
                vv.ip_address <> (
                    select 
                        av.ip_address
                    from 
                        article_views av
                    where av.ip_address = vv.ip_address 
                    GROUP BY av.ip_address
                ) and 
                vv.ip_address <> (
                    select 
                        hv.ip_address
                    from 
                        home_views hv
                    where vv.ip_address = hv.ip_address 
                    GROUP BY vv.ip_address
                )  
            GROUP BY DATE_FORMAT(vv.created_at,"%m") 
            ORDER BY DATE_FORMAT(vv.created_at,"%m") DESC 
            LIMIT 0,2;
        ';

        // Memperlihat view Article dan Video
        $hasil__view_article = DB::select($sql);
        $hasil_view_home = DB::select($sql2);
        $hasil_view_video = DB::select($sql3);
        
        $jumlah_bulan_ini = (count($hasil__view_article) > 0) ? $hasil__view_article[0]->jumlah_pengunjung : 0;
        $jumlah_bulan_ini += (count($hasil_view_home) > 0) ? $hasil_view_home[0]->jumlah_pengunjung : 0;
        $jumlah_bulan_ini += (count($hasil_view_video) > 0) ? $hasil_view_video[0]->jumlah_pengunjung : 0;

        $jumlah_bulan_lalu = (count($hasil__view_article) > 1) ? $hasil__view_article[1]->jumlah_pengunjung : 0;
        $jumlah_bulan_lalu += (count($hasil_view_home) > 1) ? $hasil_view_home[1]->jumlah_pengunjung : 0;
        $jumlah_bulan_lalu += (count($hasil_view_video) > 1) ? $hasil_view_video[1]->jumlah_pengunjung : 0;

        // Menampilkan Jumlah Pengunjung
        $VisitorGrowth = ($jumlah_bulan_lalu>0)?intval(($jumlah_bulan_ini / $jumlah_bulan_lalu)*100)."%":(0)."%";
        
        return view('visitors.about_us',
            [
                "category" => $category,
                "AudienceReached"=>$AudienceReached,
                "TopArticles"=>$TopArticles,
                "VisitorGrowth"=>$VisitorGrowth,
                "ActiveReader"=>$ActiveReader,
                "TextAbout"=>$TextAbout,
                "Commitments"=>$Commitments,
                "Phone"=>$Phone,
            ]
        );
    }
    public function read_article(Request2 $request, $id){
        $ads_side = Ad::where("position", "side")->inRandomOrder()->paginate(10);
        $category = VisitorsController::category_menu();

        $article = Article::with(["category","user","subcategory"])->where(
            "slug",$id
        )->first();

        if (!($article)) {
            abort(404, "Not Found");
        } else {
            $id = $article->id;
        }

        $berita_terbaru =
            Article::with(["category","user","subcategory"])->orderBy("id", "desc")->paginate(5);
        $rekomendasi_berita =
            Article::with(["category","user","subcategory"])->orderBy("views", "desc")->paginate(5);
        $vidio = 
            Video::with(["category","user"])->orderBy("id", "desc")->paginate(5);
        $comments = Comment::whereNull("parent_id")
            ->where("article_id",$id)
            ->orderBy("created_at","desc")->paginate(5);
            
        $fullUrl = Request::fullUrl();

        // Ambil alamat IP pengguna
        $ipAddress = $request->header('X-Forwarded-For');
        // X-Forwarded-For mungkin berisi beberapa IP yang dipisahkan oleh koma
        // Biasanya IP pertama adalah IP asli pengunjung
        $ipAddress = explode(',', $ipAddress)[0];
        $ipAddress = ($ipAddress=="")?request()->ip() : $ipAddress;

        // Cek jika IP sudah melihat artikel ini
        $viewExists = ArticleView::where('article_id', $id)
            ->where('ip_address', $ipAddress)
            ->exists();

        if (!$viewExists && !Auth::check()) {
            // Jika IP belum melihat artikel ini, tambahkan tampilan dan catat IP
            $article->increment('views');
            ArticleView::create([
                'article_id' => $id,
                'ip_address' => $ipAddress,
            ]);
        } 
        
        if(Auth::check()) {
            $viewExists = ArticleView::where('article_id', $id)
                ->where('email', Auth::user()->email)
                ->exists();
            if(!$viewExists){
                $article->increment('views');
                ArticleView::create([
                    'article_id' => $id,
                    'email' => Auth::user()->email,
                ]);
            }
        }

        return view("visitors.read_article", [
            "ads_side" => $ads_side,
            "category" => $category,
            "article"=>$article,
            "berita_terbaru"=>$berita_terbaru,
            "rekomendasi_berita"=>$rekomendasi_berita,
            "vidio"=>$vidio,
            "comments" => $comments,
            "fullUrl"=> $fullUrl
        ]);
    }
    public function read_article_share(Request2 $request, $id){
        $article = Article::with(["category", "user", "subcategory"])->find($id);
        if (!($article)) {
            abort(404, "Not Found");
        }

        // Ambil alamat IP pengguna
        $ipAddress = $request->header('X-Forwarded-For');
        // X-Forwarded-For mungkin berisi beberapa IP yang dipisahkan oleh koma
        // Biasanya IP pertama adalah IP asli pengunjung
        $ipAddress = explode(',', $ipAddress)[0];
        $ipAddress = ($ipAddress=="")?request()->ip() : $ipAddress;
        $ipAddress = $ipAddress == "" ? request()->ip() : $ipAddress;

        // Cek jika IP sudah melihat artikel ini
        $viewExists = ArticleShare::where('article_id', $id)
            ->where('ip_address', $ipAddress)
            ->exists();

        if (!$viewExists && !Auth::check()) {
            // Jika IP belum melihat artikel ini, tambahkan tampilan dan catat IP
            $article->increment('share');
            ArticleShare::create([
                'article_id' => $id,
                'ip_address' => $ipAddress,
            ]);
        }

        if (Auth::check()) {
            $viewExists = ArticleShare::where('article_id', $id)
                ->where('email', Auth::user()->email)
                ->exists();
            if (!$viewExists) {
                $article->increment('share');
                ArticleShare::create([
                    'article_id' => $id,
                    'email' => Auth::user()->email,
                ]);
            }
        }

        $id = $article->id;
        $updated_article = Article::findOrFail($id);
        $updated_article->share = $article->share;
        $updated_article->save();
        return response()->json(["success"=>true,"share_number"=>$updated_article->share]);
    }
    public function watch_vidio(Request2 $request, $id){
        $category = VisitorsController::category_menu();

        $youtube_video = Video::with(["category","user"])->where('slug',$id)->first();
        if (!($youtube_video)) {
            abort(404, "Not Found");
        }
        
        $id = $youtube_video->id;
        $video_terbaru = Video::with(["category","user"])->
            orderBy("id", "desc")->paginate(5);

        $fullUrl = Request::fullUrl();

        $ads_side = Ad::where("position", "side")->inRandomOrder()->paginate(10);

        // Ambil alamat IP pengguna
        $ipAddress = $request->header('X-Forwarded-For');
        // X-Forwarded-For mungkin berisi beberapa IP yang dipisahkan oleh koma
        // Biasanya IP pertama adalah IP asli pengunjung
        $ipAddress = explode(',', $ipAddress)[0];
        $ipAddress = ($ipAddress=="")?request()->ip() : $ipAddress;

        // Cek jika IP sudah melihat artikel ini
        $viewExists = VideoView::where('video_id', $id)
        ->where('ip_address', $ipAddress)
            ->exists();

        if (!$viewExists && !Auth::check()) {
            // Jika IP belum melihat artikel ini, tambahkan tampilan dan catat IP
            $youtube_video->increment('views');
            VideoView::create([
                'video_id' => $id,
                'ip_address' => $ipAddress,
            ]);
        }

        if (Auth::check()) {
            $viewExists = VideoView::where('video_id', $id)
            ->where('email', Auth::user()->email)
                ->exists();
            if (!$viewExists) {
                $youtube_video->increment('views');
                VideoView::create([
                    'video_id' => $id,
                    'email' => Auth::user()->email,
                ]);
            }
        }

        return view("visitors.watch_vidio", [
            "category" => $category,
            "youtube_video" => $youtube_video,
            "video_terbaru" => $video_terbaru,
            "fullUrl" => $fullUrl,
            "ads_side" => $ads_side
        ]);
    }
    public function visit_category($category_type){
        $category = VisitorsController::category_menu();
        
        $today_headline = Article::whereHas("category", function ($query) use ($category_type) {
            $query->where('name', $category_type);
        })->orderBy("created_at","desc")->first();

        $article = Article::whereHas("category", function ($query) use ($category_type) {
            $query->where('name',$category_type);
        })->orderBy("id", "desc")->paginate(8);

        $berita_terbaru = Article::with(["category","user","subcategory"])->orderBy("id", "desc")->paginate(4);

        $youtube_video = Video::whereHas("category", function ($query) use ($category_type) {
            $query->where('name',$category_type);
        })->orderBy("id", "desc")->paginate(10);

        $youtube_video_terbaru = Video::with(["category","user"])->orderBy("id", "desc")->paginate(4);

        $sub_category_type = [];
        if (count($article) == 0 && count($youtube_video) == 0) {
            abort(404, "Not Found");
        } else {
            $sub_category_type = Category::with(["subcategories"])
                ->where(["name"=>$category_type])
                ->first()->subcategories;
            $category_id = Category::with(["subcategories"])
                ->where(["name" => $category_type]);
            foreach ($sub_category_type as $item) {
                $subcategory_name = $item->name;
                $item->article = Article::whereHas("subcategory", function ($query) use ($subcategory_name) {
                    $query->where('name', $subcategory_name);
                })->where("category_id", $category_id)->orderBy("id", "desc")->paginate(8);
            }
        }

        $ads_bottom = Ad::where("position", "bottom")->inRandomOrder()->paginate(10);

        return view('visitors.category',[
            "today_headline"=>$today_headline,
            "category" => $category,
            "category_selected" => $category_type,
            "berita_terbaru" => $berita_terbaru,
            "article" => $article,
            "youtube_video" => $youtube_video,
            "youtube_video_terbaru" => $youtube_video_terbaru,
            "sub_category_type" => $sub_category_type,
            "ads_bottom" => $ads_bottom,
        ]);
    }
    public function sub_category($category_type, $sub_category_type){
        $category = VisitorsController::category_menu();
        $article = Article::whereHas("subcategory", function ($query) use ($sub_category_type) {
            $query->where('name', $sub_category_type);
        })->orderBy("id","desc")->paginate(8);

        if (count($article) == 0 ) {
            abort(404, "Not Found");
        }
        
        return view('visitors.sub_category',[
            "category" => $category,
            "category_selected" => $category_type,
            "sub_category_selected" => $sub_category_type,
            "article" => $article,
        ]);
    }
    public function visit_list_category_article($category_type) {
        $category = VisitorsController::category_menu();
        $article = Article::whereHas("category", function ($query) use ($category_type) {
            $query->where('name', $category_type);
        })->orderBy("id", "desc")->paginate(8);

        if (count($article) == 0) {
            abort(404, "Not Found");
        }

        return view('visitors.category_list_article', [
            "category" => $category,
            "category_selected" => $category_type,
            "article" => $article,
        ]);
    }
    public function visit_list_category_video($category_type) {
        $category = VisitorsController::category_menu();

        $youtube_video = Video::whereHas("category", function ($query) use ($category_type) {
            $query->where('name', $category_type);
        })->orderBy("id", "desc")->paginate(8);

        if (count($youtube_video) == 0) {
            abort(404, "Not Found");
        }

        return view('visitors.category_list_video', [
            "category" => $category,
            "category_selected" => $category_type,
            "youtube_video" => $youtube_video,
        ]);
    }
    public function berita_terpopuler(){
        $category = VisitorsController::category_menu();

        $article =
            Article::with(["category", "user", "subcategory"])->orderBy("views", "desc")->paginate(8);
        if (!($article)) {
            abort(404, "Not Found");
        }

        return view('visitors.berita_terpopuler',[
            "article"=>$article,
            "category" => $category,
        ]);
    }
    public function berita_terbaru(){
        $category = VisitorsController::category_menu();

        $article =
            Article::with(["category", "user", "subcategory"])->orderBy("id", "desc")->paginate(8);
        if (!($article)) {
            abort(404, "Not Found");
        }

        return view('visitors.berita_terbaru', [
            "article" => $article,
            "category" => $category,
        ]);
    }
    public function berita_terbaik_mingguan(){
        $category = VisitorsController::category_menu();

        // Mendapatkan tanggal satu minggu yang lalu
        $oneWeekAgo = Carbon::now()->subWeek();
        
        $article = 
            Article::with(["category", "user", "subcategory"])
            ->where("created_at",">=", $oneWeekAgo)
            ->orderBy("views", "desc")->paginate(8);
        if (!($article)) {
            abort(404, "Not Found");
        }

        return view('visitors.berita_terbaik_mingguan', [
            "article" => $article,
            "category" => $category,
        ]);
    }
    public function youtube_video(){
        $category = VisitorsController::category_menu();

        $youtube_video =
            Video::with(["category", "user"])->orderBy("id", "desc")->paginate(8);
        
        return view('visitors.youtube_video', [
            "youtube_video" => $youtube_video,
            "category" => $category,
        ]);
    }
    public function pencarian(){
        $category = VisitorsController::category_menu();

        // Mengambil data dari form
        $data = Request::all(); // atau $request->input('field_name')
        $txt_pencarian = (isset($data["txt_pencarian"]))? $data["txt_pencarian"]:""; // --> dapatkan data txt_pencarian
        $urut = (isset($data["urut"]))?$data["urut"]:""; // --> dapatkan data urut
        $pilih_kategori = (isset($data["pilih_kategori"]))? $data["pilih_kategori"]:""; // --> dapatkan data pilih_kategori
        // return response($data, 200); // Melihat isi respon dari data text yang dikirimkan

        $orderBy = "views";
        if ($urut == "baru") $orderBy="created_at";


        // Enable query logging
        $article = Article::with(["category", "user", "subcategory"])->where(function ($query) use ($txt_pencarian) {
            $query->where('title', 'like', "%{$txt_pencarian}%")
            ->orWhere('kata_kunci_meta', 'like', "%{$txt_pencarian}%");
        });
        
        $youtube_video =
            Video::with(["category", "user"])->where(function ($query) use ($txt_pencarian) {
            $query->where('title', 'like', "%{$txt_pencarian}%")
            ->orWhere('kata_kunci_meta', 'like', "%{$txt_pencarian}%");
        });

        if ($pilih_kategori != "" && $pilih_kategori!=null) {
            $article = $article->whereHas("category", function ($query) use ($pilih_kategori) {
                $query->where('name', $pilih_kategori);
            });
            $article = $article->orWhere('description', 'like', "%{$txt_pencarian}%");
            $article = $article->whereHas("category", function ($query) use ($pilih_kategori) {
                $query->where('name', $pilih_kategori);
            });
            $youtube_video = $youtube_video->whereHas("category", function ($query) use ($pilih_kategori) {
                $query->where('name', $pilih_kategori);
            });
            $youtube_video = $youtube_video->orWhere('description', 'like', "%{$txt_pencarian}%");
            $youtube_video = $youtube_video->whereHas("category", function ($query) use ($pilih_kategori) {
                $query->where('name', $pilih_kategori);
            });
        }

        $article = $article->orderBy($orderBy, "desc")->paginate(4);
        $youtube_video = $youtube_video->orderBy("id", "desc")->paginate(4);

        return view('visitors.pencarian', [
            "category" => $category,
            "article" => $article, 
            "youtube_video" => $youtube_video, 
            "txt_pencarian" => $txt_pencarian,
            "data" => $data
        ]);
    }
    public function login() {
        $category = VisitorsController::category_menu();
        return view('visitors.login',[
            "category"=>$category
        ]);
    }
    public function register() {
        $category = VisitorsController::category_menu();
        return view('visitors.register', [
            "category" => $category
        ]);
    }
    public function check_email_for_change_password(){
        $category = VisitorsController::category_menu();
        return view('visitors.check_email_for_change_password', [
            "category" => $category
        ]);
    }
    public function reset_password(Request2 $request){
        $category = VisitorsController::category_menu();
        return view('visitors.reset_password', [
            "category" => $category,
            "request" => $request
        ]);
    }
    public function category_menu(){
        return Category::with(['subcategories'])->whereHas("article")->get();
    }
    private function api_football_get_country($name){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'apiv3.apifootball.com/?action=get_countries&APIkey=' . env("API_FOOTBALL"),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $result = json_decode($response);
        $result_filter = null;
        foreach ($result as $item) {
            if (isset($item->country_name))
                if (strtolower($item->country_name) == strtolower($name)) return $item;
        }
    }
    private function api_football_get_leagues($date_start, $date_end, $country_id){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apiv3.apifootball.com/?action=get_leagues&from='.$date_start.'&to='.$date_end.'&country_id='.$country_id.'&APIkey='.env("API_FOOTBALL"),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $result = json_decode($response);
        return $result;
    }
    private function api_football_get_events($date_start, $date_end, $league_id){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apiv3.apifootball.com/?action=get_events&from='.$date_start.'&to='.$date_end.'&APIkey='.env('API_FOOTBALL').'&league_id='. $league_id. '&timezone=Asia/Jakarta',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $result = json_decode($response);
        return $result;
    }
    public function api_jadwal_olahraga(){
        /** Jadwal Club Negara Indonesia */
        $country_name = "indonesia";
        $date_start = date("Y-m-d");
        $date_end = date("Y-m-d", strtotime('+1 days'));
        $country_id = VisitorsController::api_football_get_country($country_name);
        $country_id = (isset($country_id->country_id))? $country_id->country_id : 0;
        $leagues = VisitorsController::api_football_get_leagues($date_start, $date_end, $country_id);
        
        $events = [];
        foreach ($leagues as $league) {
            if (isset($league->league_id)){
                $events_league = VisitorsController::api_football_get_events($date_start, $date_end, $league->league_id);
                if (isset($events_league->error));
                else $events[count($events)] = $events_league;
            }
        }

        /** Jadwal Pertandingan Negara */
        if (count($events) == 0) {
            $country_name = "Worldcup";
            $date_start = date("Y-m-d");
            $date_end = date("Y-m-d", strtotime('+1 days'));
            $country_id = VisitorsController::api_football_get_country($country_name);
            $country_id = (isset($country_id->country_id)) ? $country_id->country_id : 0;
            $leagues = VisitorsController::api_football_get_leagues($date_start, $date_end, $country_id);
    
            $events = [];
            foreach ($leagues as $league) {
                if (isset($league->league_id)) {
                    $events_league = VisitorsController::api_football_get_events($date_start, $date_end, $league->league_id);
                    if (isset($events_league->error));
                    else $events[count($events)] = $events_league;
                }
            }
        }
        /** Jadwal Pertandingan Negara  */

        return response()->json([
            "country_name"=>$country_name,
            "date_start"=>$date_start,
            // "country_id"=>$country_id, 
            // "leagues"=> $leagues, 
            "events"=>$events
        ]);
    }
    public function api_jadwal_olahraga_indonesia(){
        /** Jadwal Club Negara Indonesia */
        $country_name = "indonesia";
        $date_start = date("Y-m-d");
        $date_end = date("Y-m-d", strtotime('+1 days'));
        $country_id = 59;
        // $country_id = VisitorsController::api_football_get_country($country_name);
        // $country_id = (isset($country_id->country_id)) ? $country_id->country_id : 0;
        $leagues = VisitorsController::api_football_get_leagues($date_start, $date_end, $country_id);

        $events = [];
        foreach ($leagues as $league) {
            if (isset($league->league_id)) {
                $events_league = VisitorsController::api_football_get_events($date_start, $date_end, $league->league_id);
                if (isset($events_league->error));
                else $events[count($events)] = $events_league;
            }
        }

        $indonesian_schedule = $events;
        return response()->json([
            "indonesian_schedule"=>$indonesian_schedule
        ]);
    }
    public function api_jadwal_olahraga_world_cup(){
        /** Jadwal Club Pertandingan Negara */
        $country_name = "Worldcup";
        $date_start = date("Y-m-d");
        $date_end = date("Y-m-d", strtotime('+1 days'));
        // $country_id = 8;
        $country_id = VisitorsController::api_football_get_country($country_name);
        $country_id = (isset($country_id->country_id)) ? $country_id->country_id : 0;
        $leagues = VisitorsController::api_football_get_leagues($date_start, $date_end, $country_id);

        $events = [];
        foreach ($leagues as $league) {
            if (isset($league->league_id)) {
                $events_league = VisitorsController::api_football_get_events($date_start, $date_end, $league->league_id);
                if (isset($events_league->error));
                else $events[count($events)] = $events_league;
            }
        }

        $worldcup_schedule = $events;
        return response()->json([
            "worldcup_schedule" => $worldcup_schedule
        ]);
    }
    public function jadwal_olahraga(){
        $category = VisitorsController::category_menu();
        return view('visitors.jadwal_olahraga', [
            "category" => $category
        ]);
    }
}
