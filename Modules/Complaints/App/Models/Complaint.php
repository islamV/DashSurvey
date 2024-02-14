<?php

namespace Modules\Complaints\App\Models;

use Carbon\Carbon;
use Modules\Guests\App\Models\Guest;
use Modules\Surveys\App\Models\Answer;
use Modules\Surveys\App\Models\Survey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Complaint extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['guest_id' , 'expired_time'  ,'service_id', 'status' ,'show_status','survey_id','type'];

    public function survey(){
        return $this->belongsTo(Survey::class);
    }
    public function guest(){
        return $this->belongsTo(Guest::class);
    }
    public function getCreatedAtAttribute()
    {
        $date = Carbon::parse($this->attributes['created_at']) ;
     
        return  $date->diffForHumans();
    
    }
    
   public function answers(){
    return $this->hasMany(Answer::class ,'id' , 'survey_id')->where('answer' ,'NotSatisfied');
   }
    
   
}
