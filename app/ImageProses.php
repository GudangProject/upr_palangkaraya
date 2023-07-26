<?php

namespace App;

use Image;
use File;
//use Illuminate\Support\Facades\File;

class ImageProses {
  public static function imageCropDimensi($dataImage){

      $image            = $dataImage['file'];
      $settingSize      = $dataImage['setting'];
      $destinationPath  = $dataImage['path'];
      $modul            = $dataImage['modul'];
      $imageName        = time().'.'.$image->getClientOriginalExtension();
        // dd($dataImage);
      self::cekFolder($destinationPath);

      $path_tmp       = $destinationPath.'tmp';

      $path16_9_big   = $destinationPath.'16_9/big';
      $path16_9_mid   = $destinationPath.'16_9/mid';
      $path16_9_thumb = $destinationPath.'16_9/thumb';

      $path4_3_big    = $destinationPath.'4_3/big';
      $path4_3_mid    = $destinationPath.'4_3/mid';
      $path4_3_thumb  = $destinationPath.'4_3/thumb';

      $path1_1_big    = $destinationPath.'1_1/big';
      $path1_1_mid    = $destinationPath.'1_1/mid';
      $path1_1_thumb  = $destinationPath.'1_1/thumb';

      $width_16_9     = ceil($dataImage['dataImg']['skala169']['width']);
      $height_16_9    = ceil($dataImage['dataImg']['skala169']['height']);
      $x_16_9         = ceil($dataImage['dataImg']['skala169']['x']);
      $y_16_9         = ceil($dataImage['dataImg']['skala169']['y']);

      $width_4_3      = ceil($dataImage['dataImg']['skala43']['width']);
      $height_4_3     = ceil($dataImage['dataImg']['skala43']['height']);
      $x_4_3          = ceil($dataImage['dataImg']['skala43']['x']);
      $y_4_3          = ceil($dataImage['dataImg']['skala43']['y']);

      $width_1_1      = ceil($dataImage['dataImg']['skala11']['width']);
      $height_1_1     = ceil($dataImage['dataImg']['skala11']['height']);
      $x_1_1          = ceil($dataImage['dataImg']['skala11']['x']);
      $y_1_1          = ceil($dataImage['dataImg']['skala11']['y']);


      try{
          $img = Image::make($image->getRealPath());
          $img->crop($width_16_9, $height_16_9, $x_16_9, $y_16_9)->save($path16_9_big.'/'.$imageName)->destroy();

          $img = Image::make($image->getRealPath());
          $img->crop($width_4_3, $height_4_3, $x_4_3, $y_4_3)->save($path4_3_big.'/'.$imageName)->destroy();

          $img = Image::make($image->getRealPath());
          $img->crop($width_1_1, $height_1_1, $x_1_1, $y_1_1)->save($path1_1_big.'/'.$imageName)->destroy();

          Image::make($path16_9_big.'/'.$imageName)->resize($settingSize['mid_width'], null, function ($constraint) { $constraint->aspectRatio(); })->save($path16_9_mid.'/'.$imageName)->destroy();

          Image::make($path16_9_big.'/'.$imageName)->resize($settingSize['thumb_width'], null, function ($constraint) { $constraint->aspectRatio(); })->save($path16_9_thumb.'/'.$imageName)->destroy();

          Image::make($path4_3_big.'/'.$imageName)->resize($settingSize['mid_width'], null, function ($constraint) { $constraint->aspectRatio(); })->save($path4_3_mid.'/'.$imageName)->destroy();

          Image::make($path4_3_big.'/'.$imageName)->resize($settingSize['thumb_width'], null, function ($constraint) { $constraint->aspectRatio(); })->save($path4_3_thumb.'/'.$imageName)->destroy();

          Image::make($path1_1_big.'/'.$imageName)->resize($settingSize['mid_width'], null, function ($constraint) { $constraint->aspectRatio(); })->save($path1_1_mid.'/'.$imageName)->destroy();

          Image::make($path1_1_big.'/'.$imageName)->resize($settingSize['thumb_width'], null, function ($constraint) { $constraint->aspectRatio(); })->save($path1_1_thumb.'/'.$imageName)->destroy();

          chmod($path16_9_big.'/'.$imageName, 0777);
          chmod($path16_9_mid.'/'.$imageName, 0777);
          chmod($path16_9_thumb.'/'.$imageName, 0777);

          chmod($path4_3_big.'/'.$imageName, 0777);
          chmod($path4_3_mid.'/'.$imageName, 0777);
          chmod($path4_3_thumb.'/'.$imageName, 0777);

          chmod($path1_1_big.'/'.$imageName, 0777);
          chmod($path1_1_mid.'/'.$imageName, 0777);
          chmod($path1_1_thumb.'/'.$imageName, 0777);

          return ['status'=>true,'namaImage'=>$imageName];
      }catch(Exception $e){
          return ['status'=>false,'namaImage'=>''];
      }

      return ['status'=>true,'namaImage'=>$width_16_9];
  }
  public static function imageDimensi($dataImage){

      $image = $dataImage['file'];
      $imageExtension = $image->getClientOriginalExtension();
      $destinationPath = $dataImage['path'];
      $pathBig = $destinationPath.'big';
      $pathMid = $destinationPath.'mid';
      $pathThumb = $destinationPath.'thumb';
      $settingSize = $dataImage['setting'];
      $modul = $dataImage['modul'];
      $imageName = time().'.'.$image->getClientOriginalExtension();

      $watermark = $dataImage['watermark']['status'];
      $txt_watermark = $dataImage['watermark']['text'];
      $font_watermark = $dataImage['watermark']['font'];
      //echo $dataImage['watermark']['font'];

      self::cekFolder2($destinationPath);

      $img = Image::make($image->getRealPath());

      try{
          $img->resize($settingSize['ori_width'], $settingSize['ori_height'], function ($constraint) {
              $constraint->aspectRatio();
          })->save($pathBig.'/'.$imageName);

          $img->resize($settingSize['mid_width'], $settingSize['mid_height'], function ($constraint) {
      		    $constraint->aspectRatio();
      		})->save($pathMid.'/'.$imageName);

          $img->resize($settingSize['thumb_width'], $settingSize['thumb_height'], function ($constraint) {
      		    $constraint->aspectRatio();
      		})->save($pathThumb.'/'.$imageName);

          /*if($watermark == 1){
              $img_big = Image::make($pathBig.'/'.$imageName);
              //$img_big->text('The quick brown fox jumps over the lazy dog.');
              $img_big->text($txt_watermark, 0, 0, function($font) {
                  //$font->file('fonts/glyphicons-halflings-regular.ttf');
                  $font->size('40');
                  $font->color('#ffffff');
                  $font->align('left');
                  $font->valign('bottom');
                  $font->angle(45);
              });
              $img_big->destroy();

              $img_mid = Image::make($pathMid.'/'.$imageName);
              $img_mid->text($txt_watermark, 0, 0, function($font) {
                  //$font->file('fonts/glyphicons-halflings-regular.ttf');
                  $font->size('40');
                  $font->color('#ffffff');
                  $font->align('left');
                  $font->valign('bottom');
                  $font->angle(45);
              });
              $img_mid->destroy();

              $img_thumb = Image::make($pathThumb.'/'.$imageName);
              $img_thumb->text($txt_watermark, 0, 0, function($font) {
                  //$font->file('fonts/glyphicons-halflings-regular.ttf');
                  $font->size('40');
                  $font->color('#ffffff');
                  $font->align('left');
                  $font->valign('bottom');
                  $font->angle(45);
              });
              $img_thumb->destroy();
          }*/
          $img->destroy();

          chmod($pathBig.'/'.$imageName, 0777);
          chmod($pathMid.'/'.$imageName, 0777);
          chmod($pathThumb.'/'.$imageName, 0777);

          return ['status'=>true,'namaImage'=>$imageName];
      }catch(Exception $e){
          return ['status'=>false,'namaImage'=>''];
      }
  }
  public static function cekFolder2($parentPath){
      if(!file_exists(public_path('storage'))){
          mkdir(public_path('storage'), 0777);
      }
      if(!file_exists(public_path('storage/pictures'))){
          mkdir(public_path('storage/pictures'), 0777);
      }
      if(!file_exists(public_path('storage/pictures'))){
          mkdir(public_path('storage/pictures'), 0777);
      }
      if(!file_exists($parentPath)){
          mkdir($parentPath, 0777);
      }
      if(!file_exists($parentPath.'big')){
          mkdir($parentPath.'big', 0777);
      }
      if(!file_exists($parentPath.'mid')){
          mkdir($parentPath.'mid', 0777);
      }
      if(!file_exists($parentPath.'thumb')){
          mkdir($parentPath.'thumb', 0777);
      }
  }
  public static function cekFolder($parentPath){
      if(!file_exists(public_path('storage'))){
          mkdir(public_path('storage'), 0777);
      }
      if(!file_exists(public_path('storage/pictures'))){
          mkdir(public_path('storage/pictures'), 0777);
      }
      if(!file_exists(public_path('storage/pictures'))){
          mkdir(public_path('storage/pictures'), 0777);
      }
      if(!file_exists($parentPath)){
          mkdir($parentPath, 0777);
      }
      if(!file_exists($parentPath.'16_9')){
          mkdir($parentPath.'16_9', 0777);
      }
      if(!file_exists($parentPath.'4_3')){
          mkdir($parentPath.'4_3', 0777);
      }
      if(!file_exists($parentPath.'1_1')){
          mkdir($parentPath.'1_1', 0777);
      }

      if(!file_exists($parentPath.'16_9/big')){
          mkdir($parentPath.'16_9/big', 0777);
      }
      if(!file_exists($parentPath.'16_9/mid')){
          mkdir($parentPath.'16_9/mid', 0777);
      }
      if(!file_exists($parentPath.'16_9/thumb')){
          mkdir($parentPath.'16_9/thumb', 0777);
      }

      if(!file_exists($parentPath.'4_3/big')){
          mkdir($parentPath.'4_3/big', 0777);
      }
      if(!file_exists($parentPath.'4_3/mid')){
          mkdir($parentPath.'4_3/mid', 0777);
      }
      if(!file_exists($parentPath.'4_3/thumb')){
          mkdir($parentPath.'4_3/thumb', 0777);
      }

      if(!file_exists($parentPath.'1_1/big')){
          mkdir($parentPath.'1_1/big', 0777);
      }
      if(!file_exists($parentPath.'1_1/mid')){
          mkdir($parentPath.'1_1/mid', 0777);
      }
      if(!file_exists($parentPath.'1_1/thumb')){
          mkdir($parentPath.'1_1/thumb', 0777);
      }
  }
  public static function uploadArchive($dataFile){
      $file = $dataFile['file'];
      $imageExtension = $file->getClientOriginalExtension();
      $destinationPath = $dataFile['path'];
      $modul = $dataFile['modul'];
      $fileName = time().'.'.$imageExtension;

      self::cekFolderArchive($destinationPath);
      $file->move($destinationPath,$fileName);

      chmod($destinationPath.$fileName, 0777);

      return ['status'=>true,'namaFile'=>$fileName];
  }
  public static function cekFolderArchive($parentPath){
      if(!file_exists(public_path('storage'))){
          mkdir(public_path('storage'), 0777);
      }
      if(!file_exists($parentPath)){
          mkdir($parentPath, 0777);
      }
  }

    public static function diskCheckFile($pathFileName){
        $exists = File::exists($pathFileName);
        if($exists){
            return true;
        }else{
            return false;
        }
    }

    public static function deleteToStorage($modul='',$filename){
        switch($modul){
            case 'post':
                $path_big_1 = config('app.STORAGE_POST').'1_1/big/'.$filename;
                $path_mid_1 = config('app.STORAGE_POST').'1_1/mid/'.$filename;
                $path_thumb_1 = config('app.STORAGE_POST').'1_1/thumb/'.$filename;
                $path_big_4 = config('app.STORAGE_POST').'4_3/big/'.$filename;
                $path_mid_4 = config('app.STORAGE_POST').'4_3/mid/'.$filename;
                $path_thumb_4 = config('app.STORAGE_POST').'4_3/thumb/'.$filename;
                $path_big_16 = config('app.STORAGE_POST').'16_9/big/'.$filename;
                $path_mid_16 = config('app.STORAGE_POST').'16_9/mid/'.$filename;
                $path_thumb_16 = config('app.STORAGE_POST').'16_9/thumb/'.$filename;
                    // dd(public_path($path_big_1));

                    if (file_exists(public_path($path_big_1))) {
                        unlink(public_path($path_big_1));
                        unlink(public_path($path_mid_1));
                        unlink(public_path($path_thumb_1));
                        unlink(public_path($path_big_4));
                        unlink(public_path($path_mid_4));
                        unlink(public_path($path_thumb_4));
                        unlink(public_path($path_big_16));
                        unlink(public_path($path_mid_16));
                        unlink(public_path($path_thumb_16));
                    }
            break;
            case 'gallery':
                $path_ftp_big_1 = env('STORAGE_GALLERY').'1_1/big/'.$filename;
                $path_mid_1 = env('STORAGE_GALLERY').'1_1/mid/'.$filename;
                $path_thumb_1 = env('STORAGE_GALLERY').'1_1/thumb/'.$filename;
                $path_big_4 = env('STORAGE_GALLERY').'4_3/big/'.$filename;
                $path_mid_4 = env('STORAGE_GALLERY').'4_3/mid/'.$filename;
                $path_thumb_4 = env('STORAGE_GALLERY').'4_3/thumb/'.$filename;
                $path_big_16 = env('STORAGE_GALLERY').'16_9/big/'.$filename;
                $path_mid_16 = env('STORAGE_GALLERY').'16_9/mid/'.$filename;
                $path_thumb_16 = env('STORAGE_GALLERY').'16_9/thumb/'.$filename;

                $path_big = env('STORAGE_GALLERY').'big/'.$filename;
                $path_mid = env('STORAGE_GALLERY').'mid/'.$filename;
                $path_thumb = env('STORAGE_GALLERY').'thumb/'.$filename;

                if(self::diskCheckFile($path_ftp_big_1) == true){
                    File::delete($path_ftp_big_1);
                    File::delete($path_mid_1);
                    File::delete($path_thumb_1);
                    File::delete($path_big_4);
                    File::delete($path_mid_4);
                    File::delete($path_thumb_4);
                    File::delete($path_big_16);
                    File::delete($path_mid_16);
                    File::delete($path_thumb_16);
                }else{
                    File::delete($path_big);
                    File::delete($path_mid);
                    File::delete($path_thumb);
                }
            break;
            case 'authors':
                $path_ftp_big_1 = public_path('storage/pictures/authors').'1_1/big/'.$filename;
                $path_mid_1 = env('storage/pictures/authors').'1_1/mid/'.$filename;
                $path_thumb_1 = env('storage/pictures/authors').'1_1/thumb/'.$filename;
                $path_big_4 = env('storage/pictures/authors').'4_3/big/'.$filename;
                $path_mid_4 = env('storage/pictures/authors').'4_3/mid/'.$filename;
                $path_thumb_4 = env('storage/pictures/authors').'4_3/thumb/'.$filename;
                $path_big_16 = env('storage/pictures/authors').'16_9/big/'.$filename;
                $path_mid_16 = env('storage/pictures/authors').'16_9/mid/'.$filename;
                $path_thumb_16 = env('storage/pictures/authors').'16_9/thumb/'.$filename;

                $path_big = env('storage/pictures/authors').'big/'.$filename;
                $path_mid = env('storage/pictures/authors').'mid/'.$filename;
                $path_thumb = env('storage/pictures/authors').'thumb/'.$filename;

                if(self::diskCheckFile($path_ftp_big_1) == true){
                    File::delete($path_ftp_big_1);
                    File::delete($path_mid_1);
                    File::delete($path_thumb_1);
                    File::delete($path_big_4);
                    File::delete($path_mid_4);
                    File::delete($path_thumb_4);
                    File::delete($path_big_16);
                    File::delete($path_mid_16);
                    File::delete($path_thumb_16);
                }else{
                    File::delete($path_big);
                    File::delete($path_mid);
                    File::delete($path_thumb);
                }
            break;
            case 'user':
                $path_big = env('STORAGE_USER').'big/'.$filename;
                $path_mid = env('STORAGE_USER').'mid/'.$filename;
                $path_thumb = env('STORAGE_USER').'thumb/'.$filename;

                File::delete($path_big);
                File::delete($path_mid);
                File::delete($path_thumb);
            break;
            case 'adv':
                $path_ftp = env('STORAGE_ADV').$filename;

                File::delete($path_ftp);
            break;
            case 'archive':
                $path_ftp = env('STORAGE_ARCHIVE').$filename;

                File::delete($path_ftp);
            break;
        }
    }

    public static function uploadImage($dataFile){
        $file = $dataFile['file'];
        $imageExtension = $file->getClientOriginalExtension();
        $destinationPath = $dataFile['path'];
        $modul = $dataFile['modul'];

        $fileName = time().'.'.$imageExtension;
        $file->move($destinationPath,$fileName);

        return ['status'=>true,'name'=>$fileName];
    }
}
