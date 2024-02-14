@php
    dd($complaint)
@endphp
        <div class="ms-auto">
            <a href="" class="me-0 option-dots" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <span class="feather feather-more-horizontal"></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" role="menu">
                <li><a  href="{{ route('show_complaint',['complain_id'=>$complaint->id]) }}"><i class="feather feather-eye me-2"></i>View</a></li>
                <li><a  href=""><i class="feather feather-plus-circle me-2"></i>Add</a></li>
             <button type="submit" wire.submit.prevent ="Remove({{ $complaint->id }})" >Remove</button>
                <li><a  href="javascript:void(0);"><i class="feather feather-settings me-2"></i>More</a></li>
            </ul>
        </div>
 


