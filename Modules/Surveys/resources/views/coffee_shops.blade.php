@extends('surveys::layouts.master')

@push('css')
<style>
    body{
    background-image: url("../img/HOTELB.jpg");
        
    }
</style>
@endpush
@section('cover')
<div class="cover"><img src="{{ asset('img/cs.jpg') }}" alt=""></div>

@endsection