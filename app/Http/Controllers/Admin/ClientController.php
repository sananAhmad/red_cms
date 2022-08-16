<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\ClientReview;
use Illuminate\Http\Request;
use App\Traits\ImageTrait;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Client::first();
        return view('admin.Client.index', compact('client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Client.create');
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
        ]);
        $service = Client::create($request->only('title', 'subTitle'));
        $request['user_id'] = ImageTrait::getUserId();
        $emptyArray = [];
        foreach ($request->ipapprove as $key => $value) {
            if (!empty($value['image'])) {
                $image_path = ImageTrait::verifyAndUpload($value['image']);
                unset($value['image']);
                $value['image'] = $image_path;
                $emptyArray[] = $value;
            }
        }
        $service->clientReview()->createMany($emptyArray);
        return redirect()->route('client-section.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('admin.Client.edit', compact('client'));
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

        $emptyArray = [];
        $service = Client::findOrFail($id);
        $service->update($request->only('title', 'subTitle'));

        if ($request->ipapprove) {
            foreach ($request->ipapprove as $val) {
                if (isset($val['images_id'])) {
                    ClientReview::where('id', '!=', $val['images_id'])->delete();
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
                    ClientReview::findOrFail($val['images_id'])->update($val);
                }
                if (!empty($val['image']) && empty($val['hidden_image'])) {
                    $image_path = ImageTrait::verifyAndUpload($val['image']);
                    unset($val['image']);
                    $val['image'] = $image_path;
                    $emptyArray['name'] = $val['name'];
                    $emptyArray['review'] = $val['review'];
                    $emptyArray['image'] = $val['image'];
                    $service->clientReview()->create($emptyArray);
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
        Client::findOrFail($id)->delete();
        return redirect()->back();
    }
}
