<div class="list-group-item  align-items-center border-bottom">
    <div class="d-flex">
       
        <div class="mt-1">
            <a  href="{{ route('show_complaint',['complain_id'=>$complaint->id]) }}" class="font-weight-semibold fs-16">{{ $complaint->survey->guest->name}} <span class="text-muted font-weight-normal">{{ __('survey.Newcomplain') }}</span></a>
            <span class="clearfix"></span>
          
            <span class="text-muted fs-13 ms-auto"><i class="mdi mdi-clock text-muted me-1"></i>{{ $complaint->created_at }}</span>
        </div>
        <div class="ms-auto">
            <a href="" class="me-0 option-dots" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <span class="feather feather-more-horizontal"></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" role="menu">
                <li><a  href="{{ route('show_complaint',['complain_id'=>$complaint->id]) }}"><i class="feather feather-eye me-2"></i>View</a></li>
                <li><a  href=""><i class="feather feather-plus-circle me-2"></i>Add</a></li>
                <li><a  href=""><i class="feather feather-plus-circle me-2"></i>Remove</a></li>
             {{-- <button type="submit" wire.submit.prevent ="Remove({{ $complaint->id }})" ></button> --}}
                <li><a  href="javascript:void(0);"><i class="feather feather-settings me-2"></i>More</a></li>
            </ul>
        </div>
 
        {{-- @livewire('complaint-notification' , ['complaint'=> $complaint] ) --}}
    </div>
</div>