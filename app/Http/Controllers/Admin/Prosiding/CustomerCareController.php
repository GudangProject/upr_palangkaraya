<?php

namespace App\Http\Controllers\Admin\Prosiding;

use App\Http\Controllers\Controller;
use App\Models\Prosiding\CustomerCare;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerCareController extends Controller
{
    public function index()
    {
        return view('admin.prosiding.cs.index');
    }

    public function create()
    {
        $cs     = CustomerCare::pluck('user_id');
        $users  = User::where('status', true)->whereNotIn('id', $cs)->get();
        return view('admin.prosiding.cs.create', [
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        try {
            $save = new CustomerCare();
            $save->user_id  = $request->user_id;
            $save->status   = 1;
            $save->save();

            Alert::success('Success', 'Kontak Narahubung berhasil ditambahkan !');
            return redirect()->route('customer-care.index');

        } catch (Exception $error) {
            Alert::error('Error', $error->getMessage());
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
