<?php

namespace Modules\Guests\App\Models;

use Modules\Surveys\App\Models\Survey;
use Illuminate\Database\Eloquent\Model;
use Modules\Guests\Database\factories\GuestFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name' , 'phone' ,'service_type'];

    public  function servey(){
        return $this->hasMany(Survey::class);
    }
    
    
}
