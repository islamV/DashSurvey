<?php
return [
    // Users Start //
     \App\Dash\Resources\AdminGroupRoles::class,
     \App\Dash\Resources\AdminGroups::class,
     \App\Dash\Resources\Admins::class,
     \App\Dash\Resources\Users::class,
    // Users End//
    \Modules\Guests\Dash\Resources\Guests::class,

    //surveys
    \Modules\Surveys\Dash\Resources\HotelsSurvey::class,
    \Modules\Surveys\Dash\Resources\HospitalsSurvey::class,
    \Modules\Surveys\Dash\Resources\ClubsSurvey::class,
    \Modules\Surveys\Dash\Resources\CoffeeShopsSurvey::class,
  
    //services
     \Modules\Services\Dash\Resources\Hotels::class,
     \Modules\Services\Dash\Resources\Hospitals::class,
     \Modules\Services\Dash\Resources\Clubs::class,
     \Modules\Services\Dash\Resources\CoffeeShops::class,

    // Questions
    \Modules\questions\Dash\Resources\HotelsQ::class,
    \Modules\questions\Dash\Resources\HospitalsQ::class,
    \Modules\questions\Dash\Resources\ClubsQ::class,
    \Modules\questions\Dash\Resources\CoffeeShopsQ::class,

     // Complaints
     \Modules\Complaints\Dash\Resources\HotelsComplaint::class,
     \Modules\Complaints\Dash\Resources\HospitalsComplaint::class,
     \Modules\Complaints\Dash\Resources\ClubsComplaint::class,
     \Modules\Complaints\Dash\Resources\CoffeeShopsComplaint::class,
    
     

];
