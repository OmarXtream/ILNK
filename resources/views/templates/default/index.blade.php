<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$user->username}}</title>

    @can('HasPremium')
    
    @if($user->page->theme)
    <link rel="stylesheet" href="{{asset("templates/default/css/'.$user->page->theme->path.' ")}}">
    @else
    <link rel="stylesheet" href="{{asset('templates/default/css/style6.css')}}">

    @endif

    @else
    <link rel="stylesheet" href="{{asset('templates/default/css/style6.css')}}">

    @endcan

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
        background-color: {{$user->page->bgColor}};
        background-image: url("{{$user->page->bgPath()}}");
        background-size: cover;  
        background-repeat:no-repeat;

            }
        </style>
    

</head>

<body>
    <main>
        <div class="profile">
            <img src="{{$user->page->logoPath()}}" alt="{{$user->username}}">
            <h1>{{$user->username}}</h1>
        </div>

        <a href="https://github.com/Rajni2002" target="blank">
            <div class="github">
                <img src="https://img.icons8.com/fluency/48/000000/github.png" alt="Github-icon" />
                <p>Collaborate <span>with me on Github</span></p>
            </div>
        </a>

        <a href="https://twitter.com/rajni2k2" target="blank">
            <div class="Twitter">
                <img src="https://img.icons8.com/fluency/48/000000/twitter.png" alt="Twitter-icon" />
                <p>Read <span>my threads Twitter</span></p>
            </div>
        </a>
        <a href="https://www.linkedin.com/in/rajnikant-dash-2k2/" target="blank">
            <div class="Linkedin">
                <img src="https://img.icons8.com/fluency/48/000000/linkedin.png" alt="Linked-icon" />
                <p>Connect <span>with me on Linkedin</span></p>
            </div>
        </a>


        @if($user->page->menuType == 1)
        <a href="{{$user->page->menuLink}}" target="blank">
            <div class="text-center">
                <p>{{$user->page->menuTitle}}</p>
            </div>
        </a>

        @endif

    </main>
    <button id="toggle-theme-btn"><i class="fa fa-lightbulb" aria-hidden="true"></i></button>
</body>
<script src="{{asset('templates/default/js/app.js')}}"></script>
</html>