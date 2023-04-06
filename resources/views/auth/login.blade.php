@extends('layout.master')
@section('content')

    <div class="page-content">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-md-8 bg-light rounded py-4 my-5">
                <h4 class="mb-5 text-center">@lang('concept.loginTitle')</h4>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    {{-- {!! GoogleReCaptchaV3::renderOne('Stest', 'register') !!} --}}

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="email">@lang('concept.email')</label>
                                    <input type="email" id="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" placeholder="Email@name.com" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="col-12 mb-3">
                                    <label for="password">@lang('concept.password')</label>
                                    <input type="password" id="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" placeholder="*****"
                                        required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="col-12 mb-3">
                                    <div class="mt-3 mb-4" id="Stest"></div>

                                    <button type="submit" class="btn btn-sm btn-primary">@lang('concept.login')</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                             
                                <img class="img-fluid" src="{{ asset('assets/imgs/undraw/login.png') }}" alt="@lang('concept.login')">
                               

                            </div>
                        </div>





                    </div>
                </form>
                @if (Session::has('errors'))
                    <div class="text-center alert alert-danger mt-3">
                        {{ Session::get('errors')->first() }}
                    </div>
                @endif

            </div>

        </div>
    </div>
    </div>
@endsection
@section('scripts')

    {{-- {!! GoogleReCaptchaV3::init() !!} --}}
@endsection
