@extends('surveys::layouts.master')

@push('css')
<link rel="stylesheet" href="{{ asset('css/hotel.css') }}">
@endpush
@section('cover')
<div class="cover"><img src="{{ asset('img/hotel.jpg') }}" alt=""></div>

@endsection