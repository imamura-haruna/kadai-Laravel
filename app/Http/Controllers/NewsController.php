<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 追記
use App\News;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        //全てのnewsテーブルを取得し、カッコの中の値（キー）でソート（並び替え、sortByDesc：降順、sortBy：昇順）する。
        $posts = News::all()->sortByDesc('updated_at');
        
        if (count($posts) > 0) {
            
            //$postsの配列の最初のデータを削除し、その値を返し$headlineに代入する。
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        // news/index.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
        return view('news.index', ['headline' => $headline, 'posts' => $posts]);
    }
}
