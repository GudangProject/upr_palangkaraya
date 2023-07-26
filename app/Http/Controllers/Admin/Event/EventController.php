<?php

namespace App\Http\Controllers\Admin\Event;

use App\Http\Controllers\Controller;
use App\ImageProses;
use Illuminate\Http\Request;
use App\Models\Prosiding\Event;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
    {
        return view('admin.event.index');
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        // dd($request);

        $dataImageSetting = [
            'ori_width'=>config('app.img_size.ori_width'),
            'ori_height'=>config('app.img_size.ori_height'),
            'mid_width'=>config('app.img_size.mid_width'),
            'mid_height'=>config('app.img_size.mid_height'),
            'thumb_width'=>config('app.img_size.thumb_width'),
            'thumb_height'=>config('app.img_size.thumb_height')
        ];

        $validator = Validator::make($request->all(), [
            'image'=>'image|mimes:jpeg,png,jpg,gif',
        ]);

        if($validator->fails()) {
            Alert::toast($validator->errors()->first(), 'error');
            return redirect()->back();
        }

        // dd($validator);
        $imageName = '';
        if($request->file('image') != null){
            $dataImg = array(
                'skala169' => array(
                    'width'=>$request->input('16_9_width'),
                    'height'=>$request->input('16_9_height'),
                    'x'=>$request->input('16_9_x'),
                    'y'=>$request->input('16_9_y')
                ),
                'skala43' => array(
                    'width'=>$request->input('4_3_width'),
                    'height'=>$request->input('4_3_height'),
                    'x'=>$request->input('4_3_x'),
                    'y'=>$request->input('4_3_y')
                ),
                'skala11' => array(
                    'width'=>$request->input('1_1_width'),
                    'height'=>$request->input('1_1_height'),
                    'x'=>$request->input('1_1_x'),
                    'y'=>$request->input('1_1_y')
                )
            );

            $dataImage = [
                'file'=>$request->file('image'),
                'setting'=>$dataImageSetting,
                'path'=>public_path('storage/pictures/event/'),
                'modul'=>'event',
                'dataImg'=>$dataImg
            ];

            $uploadImg = ImageProses::imageCropDimensi($dataImage);
            if($uploadImg['status'] == true){
                $imageName = $uploadImg['namaImage'];
            }
        }
        try {

            $save = new Event();
            $save->judul = $request->judul;
            $save->slug = Str::slug($request->judul);
            $save->keterangan = $request->keterangan;
            $save->link = $request->link;
            $save->type = $request->type;
            $save->date_start = $request->mulai;
            $save->date_end = $request->selesai;
            $save->created_by = auth()->user()->id;
            $save->status = 1;
            $save->image = $imageName;
            $save->save();

            Cache::flush();

            Alert::success('Success', 'Data berhasil ditambahkan');
            return redirect()->route('event.index');

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

    public function edit($id)
    {
        return view('admin.event.edit', [
            'data' => Event::findOrFail($id)
        ]);
    }



    public function update(Request $request, $id)
    {
        $currentImage = Event::findOrFail($id)->image;
        if($request->image != null &&  $currentImage != null){
            ImageProses::deleteToStorage('post',$currentImage);
        }

        $dataImageSetting = [
            'ori_width'=>config('app.img_size.ori_width'),
            'ori_height'=>config('app.img_size.ori_height'),
            'mid_width'=>config('app.img_size.mid_width'),
            'mid_height'=>config('app.img_size.mid_height'),
            'thumb_width'=>config('app.img_size.thumb_width'),
            'thumb_height'=>config('app.img_size.thumb_height')
        ];

        $validator = Validator::make($request->all(), [
            'image'=>'image|mimes:jpeg,png,jpg,gif',
        ]);

        if($validator->fails()) {
            Alert::toast($validator->errors()->first(), 'error');
            return redirect()->back();
        }

        $imageName = '';
        if($request->file('image') != null){
            $dataImg = array(
                'skala169' => array(
                    'width'=>$request->input('16_9_width'),
                    'height'=>$request->input('16_9_height'),
                    'x'=>$request->input('16_9_x'),
                    'y'=>$request->input('16_9_y')
                ),
                'skala43' => array(
                    'width'=>$request->input('4_3_width'),
                    'height'=>$request->input('4_3_height'),
                    'x'=>$request->input('4_3_x'),
                    'y'=>$request->input('4_3_y')
                ),
                'skala11' => array(
                    'width'=>$request->input('1_1_width'),
                    'height'=>$request->input('1_1_height'),
                    'x'=>$request->input('1_1_x'),
                    'y'=>$request->input('1_1_y')
                )
            );

            $dataImage = [
                'file'=>$request->file('image'),
                'setting'=>$dataImageSetting,
                'path'=>public_path('storage/pictures/event/'),
                'modul'=>'event',
                'dataImg'=>$dataImg
            ];

            $uploadImg = ImageProses::imageCropDimensi($dataImage);
            if($uploadImg['status'] == true){
                $imageName = $uploadImg['namaImage'];
            }
        }

        try {
            if($request->image != null){
                $fileName = auth()->user()->id.$request->image->getClientOriginalName();
                $request->image->storeAs('public/pictures/events/', $fileName);
            }

            $save = Event::findOrFail($id);
            $save->judul = $request->judul;
            $save->slug = Str::slug($request->judul);
            $save->keterangan = $request->keterangan;
            $save->link = $request->link;
            $save->type = $request->type;
            $save->date_start = $request->mulai;
            $save->date_end = $request->selesai;
            $save->created_by = auth()->user()->id;
            $save->status = 1;
            if($request->image != null){
                $save->image = $imageName;
            }
            $save->save();

            Cache::flush();

            Alert::success('Success', 'Data berhasil diupdate !');
            return redirect()->route('event.index');

        } catch (Exception $error) {
            dd($error->getMessage());
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
