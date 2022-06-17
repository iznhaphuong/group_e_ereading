<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryCreation;

use App\Models\Rating;

use App\Models\Creation;
use App\Models\FollowingCreation;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;


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

            $value->version = $version;
        }

        return view('admin.management.creation', compact('dataCreations', 'dataCategories'));
        //
    }

    public function checkVersion($id, $version) {
        
        $creation = Creation::find($id);

        list($encryptVersion, $mac) = explode(':', $version);
        $key = "hocBE";

        //So sanh version hiện tại với version trước đó
        if (hash_equals(hash_hmac('sha256', $encryptVersion, $key), $mac)) { //lay phan tach ra vaf cho "nhom2" so sanhs vs mac ==> kq
            //Mã hóa ngược lại lấy id version
            $idVersionOld = Crypt::decryptString($encryptVersion);
            if (hash_equals($idVersionOld, (string)$creation->version)) {
                return true;
            }
        }
        return false;
    }

    public function getCreation($id) {
        
        $creation = Creation::find($id);
        $arr = [$creation, $creation->categories];
        return $arr;
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
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images/covers'), $filename);
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
        var_dump("12312312");
        die;
        $creation = Creation::find($id);

        $creation->name = $request->input('name');
        $creation->author = $request->input('author');
        $creation->source = $request->input('source');
        $creation->status = $request->input('status');
        $creation->status = $request->input('types');
        $creation->description = $request->input('description');


        print_r($request->input('name'));
        // $creation->image = $request->input('image');

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


        //Mã hóa ngược lại để tăng
        $version = $request->input('version');

        list($encryptVersion, $mac) = explode(':', $version);
        $key = "hocBE";

        //So sanh version hiện tại với version trước đó
        if (hash_equals(hash_hmac('sha256', $encryptVersion, $key), $mac)) { //lay phan tach ra vaf cho "nhom2" so sanhs vs mac ==> kq
            //Mã hóa ngược lại lấy id version
            $idVersionOld = Crypt::decryptString($encryptVersion);
            if (hash_equals($idVersionOld, (string)$creation->version)) {
                //Update data
                

                $creation->vesion = (int)$idVersionOld + 1;

                $creation->save();
            }
        }
        $creation->update();
        return redirect()->route('admin.index')->with('success', 'Edit truyện thành công');
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id is encrypted
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $controller = new Controller();
        $UUID = $controller->getUUID();
        $creation = DB::table('creations')
            ->select('*')
            ->where(
                DB::raw('md5(concat(id,name))'),
                '=',
                $id
            )->get()[0];
        $ratingAvg = Rating::where('creation_id', $creation->id)->avg('star');
        if ($ratingAvg == null) {
            $ratingAvg = 0;
        }
        $is_followed = FollowingCreation::where([
            'user_id' => $UUID,
            'creation_id' => $creation->id
        ])->count();
        return view(
            'user.creation.detail',
            [
                'creation' => $creation,
                'is_followed' => $is_followed,
                'ratingAvg' => $ratingAvg

            ]
        );
    }
    //For history
    public function getHistory(Request $request)
    {
        $creation_ids = [];
        foreach ($request->history as $item) {
            array_push($creation_ids, $item['creation_id']);
        }
        $creations = Creation::whereIn('id', $creation_ids)->get();


        Controller::setBaseHistory($creations);

        $controller = new Controller();
        $controller->setUUID(2);
        return (Controller::getBaseHistory());
    }

    public function showHistory()
    {
        return view('user.creation.history');
    }

    public function getRecentChap(Request $request)
    {
        $creation_id = $request->creation_id;
        $chapter_id = $request->chapter_id;

        $chap_number = DB::table('creations')
            ->join('chapters', 'creations.id', '=', 'chapters.creation_id')
            ->select('chapters.chapter_number', 'chapters.chapter_name')
            ->where('chapters.id', '=', $chapter_id)->get();
        return $chap_number;
        }
}
