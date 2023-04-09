<!DOCTYPE html>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>{{$user->username}}</title>
    <link rel="stylesheet" href="{{asset('templates/default/css/style.css')}}">
    {{-- <link rel="icon" href="favicon.ico" type="image/x-icon"/> --}}
    <style>
    body{
    background-color: {{$user->page->bgColor}};
    background-image: url("{{$user->page->bgPath()}}");

        }
    </style>
</head>

<body>
    <img id="userPhoto" src="{{$user->page->logoPath()}}" alt="{{$user->username}}">
    
    <a href="{{$user->page->url()}}" id="userName">@ {{$user->username}}</a>
    <div id="links">
        @if($user->page->menuType == 1)
        <a class="link" href="{{$user->page->menuLink}}" target="_blank">{{$user->page->menuTitle}}</a>
        @endif
    </div>

    <!-- Javascript -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    {{-- <script  src="index.js"></script> --}}
</body>
</html>