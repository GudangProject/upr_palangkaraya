<?php

namespace App\Http\Controllers;

use App\Models\Friends;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FriendsController extends Controller
{
    public function add($id){
        $user = User::find($id);

        Friends::create([
            'user_id' => auth()->user()->id,
            'friend_id' => $id,
            'relationship_type' => 'New Friend',
            'status' => 1
        ]);
        Alert::toast($user->name.' be friend', 'success');
        return back();
    }

    public function friends(){
        $data['menu'] = 'friends';
        $data['friends_total']  = Friends::where('user_id', auth()->user()->id)->count();
        $data['friends_list']   = Friends::where('user_id', auth()->user()->id)->orderByDesc('created_at')->paginate('10');

        return view('admin.users.profile.friends',['data' => $data]);
    }

    public function unfriends($id){
        Friends::find($id)->forceDelete();
        Alert::toast('Unfriend successfully', 'success');
        return back();
    }
}
