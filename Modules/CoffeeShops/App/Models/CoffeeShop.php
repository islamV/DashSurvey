<?php

namespace Modules\CoffeeShops\App\Models;

use Modules\Surveys\App\Models\Survey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Services\Database\factories\CoffeeShopFactory;

class CoffeeShop extends Model
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
