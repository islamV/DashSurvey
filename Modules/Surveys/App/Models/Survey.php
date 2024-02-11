<?php

namespace Modules\Surveys\App\Models;

use Carbon\Carbon;
use Modules\Clubs\App\Models\Club;
use Modules\Guests\App\Models\Guest;
use Modules\Hotels\App\Models\Hotel;
use Illuminate\Database\Eloquent\Model;
use Modules\Hospitals\App\Models\Hospital;
use Modules\Questions\App\Models\Question;
use Modules\CoffeeShops\App\Models\CoffeeShop;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Modules\Surveys\Database\factories\SurveyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Survey extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['guest_id' , 'service_type'  ,'service_id', 'status' , 'answers' ,'note'];

    public function getCreatedAtAttribute()
    {
        $date = Carbon::parse($this->attributes['created_at']) ;
     
        return  $date->diffForHumans();
    
    }
   public function Answers(){
    return $this->hasMany(Answer::class);
   }

    public function guest(){
        return $this->belongsTo(Guest::class ,'guest_id');
    }
    public function club(){
        return $this->belongsTo(Club::class , 'service_id' );
    }
    public function hotel(){
        return $this->belongsTo(Hotel::class , 'service_id'  );
    }
    public function coffeeshop(){
        return $this->belongsTo(CoffeeShop::class , 'service_id' );
    }
    public function hospital(){
        return $this->belongsTo(Hospital::class , 'service_id');
    }
}