@extends('layout.user.master')
@section('content')

    <div class="page-content">
        <div class="row justify-content-center align-items-center h-100">

            <div class="col-12 mb-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-dark mb-4">@lang('concept.profile')</h4>
                            {{-- <td> <span class="badge badge-light">@lang('concept.membership')</span></td> --}}
                            <td> <span style="background-color:#1D2646 "
                                    class="badge badge-warning text-white">@lang('concept.premium')</span></td>

                        <form>
                            <div class="form-row justify-content-center align-items-end">

                                <div class="col-md-3 mb-3">
                                    <label for="personalName">@lang('concept.username')</label>
                                    <input type="text" name="personalName" id="personalName" class="form-control" required
                                        value="{{ Auth::user()->username }}" disabled>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="personalMail">@lang('concept.email')</label>
                                    <input type="email" name="personalMail" id="personalMail" class="form-control" required
                                        value="{{ Auth::user()->email }}" disabled>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="personalPhone">@lang('concept.phone')</label>
                                    <input type="email" name="personalPhone" id="personalPhone" class="form-control" required
                                        value="{{ Auth::user()->phone }}" disabled>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <h4 class="text-dark">@lang('concept.myPageInfo')</h4>
            </div>


            <div class="col-md-7 col-lg-7">

                <div class="bg-light rounded py-4 px-2 my-5">
                    <div class="text-center">
                        <img src="{{ asset('assets/imgs/study.png') }}" class="mb-4 img-fluid mx-auto" width="50%" alt="Welcome!">
                    </div>

                    <h4 class="mb-4 text-center">@lang('concept.beta')</h4>

                    <p class="mb-2 text-center">
                        Soon
                    </p>

                </div>

            </div>

        </div>
    </div>
    </div>

@endsection
