<?php

namespace Modules\Guests\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Guests\Database\factories\GuestFactory;

class Guest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name' , 'phone' ,'service_type'];
    
    
}
