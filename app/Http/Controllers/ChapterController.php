<?php

namespace App\Http\Controllers;
use App\Models\Chapter;
use App\Models\Creation;

use Illuminate\Http\Request;
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
        return view('admin.management.chapter', compact('chapter', 'creation'));
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
    public function show($id,$creationId)
    {
        $creation = Creation::find($creationId);
        $chapter = Chapter::find($id);
        return view('user.creation.reading', compact('creation', 'chapter'));
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
    public function destroy($id)
    {
        //
    }
}
