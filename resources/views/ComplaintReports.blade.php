@extends('dash::app')
@section('content')

<div class="row">
    {!! $content !!}
</div>

@livewire('complaint-reports')
@endsection


