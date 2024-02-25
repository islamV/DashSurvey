<?php

namespace Modules\Surveys\App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Questions\App\Models\Question;
use Modules\questions\Dash\Resources\HotelsQ;
use Modules\Surveys\Database\factories\AnswerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Services\App\Models\Service;

class Answer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['survey_id' , 'question_id' , 'answer' ,'type_service','type' , 'service_id'];
    public function question(){
        return $this->belongsTo(Question::class);
      }
    
    public function survey(){
        return $this->belongsTo(Survey::class ,'survey_id');
    }
    public  function service(){
        return $this->belongsTo(Service::class ,'service_id');
    }
      

}
