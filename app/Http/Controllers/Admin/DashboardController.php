<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Configuration;
use Illuminate\Http\Request;
use App\Models\Friends;
use App\Models\Prosiding\Agenda;
use App\Models\Prosiding\CustomerCare;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;
use Stevebauman\Location\Facades\Location;

class DashboardController extends Controller
{
    public function index(Request $request){
       
        $ip = $request->ip();

        $friendListId = Friends::where('user_id', auth()->user()->id)->pluck('friend_id');
        $data = array(
            'home' => [
                'date' => Carbon::now()->Format('D, d M Y'),
                'time' => Carbon::now()->Format('g:i A'),
                // 'currentUserInfo' => Location::get($ip),
                'currentUserInfo' => 0,
            ]
        );

        // dd($data);
        return view('admin.dashboard', [
            'data' => $data,
            'config' => Configuration::where('status', 1)->first(),
            'friendListAdd' => User::where('status', 1)->whereNotIn('id', $friendListId)->limit(7)->get(),
            'customerCare' => CustomerCare::where('status', true)->get(),
            'agendas' => Agenda::orderByDesc('created_at')->where('status', true)->where('date', '>=', Carbon::now())->get(),
        ]);

        
    }
}