<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Jobs\Jobs;
use App\Models\Jobs\JobsApplied;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class JobsController extends Controller
{

    public function index()
    {
        return view('frontend.jobs.index', [
            'data'    => Jobs::where('status', true)->orderByDesc('created_at')->paginate(12),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required',
            'message' => 'required',
            'resume' => 'mimes:pdf,doc,docx | max:5120'
        ]);

        if($validator->fails()) {
            Alert::toast($validator->errors()->first(), 'error');
            return redirect()->back();
        }

        $resume = $request->file('resume');
        $resumeName = $resume->getClientOriginalName();
        Storage::disk('public')->putFileAs(
            'files/',
            $resume,
            $resumeName
          );

        try {
            $save = new JobsApplied();
            $save->jobs_id = $request->jobsId;
            $save->username = $request->username;
            $save->email = $request->email;
            $save->message = $request->message;
            $save->resume = $resumeName;
            $save->status = 1;

            $save->save();

            Alert::success('Success', 'Please wait for yout applied jobs, information will be sent via email');
            return redirect()->back();
        } catch (Exception $error) {
            Alert::error('Failed', $error->getMessage());
            return redirect()->back();
        }

    }

    public function show($slug)
    {
        $row = Jobs::where('slug', $slug)->first();
        dd($row);
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
