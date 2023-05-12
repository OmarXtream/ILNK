<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$user->username}}</title>
    @can('HasPremium')

    @if($user->page->theme)

    @php($style = $user->page->theme->path)
    <link rel="stylesheet" href="{{asset("templates/default/css/$style")}}">

    @else
    <link rel="stylesheet" href="{{asset('templates/default/css/style6.css')}}">

    @endif

    @else
    <link rel="stylesheet" href="{{asset('templates/default/css/style6.css')}}">

    @endcan

    <link rel="icon" type="image/x-icon" href="{{$user->page->logoPath()}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    body{
    background-color: {{$user->page->bgColor}};
    background-image: url("{{$user->page->bgPath()}}");
    background-size: cover;  
    background-repeat:no-repeat;
        }

    .circulo {
        background: rgb(221, 221, 221);
        border-radius: 52px;
        width: 38px;
        height: 38px;
        text-align: center;
        color: rgb(32, 32, 32);
        line-height: 38px;
    }

    .circulo:hover {
        background: rgb(5, 12, 35);
        color: rgb(255, 255, 255);
        -webkit-box-shadow: 2px 2px 2px rgba(50, 50, 50, 0.77);
        -moz-box-shadow: 2px 2px 2px rgba(50, 50, 50, 0.77);
        box-shadow: 2px 2px 2px rgba(50, 50, 50, 0.77);
    }
</style>
    

</head>

<body>
    <main>
        <div class="profile">
            <img src="{{$user->page->logoPath()}}" alt="{{$user->username}}">
            <h1>{{$user->username}}</h1>
        </div>
        @foreach($user->page->customButtons as $btn)
        <a href="{{$btn->url}}" target="blank">
            <div class="text-center">
                <p>{{$btn->title}}</p>
            </div>
        </a>
        @endforeach


        
        @if($user->page->menuType == 2)
        <a href="{{$user->url()}}/menu" target="blank">
            <div class="text-center">
                <p>{{@$user->page->menuTitle}} <i class="fa fa-bars"></i></p>
            </div>
        </a>

        @elseif(!empty($user->page->menuTitle) && !empty($user->page->menuLink))

        <a href="{{$user->page->menuLink}}" target="blank">
            <div class="text-center">
                <p>{{$user->page->menuTitle}} <i class="fa fa-bars"></i></p>
            </div>
        </a>

        @endif

        <a onclick="toggleSocials()" target="blank">
            <div class="text-center">
                <p>@lang('concept.socialmedia')</p>
            </div>
        </a>


        <div class="footer" id="socials" style="display:none;">
            @foreach($user->page->socialButtons as $btn)

        <a href="{{$btn->url}}" target="_blank" title="{{$btn->title}}">
            {!! $btn->Icon() !!}
        </a>
    
        @endforeach

    </div>

    </main>
    <button id="toggle-theme-btn"><i class="fa fa-lightbulb" aria-hidden="true"></i></button>
</body>
<script src="{{asset('templates/default/js/app.js')}}"></script>

<script>
    function toggleSocials() {
        var div = document.getElementById("socials");
        if (div.style.display === "none") {
            div.style.display = "block";
        } else {
            div.style.display = "none";
        }
    }
</script>

</html>