<?php

namespace App\Http\Controllers;

use App\Models\categories_creation;
use App\Models\Category;
use App\Models\CategoryCreation;

use App\Models\Rating;

use App\Models\Creation;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

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
            $file-> move(public_path('images/covers'), $filename);
            //save 
            $creation->image = $filename;
        }

        //save 
        $creation->save();
        //Lấy id mơi tạo
        $id = $creation->id;

        //Cập nhật bảng truyện thuộc danh mục nào
        foreach ($request->input('types') as $key => $value) {
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ratingAvg = Rating::where('creation_id',$id)->avg('star');
        return view('user.creation.detail', ['creation' => Creation::find($id)],compact('ratingAvg'));

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
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'ltitle' => 'required',
            'lemail' => 'required',
            'ldescription' => 'required',
        ]);

        $news = News::find($id);

        list($encryptVersion, $mac) = explode(':', $version);
        $key = "hocBE";

        //So sanh version hiện tại với version trước đó
        if (hash_equals(hash_hmac('sha256', $encryptVersion, $key), $mac)) { //lay phan tach ra vaf cho "nhom2" so sanhs vs mac ==> kq
            //Mã hóa ngược lại lấy id version
            $idVersionOld = Crypt::decryptString($encryptVersion);
            if (hash_equals($idVersionOld, (string)$news->vesion)) {
                //Update data
                $news->title = $request->input('ltitle');
                $news->email = $request->input('lemail');
                $news->description = $request->input('ldescription');
                $news->vesion = (int)$idVersionOld + 1;
                $news->save();

                return ;
            }
        }



        $creation = Creation::find($id);
        //Edit image
        if($request->hasFile('image')){
            $destination = 'images/covers/'.$creation->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file= $request->file('image');
            $extention = $file->getClientOriginalName();
            $filename = time().'.'.$extention;
            $file-> move(public_path('images/covers'), $filename);
            //save 
            $creation->image = $filename;
        }


        $creation->update();
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
