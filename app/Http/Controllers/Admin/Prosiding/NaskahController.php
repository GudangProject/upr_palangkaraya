<?php

namespace App\Http\Controllers\Admin\Prosiding;

use App\Http\Controllers\Controller;
use App\Models\Prosiding\BidangIlmu;
use App\Models\Prosiding\ProsidingNaskah;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

use function PHPUnit\Framework\returnSelf;

class NaskahController extends Controller
{
    public function index()
    {
        return view('admin.article.index');
    }


    public function create()
    {
        return view('admin.prosiding.upload-naskah.index', [
            'bidangIlmu' => BidangIlmu::all(),
        ]);
    }


    public function store(Request $request)
    {
        // dd($request);
        $fileName = auth()->user()->id.$request->document->getClientOriginalName();
        try {
            $request->document->storeAs('public/files/naskah/', $fileName);
            $upload = new ProsidingNaskah();
            $upload->user_id = auth()->user()->id;
            $upload->bidang_ilmu_id = $request->bidang_ilmu;
            $upload->judul = $request->judul;
            $upload->abstrak = $request->judul;
            $upload->file_naskah = $fileName;
            $upload->status = 0;
            $upload->save();

            Alert::success('Success', 'Naskah berhasil diupload !');
            return redirect()->route('prosiding.upload-naskah');

        } catch (Exception $error) {
            dd($error->getMessage());
            Alert::error('Error', $error->getMessage());
            return back();
        }
    }


    public function show($id)
    {

    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {
        $fileName = auth()->user()->id.$request->document->getClientOriginalName();
        try {
            $request->document->storeAs('public/files/naskah/', $fileName);
            $upload = new ProsidingNaskah();
            $upload->user_id = auth()->user()->id;
            $upload->bidang_ilmu_id = $request->bidang_ilmu;
            $upload->judul = $request->judul;
            $upload->abstrak = $request->judul;
            $upload->file_naskah = $fileName;
            $upload->status = 0;
            $upload->save();

            Alert::success('Success', 'Naskah berhasil diupload !');
            return redirect()->route('prosiding.upload-naskah');

        } catch (Exception $error) {
            dd($error->getMessage());
            Alert::error('Error', $error->getMessage());
            return back();
        }
    }


    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {

    }

    public function naskah(){
        return view('admin.prosiding.naskah');
    }

    public function upload(){
        return view('admin.prosiding.naskah-upload');
    }

    public function uploadPPT($id){
        return view('admin.prosiding.upload-naskah.upload-ppt', [
            'id' => $id
        ]);
    }
    public function savePPT(Request $request)
    {
        $fileName = auth()->user()->id.$request->ppt->getClientOriginalName();
        try {
            $request->ppt->storeAs('public/files/naskah/ppt/', $fileName);
            $upload = ProsidingNaskah::find($request->id);
            $upload->ppt_file = $fileName;
            $upload->save();

            Alert::success('Success', 'PPT File uploaded successfully !');
            return redirect()->route('prosiding.upload-naskah');

        } catch (Exception $error) {
            dd($error->getMessage());
            Alert::error('Error', $error->getMessage());
            return back();
        }
    }

}
