<?php

namespace App\Livewire;

use Livewire\Component;

class Survey extends Component
{

   
    public $firstFrom ;
    public $lastFrom ;
    public $first_name ;
    public $last_name ;
    public $phone ;
    public $selectService = null;

    public function mount(){
        $this->firstFrom = TRUE;
        $this->lastFrom = false;
        $this->selectService = FALSE;
       
    }

    public function render()
    {
        

       
        $sections = [
            1 => ['فندق 1', 'فندق 2', 'فندق 3'],
            2 => ['مستوصف 1', 'مستوصف 2', 'مستوصف 3'],
            3 => ['كوفي شوب 1', 'كوفي شوب 2', 'كوفي شوب 3'],
        ];
         
 
            
    
        return view('livewire.survey'  ,
        [
            'sections'=> $this->selectService ? $sections[$this->selectService]: []
        ]);
    }

    public function toggelFrom(){  
        $this->firstFrom = !$this->firstFrom  ; 
        $this->lastFrom = !$this->lastFrom ;
    }
public function submit(){
    dd($this->sections) ;
}
}
