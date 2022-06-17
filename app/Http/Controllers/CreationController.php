<?php

namespace App\Http\Controllers;

use App\Models\categories_creation;
use App\Models\Category;
use App\Models\CategoryCreation;
use App\Models\Creation;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class CreationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataCategories = Category::all();
        $dataCreations = Creation::all();
        foreach ($dataCreations as $value) {

            $key = "hocBE";
            $version = Crypt::encryptString($value->version);

            //$mac hash lần 1 trung hòa tất cả
            $mac = hash_hmac('sha256', $version, $key);

            $version .= ":" . $mac;

            $value->vesion = $version;
        }

        return view('admin.management.creation', compact('dataCreations', 'dataCategories'));
        //
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return view('admin.management.creation', compact('dataCreations', 'dataCategories'));
        // $request->validate([
        //     'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        // ]);


        $creation = new Creation();
        //save 
        $creation->name = $request->input('name');
        $creation->author = $request->input('author');
        $creation->source = $request->input('source');
        $creation->status = $request->input('status');
        $creation->description = $request->input('description');

        //Processing image
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/images/covers'), $filename);
            //save 
            $creation->image = $filename;
        }

        //save 
        $creation->save();
        //Lấy id mơi tạo
        $id = $creation->id;

        foreach ($request->input('types') as $key => $value) {
            // print_r($value);
            $categoryCreation = new CategoryCreation();
            $categoryCreation->category_id = $value;
            $categoryCreation->creation_id = $creation->id;
            $categoryCreation->save();
        }
        
        return redirect()->route('admin.index')->with('success', 'Thêm truyện thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Creation  $creation
     * @return \Illuminate\Http\Response
     */
    public function show(Creation $creation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Creation  $creation
     * @return \Illuminate\Http\Response
     */
    public function edit(Creation $creation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Creation  $creation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Creation $creation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Creation  $creation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Creation $creation)
    {
        //
    }
}
