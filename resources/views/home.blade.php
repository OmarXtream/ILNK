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
    <meta property="og:image" content="{{ asset('assets/imgs/logo/lastilnklight.png') }}"> 

    <link rel="shortcut icon" href="{{ asset('assets/imgs/logo/favicon.png') }}">
    <link rel="icon" href="{{ asset('assets/imgs/logo/favicon.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/imgs/logo/favicon.png') }}">

    <!-- CSS -->
    <link rel="stylesheet" href="@lang('concept.bootstrap')">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">



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

                            @cannot('HasPlan')
                            <a class="btn btn-primary mx-2"
                            href="{{route('subscribe.index')}}">@lang('concept.createPage')</a>
                            @endcannot

                            @can('HasPlan')
                            <a class="btn btn-primary mx-2 mb-3"
                            href="{{route('page.index')}}">@lang('concept.myPage')</a>
                            <p>
                            @lang('home.active') {{ $currentSubscription?->expired_at->format('Y-m-d') }}
                            </p>
                            @endcan

                            <p class="mt-2">
                                @lang('home.CurrentMembership') : {{ $currentSubscription->plan->name ?? __('home.noActive') }}
                                <a href="{{route('subscribe.index')}}"> <small class="text-primary">@lang('home.plan.upgrade')</small></a> 
                            </p>
    
                            @cannot('HasPlan')
                                @if(Auth::user()->lastSubscription())
                                <p>
                                @lang('home.renew.text')    
                                </p>
                                <a class="btn btn-primary mt-3 mx-2"
                                href="{{route('subscribe.index')}}">@lang('concept.renew')</a>

                                @endif
                            @endcannot

                        </div>
                    </div>
                </div>
            </div>
        </main>

      

             
         {{-- <div class="section3 py-5 bg-light text-center">
            <h1 class="span">Powered By</h1>
            <h3>HWE</h3>
        </div>  --}}
    </div>

    <footer class="bg-dark py-3 text-center text-white font-weight-bold print">
        <a class="mx-2" href="https://HWE.sa" target="_blank"><img width="80px" height="40px" src="{{ asset('assets/imgs/logo/HWE.png') }}" alt="HWE"></a>
        </footer> 
        @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@10"])

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
