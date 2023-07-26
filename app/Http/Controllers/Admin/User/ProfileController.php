<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Friends;
use Illuminate\Http\Request;
use SebastianBergmann\CodeUnit\FunctionUnit;
use RealRashid\SweetAlert\Facades\Alert;
use RobertSeghedi\News\Models\Article;

class ProfileController extends Controller
{
    public function index(){
        $data['menu']           = 'index';
        $data['friends_total']  = Friends::where('user_id', auth()->user()->id)->count();
        $lastArticle            = Article::where('author', auth()->user()->id)->orderByDesc('updated_at')->first();
        // dd($lastArticle);
        return view('admin.users.profile.index', [
            'data' => $data,
            'post' => $lastArticle
        ]);
    }


}
