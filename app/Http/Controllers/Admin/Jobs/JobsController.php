<?php

namespace App\Http\Controllers\Admin\Jobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Jobs\Jobs;
use App\Models\Jobs\JobsCategory;
use Exception;
use RealRashid\SweetAlert\Facades\Alert;
use Image;

class JobsController extends Controller
{
    public function index()
    {
        return view('admin.jobs.index');
    }

    public function create()
    {
        return view('admin.jobs.create', [
            'categories' => JobsCategory::all()
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $image = $request->file('logo');
        $input['imagename'] = time().'.'.$image->extension();

        $destinationPath = public_path('/storage/jobs/images/');
        $img = Image::make($image->path());
        $img->resize(200, 200, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);

        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['imagename']);

        try {
            $jobs = new Jobs();
            $jobs->category_id = $request->jobCategory;
            $jobs->title = $request->jobTitle;
            $jobs->slug = Str::slug($request->jobTitle);
            $jobs->type = $request->jobType;
            $jobs->image = $input['imagename'];
            $jobs->position = $request->jobPosition; // senior or junior
            $jobs->experience = $request->jobExperience;
            $jobs->work_location = $request->jobLocation;
            $jobs->budget_min = $request->jobBudgetMin;
            $jobs->budget_max = $request->jobBudgetMax;
            $jobs->status = 1;
            $jobs->tags = $request->jobTags;
            $jobs->company_name = $request->jobCompany;
            $jobs->created_by = auth()->user()->id;

            $jobs->save();

            Alert::toast('Jobs created successfully', 'success');
            return redirect()->route('jobs.index');
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
        return view('admin.jobs.edit', [
            'data' => Jobs::findOrFail($id),
            'categories' => JobsCategory::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $jobs = Jobs::findOrFail($id);

        if($request->logo != null){
            if (public_path('/storage/jobs/images/'.$jobs->image)) {
                unlink(public_path('/storage/jobs/images/'.$jobs->image));
            }
            $image = $request->file('logo');
            $input['imagename'] = time().'.'.$image->extension();

            $destinationPath = public_path('/storage/jobs/images/');
            $img = Image::make($image->path());
            $img->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);

            $destinationPath = public_path('/images');
            $image->move($destinationPath, $input['imagename']);
        }

        try {
            // $jobs = Jobs::findOrFail($id);
            $jobs->category_id = $request->jobCategory;
            $jobs->title = $request->jobTitle;
            $jobs->slug = Str::slug($request->jobTitle);
            $jobs->type = $request->jobType;
            if($request->logo != null){
                $jobs->image = $input['imagename'];
            }
            $jobs->position = $request->jobPosition; // senior or junior
            $jobs->experience = $request->jobExperience;
            $jobs->work_location = $request->jobLocation;
            $jobs->budget_min = $request->jobBudgetMin;
            $jobs->budget_max = $request->jobBudgetMax;
            $jobs->status = 1;
            $jobs->tags = $request->jobTags;
            $jobs->company_name = $request->jobCompany;
            $jobs->created_by = auth()->user()->id;

            $jobs->save();

            Alert::toast('Jobs updated successfully', 'success');
            return redirect()->route('jobs.index');
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
