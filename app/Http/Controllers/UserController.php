<?php

namespace App\Http\Controllers;

<<<<<<<< HEAD:app/Http/Controllers/CategoryCreationController.php
use App\Models\CategoryCreation;
use Illuminate\Http\Request;

class CategoryCreationController extends Controller
========
use Illuminate\Http\Request;

class UserController extends Controller
>>>>>>>> main:app/Http/Controllers/UserController.php
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
     * Display the specified resource.
     *
<<<<<<<< HEAD:app/Http/Controllers/CategoryCreationController.php
     * @param  \App\Models\CategoryCreation  $categoryCreation
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryCreation $categoryCreation)
========
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
>>>>>>>> main:app/Http/Controllers/UserController.php
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
<<<<<<<< HEAD:app/Http/Controllers/CategoryCreationController.php
     * @param  \App\Models\CategoryCreation  $categoryCreation
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryCreation $categoryCreation)
========
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
>>>>>>>> main:app/Http/Controllers/UserController.php
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
<<<<<<<< HEAD:app/Http/Controllers/CategoryCreationController.php
     * @param  \App\Models\CategoryCreation  $categoryCreation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryCreation $categoryCreation)
========
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
>>>>>>>> main:app/Http/Controllers/UserController.php
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
<<<<<<<< HEAD:app/Http/Controllers/CategoryCreationController.php
     * @param  \App\Models\CategoryCreation  $categoryCreation
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryCreation $categoryCreation)
========
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
>>>>>>>> main:app/Http/Controllers/UserController.php
    {
        //
    }
}
