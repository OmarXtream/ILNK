      <!-- navbar -->
      <nav class="navbar navbar-expand-md py-3 navbar-light bg-white shadow rounded mt-3 mb-5">
          <a class="navbar-brand span font-weight-bold" href="/"><img width="70px" height="45px" src="{{ asset('assets/imgs/logo/lastilnkdard.png') }}" alt="@lang('concept.ILNK')"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-md-auto d-block d-md-flex justify-content-center align-items-center">
                  <li class="nav-item mr-md-3" id="pTestNav">
                      <a class="nav-link" href="{{ route('welcome') }}">@lang('concept.home')</a>
                  </li>

                  {{-- <li class="nav-item mr-md-5" id="calculatorNav">
                      <a class="nav-link" href="{{ route('calculator') }}">@lang('concept.S-LC')</a>
                  </li> --}}
                  <li class="nav-item dropdown mr-md-1">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <button class="btn btn-sm btn-secondary d-flex justify-content-center align-items-center"
                              style="width: 40px; height: 40px">
                               <img src="{{ asset('assets/imgs/language.png') }}" alt="Language"> 
                          </button>
                      </a>
                      <div class="dropdown-menu position-absolute" aria-labelledby="navbarDropdown">
                          @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                              <a class="dropdown-item" hreflang="{{ $localeCode }}"
                                  href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</a>
                          @endforeach
                      </div>
                  </li>


                  <li class="nav-item mr-md-2"">
                    <a href="{{ route('register') }}"><button class="btn btn-sm btn-secondary"
                            style="height: 40px">@lang('concept.register')</button></a>
                    </li>

                  <li class="nav-item">
                      <a href="{{ route('login') }}"><button class="btn btn-sm btn-primary"
                              style="height: 40px">@lang('concept.login')</button></a>
                  </li>

              </ul>
          </div>
      </nav>
