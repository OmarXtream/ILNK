<!doctype html>
<html lang="en" dir="@lang('concept.dir')">

<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- <meta name="keywords" content="HTML, CSS, JavaScript, "> --}}
    <meta name="description" content="يتيح مشروع انا متصل للمستخدم ب عمل صفحة تحتوي على جميع روابط وسائل التواصل االجت ماعي الخاصة به بسهولة ويسر كما يمكن 
    للعميل عرض قائمة منتجاته والتعديل عليها واالضافة لها او الحذف منها بكل سهولة وذلك لتعزيز وجودة على الشبكة المعلوماتية العالمية 
    وحضوره االلكتروني">
    <meta name="author" content="ILNK | انا متصل">
    <meta property="og:title" content="ILNK | انا متصل">
    <meta property="og:site_name" content="ILNK | انا متصل">
    <meta property="og:description" content="يتيح مشروع انا متصل للمستخدم ب عمل صفحة تحتوي على جميع روابط وسائل التواصل االجت ماعي الخاصة به بسهولة ويسر كما يمكن 
    للعميل عرض قائمة منتجاته والتعديل عليها واالضافة لها او الحذف منها بكل سهولة وذلك لتعزيز وجودة على الشبكة المعلوماتية العالمية 
    وحضوره االلكتروني">
    <meta property="og:type" content="website">
    <meta property="og:url" content="ILNK.com">
    <!-- <meta property="og:image" content="imgs/logo.png"> -->

    <!-- CSS -->
    <link rel="stylesheet" href="@lang('concept.bootstrap')">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">


    <!-- other -->
    <!-- <link rel="icon" href="imgs/icon.png"> -->

    <title>ILNK | انا متصل</title>
</head>

<body>

    <!-- page-content -->
    <div class="page-content">
        <main style="background-image: url({{ asset(__('home.bg')) }});">
            <div class="container py-3">
                
                @include('layout.user.navbar')
            
                <div class="mt-5">
                    <div class="row">
                        <div class="col-md-7 my-5 ml-auto text-dark">
                            <h1>@lang('home.welcome')</h1>
                            <h4 class="text-muted mb-5">@lang('home.welcomeCreate')</h4>
                            <a class="btn btn-primary mt-3 mx-2"
                            href="#">@lang('concept.createPage')</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>

      

             
        {{-- <div class="section3 py-5 bg-light text-center">
            <h1 class="span">{{ $answer_total }}</h1>
            <h3>@lang('home.eYet')</h3>
        </div> --}}
    </div>


    <!-- JavaScripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script>
        var a = "@lang('home.notReadyReport')";
        $("main").css('min-height', ($(window).height()));

        function openReport() {
            Swal.fire({
                icon: 'info',
                title: a,


            });
        }

    </script>
</body>

</html>
