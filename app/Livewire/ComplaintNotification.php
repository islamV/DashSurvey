<?php

namespace App\Livewire;

use Livewire\Component;
use Modules\Complaints\App\Models\Complaint;

class ComplaintNotification extends Component
{
    public Complaint $complaint;
    public function mount(Complaint $complaint){
        $this->complaint = $complaint;
    }
    public function render()
    {
        return view('livewire.complaint-notification');
    }
    public function Remove($complaintId){
    dd($complaintId);
    }
}
