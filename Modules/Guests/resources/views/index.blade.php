@extends('guests::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('guests.name') !!}</p>
@endsection
