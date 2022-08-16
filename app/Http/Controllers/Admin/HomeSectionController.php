<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\HomeSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $HomeSection = HomeSection::all();
        return view('admin.HomeSection.index', compact('HomeSection'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.HomeSection.create');
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
            'subTitle' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif'
        ]);
        if ($request->hasFile('image')) {
            $image_path = HomeSection::verifyAndUpload($request->file('image'));
            $request['background_image'] = $image_path;
        }
        $request['user_id'] = HomeSection::getUserId();
        HomeSection::create($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $toedit = HomeSection::findOrFail($id);
        HomeSection::DeleteImage($toedit->background_image);
        $toedit->delete();
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $HomeSection = HomeSection::findOrFail($id);
        return view('admin.HomeSection.edit', compact('HomeSection'));
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
            'subTitle' => 'required',
        ]);
        if ($request->hasFile('image')) {
            HomeSection::DeleteImage($request->hidden_imag);
            $image_path = HomeSection::verifyAndUpload($request->file('image'));
            $request['background_image'] = $image_path;
        }
        HomeSection::findOrFail($id)->update($request->all());
        return redirect()->back();
    }
}
