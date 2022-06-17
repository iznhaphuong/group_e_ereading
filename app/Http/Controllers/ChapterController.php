<?php

namespace App\Http\Controllers;
use App\Models\Chapter;
use App\Models\Creation;
use Illuminate\Support\Facades\DB;

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
        //
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
        ->orderBy('chapter_number', 'asc')->get();
        $chapter = DB::table('chapters')
        ->select('*')
        ->where('creation_id','=',$creation->id)
        ->where('chapter_number', '=', '1')
        ->get()[0];
        // dd($chapter);
        return view('user.creation.reading',compact('creation','chapter'));

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
