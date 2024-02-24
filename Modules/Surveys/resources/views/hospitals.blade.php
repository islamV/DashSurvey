@extends('surveys::layouts.master')

@push('css')
<style>
    body{
    background-image: url("../img/HOTELB.jpg");
        
    }
</style>
@endpush
@section('cover')
<div class="cover"><img src="{{ asset('img/h.jpg') }}" alt=""></div>

@endsection