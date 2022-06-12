@extends('user.layout.master')

@section('title', 'Ereading')
@section('main')
<div class="container">
        <div class="row my-4">
            <div class="col-8">
                @include('user.creation.partials.05-content')
            </div>
            <div class="col-4"></div>
        </div>
        <div class="my-4">
            @include('user.creation.partials.06-content')
        </div>
        <div class="my-4">
            @include('user.creation.partials.07-content')
        </div>
</div>

@endsection


