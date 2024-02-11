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
    \Modules\Hotels\Dash\Resources\Hotels::class,
    \Modules\Hospitals\Dash\Resources\Hospitals::class,
    \Modules\Clubs\Dash\Resources\Clubs::class,
    \Modules\CoffeeShops\Dash\Resources\CoffeeShops::class,

    // Questions
    \Modules\questions\Dash\Resources\HotelsQ::class,
    \Modules\questions\Dash\Resources\HospitalsQ::class,
    \Modules\questions\Dash\Resources\ClubsQ::class,
    \Modules\questions\Dash\Resources\CoffeeShopsQ::class,

];