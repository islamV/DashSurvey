<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="{{ asset('css/club.css') }}">
</head>
<body>


    <form action="{{ route('servey' ,['service'=>'clubs']) }}" class="contaner">
        <div class="head">
            <span>Survey information</span>
            <span>بيانات الاستبيان</span>
        </div>

        <div class="input">
            <div>
                <span>name <span style="color: red">*</span></span>
                <span><span style="color: red">*</span>الاسم</span>
            </div>
            <div>
                <input  name="name" type="text" placeholder="الاسم" required>
            </div>
        </div>
        <div class="input">
            <div>
                <span>mobile number <span style="color: red">*</span></span>
                <span><span style="color: red">*</span>رقم الجوال</span>
            </div>
            <div>
                <input name="phone" type="text" placeholder="01234567899" required>
            </div>
        </div>



        <div class="input">
            <div>
                <span>Branch <span style="color: red">*</span></span>
                <span>*الفرع</span>
            </div>
            <div>
                <select name="service_branch" id="">
                 @foreach ($clubs as $club )
                     <option value="{{ $club->id }}">{{ $club->name }}</option>
                 @endforeach
                </select>
            </div>
        </div>
        @foreach ($questions as $question )
        <div class="input">
            <div>
                <span>{{ $question->title }} <span style="color: red">*</span></span>
                <span>{{ $question->title }} <span style="color: red">*</span></span>
            </div>
            <div>
                <select name="answers[]" id="">
                    <option selected value="Satisfied">Satisfied راضى</option>
                    <option  value="NotSatisfied">NotSatisfied  غير راضى</option>
                </select>
            </div>
        </div>
        @endforeach
        <div class="input">
            <div>
                <span>What can be done to improve the service? *</span>
                <span>* ماذا يمكن عملة لتحسين الخدمة؟</span>
            </div>
            <div>
                <textarea name="note" id="" placeholder="ملاحظات / اقترحات لتحسين الخدمة"></textarea>
            </div>
        </div>

        <button class="btn-submit">submit | ارسال</button>
        
        <div class="cover"><img src="{{ asset('img/c.jpg') }}" alt=""></div>

        <div class="alert ar">
            <span>عملائنا الاعزاء</span>
            <p>يرجى مشاركة رأيكم فى هذا الاستبيان القصير , ومساعدتنا فى تحسين مستوى 
                الخدمة لتفوق توقعتكم
            </p>
        </div>

        <div class="alert en">
            <span>Dear customers</span>
            <p>Please share your opinion in this short survey, to help
                us improve the level of service to exceed your expectations
            </p>
        </div>

    </form>



</body>
</html>