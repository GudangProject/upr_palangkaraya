<?php

namespace App\Http\Controllers\Admin\Prosiding;

use App\Http\Controllers\Controller;
use App\Models\Prosiding\Event as ProsidingEvent;
use Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RobertSeghedi\News\Models\Article;

class ProsidingController extends Controller
{

    public function info()
    {
        return view('admin.prosiding.info.index');
    }

    public function infoDetail($slug)
    {
        return view('admin.prosiding.info.detail', [
            'data' => Article::where('slug', $slug)->first()
        ]);
    }

    public function seminar()
    {
        return view('admin.prosiding.seminar.index');
    }

    public function seminarDetail($slug)
    {
        return view('admin.event.detail', [
            'data' => ProsidingEvent::where('slug', $slug)->first()
        ]);
    }

    public function sertifikat()
    {
        return view('admin.prosiding.certificate.public-certificate');
    }

    public function prosidingNasional(){
        return view('admin.prosiding.link.index');
    }

    public function template(){
        return view('admin.prosiding.template');
    }
}
