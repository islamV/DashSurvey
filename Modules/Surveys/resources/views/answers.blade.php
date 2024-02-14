@php
$answers = $model->answers ; // model => survey 

@endphp
<div class="col-12">
  
  @foreach ( $answers as $answer  )
{{-- answer model answer --}}

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><bdi>{{ $answer->question->title}}:</bdi></div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <h4>{!! __('survey.'.$answer->answer)!!}</h4>
      </div>
      </div>
     @endforeach
</div>