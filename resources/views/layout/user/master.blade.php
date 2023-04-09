
@include('layout.header')


@include('layout.user.navbar')



@yield('content')

@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@10"])

@include('layout.footer')

