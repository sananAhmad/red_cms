<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RecentWork;
use Illuminate\Http\Request;
use App\Traits\ImageTrait;


class RecentworkController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $RecentWork = RecentWork::all();
        return view('admin.RecentWork.index', compact('RecentWork'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.RecentWork.create');
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
            'image' => 'required|mimes:jpeg,png,jpg,gif',
            'type' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $image_path = RecentWork::verifyAndUpload($request->file('image'));
            $request['background_image'] = $image_path;
        }
        $request['user_id'] = RecentWork::getUserId();
        RecentWork::create($request->only('title', 'subTitle', 'background_image', 'user_id', 'type'));
        return redirect()->route('recent-work.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $RecentWork = RecentWork::findOrFail($id);
        return view('admin.RecentWork.edit', compact('RecentWork'));
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
            'type' => 'required'
        ]);
        if ($request->hasFile('image')) {
            RecentWork::DeleteImage($request->hidden_imag);
            $image_path = RecentWork::verifyAndUpload($request->file('image'));
            $request['background_image'] = $image_path;
        }
        RecentWork::findOrFail($id)->update($request->all());
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
        $toedit = RecentWork::findOrFail($id);
        ImageTrait::DeleteImage($toedit->background_image);
        $toedit->delete();
        return redirect()->back();
    }
}
