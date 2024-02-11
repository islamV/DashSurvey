<?php

namespace Modules\Clubs\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Clubs\Database\factories\ClubFactory;
use Modules\Surveys\App\Models\Survey;

class Club extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name' , 'address' ];
    public function survey(){
        return $this->morphOne(Survey::class,'service');
    }

}
