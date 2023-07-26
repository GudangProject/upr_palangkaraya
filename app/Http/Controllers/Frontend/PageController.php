<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Prosiding\Event;
use Illuminate\Http\Request;
use RobertSeghedi\News\Models\Article;
use Illuminate\Support\Facades\Cache;
use Butschster\Head\Facades\Meta;

class PageController extends Controller
{
    public static function article($slug){
        $id = Article::where('slug', $slug)->first();
        if($id){
            $data = Cache::remember('article-'.$id->id, 60 * 60, function () use($slug) {
                $row = Article::where('slug', $slug)->first();
                return $row;
            });

            return $data;
        }else{
            abort(404);
        }
    }

    public static function seminar($slug){
        $id = Event::where('slug', $slug)->first();
        if($id){
            $data = Cache::remember('article-'.$id->id, 60 * 60, function () use($slug) {
                $row = Event::where('slug', $slug)->first();
                return $row;
            });

            return $data;
        }else{
            abort(404);
        }
    }
}
