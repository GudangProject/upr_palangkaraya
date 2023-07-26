<?php

namespace App\Http\Controllers\Admin\Prosiding;

use App\Http\Controllers\Controller;
use App\Http\Livewire\Prosiding\Agenda;
use App\Models\Prosiding\Agenda as ProsidingAgenda;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.prosiding.agenda.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.prosiding.agenda.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'title'=>'max:255|required',
        ]);

        if($validator->fails()) {
            Alert::toast($validator->errors()->first(), 'error');
            return redirect()->back();
        }

        try {
            $save = new ProsidingAgenda();
            $save->title = $request->title;
            $save->description = $request->description;
            $save->url = $request->url == null ? '#' : $request->url;
            $save->created_by = auth()->user()->id;
            $save->status = 1;
            $save->date = $request->date;
            $save->save();
            Cache::flush();

            Alert::success('Success', 'Data berhasil ditambahkan');
            return redirect()->route('agenda.index');
        } catch (Exception $error) {
            Alert::error('Error', $error->getMessage());
            return back();
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return view('admin.prosiding.agenda.edit', [
            'data' => ProsidingAgenda::findOrFail($id),
        ]);
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
        $validator = Validator::make($request->all(), [
            'title'=>'max:255|required',
        ]);

        if($validator->fails()) {
            Alert::toast($validator->errors()->first(), 'error');
            return redirect()->back();
        }

        try {
            $save = ProsidingAgenda::findOrFail($id);
            $save->title = $request->title;
            $save->description = $request->description;
            $save->url = $request->url == null ? '#' : $request->url;
            $save->created_by = auth()->user()->id;
            $save->date = $request->date;
            $save->save();
            Cache::flush();

            Alert::success('Success', 'Data berhasil ditambahkan');
            return redirect()->route('agenda.index');
        } catch (Exception $error) {
            Alert::error('Error', $error->getMessage());
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
