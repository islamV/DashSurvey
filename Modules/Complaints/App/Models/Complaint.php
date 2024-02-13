<?php

namespace Modules\Complaints\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Complaint extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['guest_id' , 'expired_time'  ,'service_id', 'status' ,'show_status','survey_id','type'];

    
   
}
