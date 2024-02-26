<?php

namespace Modules\Guests\App\Models;

use Modules\Surveys\App\Models\Survey;
use Illuminate\Database\Eloquent\Model;
use Modules\Services\App\Models\Service;
use Modules\Guests\Database\factories\GuestFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name' , 'phone' ,'service_type','service_id'];

    public  function servey(){
        return $this->hasMany(Survey::class);
    }
    
    public  function service(){
        return $this->belongsTo(Service::class ,'service_id');
    }
}
