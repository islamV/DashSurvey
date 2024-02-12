<?php

namespace Modules\Questions\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Questions\Database\factories\QuestionFactory;
use Modules\Surveys\App\Models\Answer;
use Modules\Surveys\App\Models\Survey;

class Question extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title' , 'service_type' ,'service_id'];
   
public function survey(){
    return $this->belongsTo(Survey::class);
}
public function answers(){
    return $this->hasMany(Answer::class);
    
    
}
}
