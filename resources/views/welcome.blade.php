@extends('layout.master')
@section('content')

<div class="page-content" data-class="pTestNav">
    <div class="row justify-content-center align-items-center h-100" id="begin">
        <div class="col-md-6 col-lg-5 bg-light text-center rounded py-4 my-5 animate__faster" id="p1">
            @if(Session::has('errors'))
            <div class="text-center alert alert-danger">
              {{ Session::get('errors')->first()}}
            </div>
            @endif

            <img src="{{ asset('assets/imgs/logo/lastilnkdard.png')}}" class="mb-4 img-fluid mx-auto" width="50%" alt="logo">
            <h4 class="text-center">@lang('concept.welcome') </h4>
            <p class="mt-3 mb-3">{!! __('concept.des') !!}</p>
            {{-- <button class="btn btn-sm btn-primary mx-auto" onclick="nextPart()">@lang('test.go')</button> --}}
        </div>

 
    </div>
</div>
@endsection

@section('scripts')

@endsection
