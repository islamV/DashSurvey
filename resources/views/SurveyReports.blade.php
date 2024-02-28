@extends('dash::app')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://editor.datatables.net/extensions/Editor/css/editor.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/2.0.0/css/select.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/3.0.0/css/buttons.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.5.2/css/dataTables.dateTime.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/colreorder/2.0.0/css/colReorder.dataTables.css">

<div class="row">
    {!! $content !!}
</div>

@livewire('survey-reports')

@endsection
