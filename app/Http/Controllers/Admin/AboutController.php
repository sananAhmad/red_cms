<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Traits\ImageTrait;

class AboutController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::first();
        return view('admin.About.index', compact('about'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.About.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif'
        ]);
        if ($request->hasFile('image')) {
            $image_path = About::verifyAndUpload($request->file('image'));
            $request['image_field'] = $image_path;
        }
        $request['user_id'] = About::getUserId();
        $about = About::create($request->only('title', 'description', 'image_field', 'user_id'));
        foreach ($request->only('ipapprove') as $i => $val) {
            $about->aboutProgress()->createMany($val);
        }
        return redirect()->route('about.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('admin.About.edit', compact('about'));
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
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'sometimes|mimes:jpeg,png,jpg,gif'
        ]);
        if ($request->hasFile('image')) {
            About::DeleteImage($request->hidden_imag);
            $image_path = About::verifyAndUpload($request->file('image'));
            $request['image_field'] = $image_path;
        }
        $about = About::findOrFail($id);
        $about->update($request->only('title', 'description', 'image_field'));
        if ($request->ipapprove) {
            $about->aboutProgress()->delete();
            $about->aboutProgress()->createMany($request->ipapprove);
        }
        return redirect()->route('about.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $toedit = About::findOrFail($id);
        ImageTrait::DeleteImage($toedit->image_field);
        $toedit->delete();
        return redirect()->back();
    }

    /**
     * Log out account user.
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function perform()
    {
        Session::flush();

        Auth::logout();

        return redirect('/');
    }
}
