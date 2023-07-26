<?php

namespace App\Http\Controllers\Admin\Prosiding;

use App\Http\Controllers\Controller;
use App\Models\Prosiding\Certificate as ProsidingCertificate;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class Certificate extends Controller
{

    public function index()
    {
        return view('admin.prosiding.certificate.index');
    }

    public function create()
    {
        return view('admin.prosiding.certificate.create', [
            'users' => User::where('status', true)->get()
        ]);
    }

    public function store(Request $request)
    {
        // $fileName = auth()->user()->id.time().'.'.$request->document->getClientOriginalExtension();
        try {
            // $request->document->storeAs('public/files/certificate/', $fileName);
            $upload = new ProsidingCertificate();
            $upload->code = auth()->user()->id.time();
            $upload->user_id = $request->user_id;
            $upload->model = $request->model;

            if($request->naskah == "0" ){
                $upload->creation_id = $request->seminar;
            }elseif($request->seminar == "0" ){
                $upload->creation_id = $request->naskah;
            }

            $upload->file = $request->url;
            $upload->status = 1;
            $upload->created_by = auth()->user()->id;
            $upload->save();

            Alert::success('Success', 'Sertifikat berhasil ditambahkan !');
            return redirect()->route('certificate.index');

        } catch (Exception $error) {
            Alert::error('Error', $error->getMessage(), [
                'time' => false
            ]);
            return back();
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view('admin.prosiding.certificate.edit', [
            'users' => User::where('status', true)->get(),
            'data' => ProsidingCertificate::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        // if($request->document != null){
        //     $fileName = auth()->user()->id.time().'.'.$request->document->getClientOriginalExtension();
        //     $request->document->storeAs('public/files/certificate/', $fileName);
        // }

        try {
            $upload = ProsidingCertificate::findOrFail($id);
            $upload->code = auth()->user()->id.time();
            $upload->user_id = $request->user_id;
            $upload->model = $request->model;

            if($request->naskah == "0" ){
                $upload->creation_id = $request->seminar;
            }elseif($request->seminar == "0" ){
                $upload->creation_id = $request->naskah;
            }

            // if($request->document != null){
            //     $upload->file = $fileName;
            // }

            $upload->file = $request->url;
            $upload->status = 1;
            $upload->created_by = auth()->user()->id;
            $upload->save();

            Alert::success('Success', 'Sertifikat berhasil diupdate !');
            return redirect()->route('certificate.index');

        } catch (Exception $error) {
            Alert::error('Error', $error->getMessage(), [
                'time' => false
            ]);
            return back();
        }
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
