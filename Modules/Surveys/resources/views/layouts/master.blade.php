<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Survey- {{ $service }}</title>

    <meta name="description" content="{{ $description ?? '' }}">
    <meta name="keywords" content="{{ $keywords ?? '' }}">
    <meta name="author" content="{{ $author ?? '' }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <!-- Fonts -->
    
</head>

<body>
    
    
    @stack('css')

    <form action=" {{ route('servey', ['service' => $service]) }} "  class="contaner">

        <div class="head">
            <span>Survey information</span>
            <span>بيانات الاستبيان</span>
        </div>

        <div class="input">
            <div>
                <span>name *</span>
                <span>*الاسم</span>
            </div>
            <div>
                <input type="text" name="name" placeholder="الاسم" required>
            </div>
        </div>

        <div class="input">
            <div>
                <span>mobile number *</span>
                <span>*رقم الجوال</span>
            </div>
            <div>
                <input type="text" name="phone" placeholder="05XXXXXXXX" required>
            </div>
        </div>

        <div class="input">
            <div>
                <span>Branch *</span>
                <span>*الفرع</span>
            </div>
            <div>
                <select name="service_branch" id="">
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        @foreach ($questions as $question)
            <div class="input">
                <div>
                    <span>{{ $question->titleEn }}<span style="color: red">*</span></span>
                    <span> {!!$question->title  !!} <span style="color: red">*</span></span>
                </div>
                <div>
                    <select name="answers[{{ $question->id }}]" id="">
                        <option selected value="Satisfied">Satisfied راضى</option>
                        <option value="NotSatisfied">NotSatisfied غير راضى</option>
                    </select>
                </div>
            </div>
        @endforeach

        <div class="input">
            <div class="">
                <span>What can be done to improve the service? *</span>
                <span>* ماذا يمكن عملة لتحسين الخدمة؟</span>
            </div>

            <div class="note">
                <textarea name="note" id="" placeholder="ملاحظات / اقترحات لتحسين الخدمة"></textarea>
            </div>

        </div>

        <button class="btn-submit">submit | ارسال</button>

        @yield('cover')

        <div class="alert ar">
            <span>عملائنا الاعزاء</span>
            <p>يرجى مشاركة رأيكم فى هذا الاستبيان القصير , ومساعدتنا فى تحسين مستوى الخدمة لتفوق توقعتكم</p>
        </div>

        <div class="alert en">
            <span>Dear customers</span>
            <p>Please share your opinion in this short survey, to help us improve the level of service to exceed your expectations</p>
        </div>

    </form>




</body>

</html>
