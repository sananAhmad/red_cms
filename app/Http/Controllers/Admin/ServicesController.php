<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Services;
use App\Models\Admin\ServicesImage;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Services::first();
        return view('admin.Services.index', compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Services.create');
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
        ]);
        $request['user_id'] = ImageTrait::getUserId();
        $service = Services::create($request->only('title', 'description', 'user_id'));
        $emptyArray = [];
        foreach ($request->ipapprove as $key => $value) {
            if (!empty($value['image'])) {
                $image_path = ImageTrait::verifyAndUpload($value['image']);
                unset($value['image']);
                $value['image'] = $image_path;
                $emptyArray[] = $value;
            }
        }
        $service->images()->createMany($emptyArray);
        return redirect()->route('service.index');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Services::findOrFail($id);
        return view('admin.Services.edit', compact('service'));
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
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $service = Services::findOrFail($id);
        $service->update($request->only('title', 'description'));

        if ($request->ipapprove) {
            foreach ($request->ipapprove as $val) {
                if (isset($val['images_id'])) {
                    ServicesImage::where('id', '!=', $val['images_id'])->delete();
                }
            }
        }
        $emptyArray = [];
        $emptyArray1 = [];
        if ($request->ipapprove) {
            foreach ($request->ipapprove as $i => $val) {
                if (!empty($val['hidden_image']) && !empty($val['image'])) {
                    ImageTrait::DeleteImage($val['hidden_image']);
                    $image_path = ImageTrait::verifyAndUpload($val['image']);
                    unset($val['image']);
                    $val['image'] = $image_path;
                    ServicesImage::findOrFail($val['images_id'])->update($val);
                }
                if (!empty($val['image']) && empty($val['hidden_image'])) {
                    $image_path = ImageTrait::verifyAndUpload($val['image']);
                    unset($val['image']);
                    $val['image'] = $image_path;
                    $emptyArray['title'] = $val['title'];
                    $emptyArray['subTitle'] = $val['subTitle'];
                    $emptyArray['image'] = $val['image'];
                    $service->images()->create($emptyArray);
                }
            }
        }
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
        Services::findOrFail($id)->delete();
        return redirect()->back();
    }
}
