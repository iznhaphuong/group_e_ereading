@extends('user.layout.master')

@section('title', $creation->name)
@section('main')
    @include('user.creation.partials.09-content', ['creation', $creation])
@endsection
