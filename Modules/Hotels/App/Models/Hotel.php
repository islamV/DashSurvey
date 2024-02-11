<?php

namespace Modules\Hotels\App\Models;

use Modules\Surveys\App\Models\Survey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Modules\Services\Database\factories\HotelFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */    protected $fillable = ['name' , 'address' ];
     public function survey():MorphMany{
        return $this->morphMany(Survey::class,'service');
    }


}
