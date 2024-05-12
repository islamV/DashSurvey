<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Modules\Guests\App\Models\Guest;
use Modules\Surveys\App\Models\Survey;
use Modules\Surveys\Dash\Resources\HotelsSurvey;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@test.com',
        //     'password'=> Hash::make('123456')
        // ]);
        for ($i=0; $i < 65; $i++) { 
            Survey::create([
                'guest_id'=>11,
                'service_id'=>1,
                'service_type' =>'hotels',
                'status' => 'positive' ,
                'note' => ''
            ]);
            # code...
        }
    }
}
