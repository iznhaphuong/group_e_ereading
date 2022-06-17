<?php

namespace App\Http\Controllers;

use App\Models\Creation;
use Illuminate\Http\Request;
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id is encrypted
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $creation = DB::table('creations')
            ->select('*')
            ->where(
                DB::raw('md5(concat(id,name))'),
                '=',
                $id
            )->get()[0];
        return view('user.creation.detail', ['creation' => $creation]);
    }
}
