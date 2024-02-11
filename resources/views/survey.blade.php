<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">


    <title>{{ __('survey.title') }}</title>
</head>

<body>
 

    <div class="container">
        <header>{{ __('survey.header') }}</header>

        
        @livewire('survey')
        @livewireScripts
    </div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>