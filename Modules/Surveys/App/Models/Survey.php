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
use Modules\questions\Dash\Resources\HotelsQ;
use Modules\Services\App\Models\Service;

class Survey extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['id','guest_id' , 'service_type'  ,'service_id', 'status' ,'note'];

    public function getCreatedAtAttribute($date)
    {
        $date = Carbon::parse($date) ;
     
        return empty($date) ? $date : date('h:m Y-m-d', strtotime($date)) .'--'. $date->diffForHumans();
    
    }
public function service(){
    return $this->belongsTo(Service::class ,'service_id') ;
}

   public function answers(){
    return $this->hasMany(Answer::class);
   }
 
    public function guest(){
        return $this->belongsTo(Guest::class ,'guest_id');
    }

   
	public function getUpdatedAtAttribute($date) {
		return empty($date) ? $date : date('Y-m-d', strtotime($date));
	}

	public function getDeletedAtAttribute($date) {
		return empty($date) ? null : date('Y-m-d', strtotime($date));
	}

    // public function club(){
    //     return $this->belongsTo(Club::class , 'service_id' );
    // }
    // public function hotel(){
    //     return $this->belongsTo(Hotel::class , 'service_id'  );
    // }
    // public function coffeeshop(){
    //     return $this->belongsTo(CoffeeShop::class , 'service_id' );
    // }
    // public function hospital(){
    //     return $this->belongsTo(Hospital::class , 'service_id');
    // }
}
