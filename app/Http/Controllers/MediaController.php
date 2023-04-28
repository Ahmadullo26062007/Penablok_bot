<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $media=Media::with('categories')->orderByDesc('id')->get();
        return view('admin.media.index',compact('media'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Categories::pluck('title','id');
        return view('admin.media.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categories_id'=>'required'
        ]);
        $data = $request->all();
        $file = $request->file('media');
        $image_name = uniqid() . $file->getClientOriginalName();
        $data['media'] = $image_name;
        $file->move(public_path('uploads'), $image_name);
        Media::create($data);

        return redirect()->route('media.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $media=Media::find($id);
        return view('admin.media.show',compact('media'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories=Categories::pluck('title','id');
        $media=Media::find($id);
        return view('admin.media.edit',compact('media','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'categories_id'=>'required'
        ]);
        $media=Media::find($id);
        $data = $request->all();

            $file = $request->file('media');
            $image_name = uniqid() . $file->getClientOriginalName();
            $data['media'] = $image_name;
            $file->move(public_path('uploads'), $image_name);
            $media->update($data);


        return redirect()->route('media.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Media $media)
    {
        //
    }
}
