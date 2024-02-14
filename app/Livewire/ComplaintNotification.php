<?php

namespace App\Livewire;

use Livewire\Component;
use Modules\Complaints\App\Models\Complaint;

class ComplaintNotification extends Component
{
    public function render()
    {
        return view('livewire.complaint-notification');
    }
    public function Remove($complaintId){
        $complaint = Complaint::where('id' , $complaintId)->first();
        $complaint->show_status = 1;
        $complaint->save();
    }
}
