<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\ImageProses;
use App\Models\Tag;
use Exception;
use Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use RobertSeghedi\News\Models\Article;
use RobertSeghedi\News\Models\Category;
use RobertSeghedi\News\Models\Comment;
use RobertSeghedi\News\Models\News;
use Illuminate\Support\Str;

class ArticleController extends Controller
{

    public function index()
    {
        return view('admin.article.index');
    }


    public function create()
    {
        return view('admin.article.create', [
            'categories' => Category::all(),
            'tags'       => Tag::where('status', true)->get(),
        ]);
    }


    public function store(Request $request)
    {
        // dd($request->image);
        $dataImageSetting = [
            'ori_width'=>config('app.img_size.ori_width'),
            'ori_height'=>config('app.img_size.ori_height'),
            'mid_width'=>config('app.img_size.mid_width'),
            'mid_height'=>config('app.img_size.mid_height'),
            'thumb_width'=>config('app.img_size.thumb_width'),
            'thumb_height'=>config('app.img_size.thumb_height')
        ];

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'category' => 'required',
            'slug' => 'required',
            'status' => 'required',
            'content' => 'required',
            'image'=>'required|image|mimes:jpeg,png,jpg',
            'tags' => 'required',
        ]);

        if($validator->fails()) {
            Alert::toast($validator->errors()->first(), 'error');
            return redirect()->back();
        }

        $namaImage = '';
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
                'path'=>public_path('storage/pictures/post/'),
                'modul'=>'post',
                'dataImg'=>$dataImg
            ];

            $uploadImg = ImageProses::imageCropDimensi($dataImage);
            if($uploadImg['status'] == true){
                $namaImage = $uploadImg['namaImage'];
            }
        }

        // $image = $request->file('image');
        // $input['imagename'] = time().'.'.$image->extension();

        // $destinationPath = public_path('/storage/articles/thumbnail');
        // $img = Image::make($image->path());
        // $img->resize(400, 400, function ($constraint) {
        //     $constraint->aspectRatio();
        // })->save($destinationPath.'/'.$input['imagename']);

        // $destinationPath = public_path('/images');
        // $image->move($destinationPath, $input['imagename']);

        try {
            $article = News::post(
                $request->title,
                Str::slug($request->title),
                $request->content,
                $request->category,
                $request->status,
                $request->type,
                $namaImage,
                implode(',', $request->tags),
                $request->date,
            );

            Cache::flush();

            if($article){
                Alert::success('Created', 'Article post successuflly');
                return redirect()->route('articles.index');
            }
        } catch (Exception $error) {
            Alert::error('Fail', $error->getMessage());
            return back();
        }
    }


    public function show($id)
    {
        return view('admin.article.detail', [
            'data' => Article::findOrFail($id),
            // 'comments' => Comment::where('article_id', $id)->where('reply_id', null)->orderByDesc('created_at')->paginate(10),
        ]);
    }


    public function edit($id)
    {
        $data = Article::findOrFail($id);
        $articleTags = explode(',', $data->tags);

        return view('admin.article.edit', [
            'tags'              => Tag::whereNotIn('id', $articleTags)->where('status', true)->get(),
            'tagsCurrent'       => Tag::whereIn('id', $articleTags)->where('status', true)->get(),
            'categories'        => Category::all(),
            'currentCategory'   => Category::findOrFail($data->category),
            'data'              => $data
        ]);
    }


    public function update(Request $request, $id)
    {
        // dd($request);
        $currentImage = Article::findOrFail($id)->image;
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
            'title' => 'required',
            'category' => 'required',
            'slug' => 'required',
            'status' => 'required',
            'content' => 'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif',
            'tags'=>'required'
        ]);

        if($validator->fails()) {
            Alert::toast($validator->errors()->first(), 'error');
            return redirect()->back();
        }

        // dd($validator);
        $namaImage = '';
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
                'path'=>public_path('storage/pictures/post/'),
                'modul'=>'post',
                'dataImg'=>$dataImg
            ];

            $uploadImg = ImageProses::imageCropDimensi($dataImage);
            if($uploadImg['status'] == true){
                $namaImage = $uploadImg['namaImage'];
            }
        }

        try {
            $article = Article::findOrFail($id);
            $article->title = $request->title;
            $article->slug = Str::slug($request->title);
            $article->content = $request->content;
            $article->category = $request->category;
            $article->author = auth()->user()->id;
            $article->status = $request->status;
            $article->type = $request->type;
            $article->tags = implode(',', $request->tags);

            if ($request->date != null) {
                $article->updated_at = $request->date;
            }

            if($request->image != null){
                $article->image = $namaImage;
            }

            $article->save();

            Cache::flush();
            // Cache::flush('article-'.$article->id);

            Alert::success('Updated', 'Article updated successuflly');
            return redirect()->route('articles.index');
        } catch (Exception $error) {
            Alert::error('Fail', $error->getMessage());
            return back();
        }
    }


    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        News::delete_post($id);
        Alert::success('Deleted', 'Article delete successuflly');
        return back();
    }

    public function infoProsiding(){
        return view('admin.prosiding.info-prosiding');
    }
}
