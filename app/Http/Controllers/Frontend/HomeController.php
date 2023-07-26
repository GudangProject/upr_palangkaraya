<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Configuration;
use App\Models\Image;
use App\Models\Prosiding\CustomerCare;
use App\Models\Prosiding\ProsidingNaskah;
use App\Models\User;
use Illuminate\Http\Request;
use Butschster\Head\Facades\Meta;
use Butschster\Head\Packages\Entities\OpenGraphPackage;
use RobertSeghedi\News\Models\Article;

class HomeController extends Controller
{
    public function index(){
        self::meta('Beranda');
        $statistics = [
            'posts' => Article::where('status', true)->get()->count(),
            'users' => User::where('status', true)->get()->count(),
            'naskah' => ProsidingNaskah::where('status', true)->get()->count(),
        ];

        $banners = array([
            'header' => Image::where('status', true)->where('category_id', 1)->orderByDesc('created_at')->get(),
            'header_right_top' => Image::where('status', true)->where('category_id', 2)->orderByDesc('created_at')->get(),
            'header_right_bottom' => Image::where('status', true)->where('category_id', 3)->orderByDesc('created_at')->get(),
            'home_center_left' => Image::where('status', true)->where('category_id', 5)->orderByDesc('created_at')->get(),
            'home_center_right' => Image::where('status', true)->where('category_id', 6)->orderByDesc('created_at')->get(),
        ]);
        // dd($banners);
        return view('frontend.home', [
            'recent'        => PagesController::recentArticles(4),
            'headline'      => PagesController::headlineArticles(),
            'events'        => PagesController::events(),
            'agenda'        => PagesController::agenda(),
            'prosidingInfo' => PagesController::prosidingInfo(),
            'news'          => PagesController::articles(12, null),
            'statistics'    => $statistics,
            'customerCare'  => CustomerCare::where('status', true)->get(),
            'banners'       => $banners

        ]);
    }

    public static function meta($title)
    {
        $web = Configuration::where('status', 1)->first();
        Meta::prependTitle($title)
                ->setContentType('text/html')
                ->setViewport('width=device-width, initial-scale=1')
                ->setDescription($web->description)
                ->setKeywords(explode(',', $web->tags))
                ->setRobots('nofollow,noindex')
                ->addMeta('author', [
                    'content' => $web->getOwner->name,
                ]);

        $og = new \Butschster\Head\Packages\Entities\OpenGraphPackage('og_meta');

        $og->setType('website')
            ->setSiteName($web->name)
            ->setTitle('Beranda')
            ->setDescription($web->description)
            ->setUrl(config('app.url'))
            ->setLocale('id_ID')
            ->addImage(asset('storage/images/logo').'/'.$web->logo);

        $og->toHtml();
        Meta::registerPackage($og);

        $card = new \Butschster\Head\Packages\Entities\TwitterCardPackage('twitter_meta');

        $card->setType('summary')
        ->setSite('@prosiding_app')
        ->setTitle($web->name)
        ->setDescription($web->description)
        ->setCreator('@prosiding_app')
        ->setImage(asset('storage/images/logo').'/'.$web->logo)
        ->addMeta('image:alt', $web->name);

        $card->toHtml();
        Meta::registerPackage($card);
    }
}
