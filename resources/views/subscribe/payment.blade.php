@extends('layout.user.master')

@section('ExtraCss')
<link rel="stylesheet" href="{{ asset('assets/css/intlTelInput.css') }}">
@endsection

@section('content')

        <!-- page-content -->
        <div class="page-content">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-md-6 col-lg-5 text-center bg-light rounded py-4 my-5 animate__faster" id="p1">
                    @if(Session::has('errors'))
                    <div class="text-center alert alert-danger">
                      {{ Session::get('errors')->first()}}
                    </div>
                    @endif

                    <img src="{{ asset('assets/imgs/favorite-bookmark-star.svg')}}" class="img-fluid" alt="img">
                    <h4 class="mt-3">
                        @if($plan->name == "Free")
                        @lang('subscribe.free')
                        @else
                        @lang('subscribe.plus')
                        @endif
                    </h4>
                    <h6 class="mb-3"> @lang('payment.cost'): {{$plan->price}}</h6>
                    <!-- <ul class="list-group list-group-flush mb-3">
                        <li class="list-group-item bg-light">ميزة 1</li>
                        <li class="list-group-item bg-light">ميزة 2</li>
                      </ul> -->
                    <button class="btn btn-sm btn-primary" onclick="nextPart('p1', 'p2')">@lang('payment.subscribe')</button>
                </div>


                <div class="col-md-7 col-lg-8 bg-light rounded py-4 my-5 d-none animate__faster" id="p2">
                    <h4 class="mb-4 text-center">@lang('payment.paymentDetails')</h4>
                    <form method="POST" action="{{ route('subscribe.pay') }}">
                        @csrf
                        
                        <input type="hidden" name="plan" value="{{$plan->name}}">
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="cFirstName">@lang('payment.fName')</label>
                                <input type="text" class="form-control @error('firstName') is-invalid @enderror" value="{{ old('firstName') }}" name="firstName" id="cFirstName">
                                @error('firstName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror

                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="cLastName">@lang('payment.lName')</label>
                                <input type="text" class="form-control @error('lastName') is-invalid @enderror" value="{{ old('lastName') }}" name="lastName" id="cLastName">
                                @error('lastName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror

                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="phone">@lang('payment.phone')</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" name="phone" id="phone">

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="cEmail">@lang('payment.email')</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" id="cEmail">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror

                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="cDiscount">@lang('payment.discountCode')</label>
                                <input type="text" class="form-control @error('discount') is-invalid @enderror" value="{{ old('discount') }}" name="discount" id="cDiscount">
                                @error('discount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror

                            </div>

                            <div class="col-12">
                                <button class="btn btn-sm btn-primary" onclick="nextPart('p2', 'p3')">@lang('payment.continue')</button>
                            </div>
                        </div>
                </div>

                <div class="col-md-7 col-lg-8 bg-light rounded d-none py-4 my-5" id="p3">
                    <h4 class="mb-4 text-center">@lang('payment.paymentDetails')</h4>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="billing_address">@lang('payment.address')</label>
                                <input type="text" class="form-control @error('billing_address') is-invalid @enderror" value="{{ old('billing_address') }}" name="billing_address" id="billing_address">
                                @error('billing_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror

                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="state">@lang('payment.state')</label>
                                <br>
                                <input type="text" class="form-control @error('state') is-invalid @enderror" value="{{ old('state') }}" name="state" id="state">
                                @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror

                                {{-- <span class="text-muted">@lang('payment.stateHint')</span> --}}
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="city">@lang('payment.city')</label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}" name="city" id="city">
                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror

                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="postal_code">@lang('payment.zip')</label>
                                <input type="number" class="form-control @error('postal_code') is-invalid @enderror" value="{{ old('postal_code') }}" name="postal_code" id="postal_code">
                                @error('postal_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror

                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="cCountry">@lang('payment.country')</label>
                                <select class="form-control @error('address_country') is-invalid @enderror" name="address_country" id="address_country"></select>
                                @error('address_country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror

                            </div>

                            <div class="col-12">
                                <button class="btn btn-sm btn-primary">@lang('payment.pay')</button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
function nextPart(a, b) {
    event.preventDefault();
    animateCSS('#'+a, "fadeOut").then((message) => {
        $('#'+a).addClass('d-none');
        $("#"+b).removeClass('d-none');
        animateCSS('#'+b, "fadeIn");
    });
}
</script>
<script src="{{ asset('assets/js/intlTelInput.js') }}"></script>
<script>
  var countryData = window.intlTelInputGlobals.getCountryData(),
  input = document.querySelector("#phone"),
  addressDropdown = document.querySelector("#address_country");

  var iti = window.intlTelInput(input, {
    geoIpLookup: function (callback) {
                $.get("http://ipinfo.io", function () {}, "jsonp").always(function (resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "sa";
                    callback(countryCode);
                });
            },
  utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.5.0/js/utils.js", // just for formatting/placeholders etc
  initialCountry: "auto",
  hiddenInput: "dial_code",

  });

  // populate the country dropdown
for (var i = 0; i < countryData.length; i++) {
  var country = countryData[i];
  var optionNode = document.createElement("option");
  optionNode.value = country.iso2;
  var textNode = document.createTextNode(country.name);
  optionNode.appendChild(textNode);
  addressDropdown.appendChild(optionNode);
}
// set it's initial value
addressDropdown.value = iti.getSelectedCountryData().iso2;

// listen to the telephone input for changes
input.addEventListener('countrychange', function(e) {
  addressDropdown.value = iti.getSelectedCountryData().iso2;
});

// listen to the address dropdown for changes
addressDropdown.addEventListener('change', function() {
  iti.setCountry(this.value);
});
</script>
@endsection

