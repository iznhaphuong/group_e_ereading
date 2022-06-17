<?php

namespace App\Http\Controllers;
use App\Models\Chapter;
use App\Models\Creation;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapter = Chapter::all();
        $creation = Creation::all();
        $crypt = new Crypt();
        return view('admin.management.chapter', compact('chapter', 'creation', 'crypt'));
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
        $chapter = new Chapter();

        //save 
        $chapter->chapter_name = $request->input('name');
        $chapter->creation_id = (int)$request->input('creation_id');
        $chapter->chapter_content = $request->input('content');

        //save 
        $chapter->save();

        return redirect()->route('chapter.index')->with('success', 'Thêm chương thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($creationId)
    {
        $creation = DB::table('creations')
        ->select('*')
        ->where(
            DB::raw('md5(concat(id,name))'),
            '=',
            $creationId
        )->get()[0];

        $chapterList = DB::table('chapters')
        ->select('*')
        ->where('creation_id','=',$creation->id)
        ->orderBy('chapter_number', 'asc')
        ->get();
        $chapter = DB::table('chapters')
        ->select('*')
        ->where('creation_id','=',$creation->id)
        ->where('chapter_number', '=', '1')
        ->get()[0];
        $endChapter = DB::table('chapters')
        ->select('*')
        ->where('creation_id','=',$creation->id)
        ->orderBy('chapter_number', 'desc')
        ->get()[0];
        // dd($chapterList);
        return view('user.creation.reading',compact('creation','chapter','chapterList','endChapter'));

    }

    //Next chapter page
    public function paginate($number)
    {
        $chapter = DB::table('chapters')
        ->select('*')
        ->where(
            DB::raw('md5(concat(creation_id,chapter_number))'),
            '=',
            $number
        )->get()[0];
        $creation = DB::table('creations')
        ->select('*')
        ->where('id','=',$chapter->creation_id)
        ->get()[0];
        $chapterList = DB::table('chapters')
        ->select('*')
        ->where('creation_id','=',$creation->id)
        ->orderBy('chapter_number', 'asc')
        ->get();
        $endChapter = DB::table('chapters')
        ->select('*')
        ->where('creation_id','=',$creation->id)
        ->orderBy('chapter_number', 'desc')
        ->get()[0];
        
        // dd($endChapter);
        return view('user.creation.reading',compact('creation','chapter','chapterList','endChapter'));

    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $key = config('key.key');

        $id = Crypt::decryptString($request->input('idDelete1'));


        $deleted = Chapter::find($id);
        $deleted->delete();
        return redirect()->route('chapter.index')->with('success', 'Xóa truyện thành công');
    }
}
