<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\HomeLogo;
use Illuminate\Http\Request;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\File;

class HomeLogoController extends Controller
{
    use ImageTrait;


    public function create(Request $request)
    {

        $HomeLogo = HomeLogo::first();
        return view('admin.HomeSection.HomeLogo', compact('HomeLogo'));
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
            'image' => 'sometimes|mimes:jpeg,png,jpg,gif'
        ]);
        if ($request->hasFile('image')) {
            $image_path = ImageTrait::verifyAndUpload($request->file('image'));
            $request['logo'] = $image_path;
        }
        HomeLogo::create($request->only('logo'));
        return redirect()->back();
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
            'image' => 'sometimes|mimes:jpeg,png,jpg,gif'
        ]);
        if ($request->hasFile('image')) {
            ImageTrait::DeleteImage($request->hidden_imag);
            $image_path = ImageTrait::verifyAndUpload($request->file('image'));
            $request['logo'] = $image_path;
        }
        HomeLogo::findOrFail($id)->update($request->only('logo'));
        return redirect()->back();
    }
}
