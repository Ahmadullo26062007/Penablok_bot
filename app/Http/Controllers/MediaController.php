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
        $media=Media::with('category')->orderByDesc('id')->get();
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
    public function show(Media $media)
    {
        dd($media);
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
    public function update(Request $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Media $media)
    {
        //
    }
}
