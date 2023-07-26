<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Frontend\PagesController;
use App\Models\Admin\Configuration;
use Butschster\Head\Facades\Meta;
use RobertSeghedi\News\Models\Article;

class ScreensController extends Controller
{
    public function posts(Request $request, PagesController $page){
        HomeController::meta('Artikel');
        return view('frontend.articles.index', [
            'data'      => $page->articles(12, $request->page),
            'headline'  => $page->headlineArticles(),
        ]);
    }

    public function tags(PagesController $page, $slug){
        HomeController::meta('Tags');

        return view('frontend.tags.index', [
            'slug'      => $slug,
            'headline'  => $page->headlineArticles(),
        ]);
    }

    public function seminarNasional(Request $request, PagesController $page){
        HomeController::meta('Seminar Nasional');

        return view('frontend.events.nasional');
    }

    public function seminarInternasional(Request $request, PagesController $page){
        HomeController::meta('Seminar Internasional');

        return view('frontend.events.internasional');
    }


}
