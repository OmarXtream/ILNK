@extends('layout.user.master')

@section('ExtraCss')
<link rel="stylesheet" href="https://cdn.lineicons.com/3.0/lineicons.css"> 
<link rel="stylesheet" href="{{ asset('assets/css/sub.css') }}">

@endsection

@section('content')
        <!-- page-content -->
        <div class="page-content mb-4">
         
            <section class="price_plan_area section_padding_130_80" id="pricing">
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-12 col-sm-8 col-lg-6">
                      <!-- Section Heading-->
                      <div class="section-heading text-center wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <h3>@lang('subscribe.headTitle')</h3>
                        <p>@lang('subscribe.headDes')</p>
                        <div class="line"></div>
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <!-- Single Price Plan Area-->
                    <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                      <div class="single_price_plan wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="title">
                          <h3>@lang('subscribe.free')</h3>
                          <p>@lang('subscribe.free.des')</p>
                          <div class="line"></div>
                        </div>
                        <div class="price">
                          <h4>@lang('subscribe.freePrice')</h4>
                        </div>
                        <div class="description">
                          <p><i class="lni lni-checkmark-circle"></i> @lang('subscribe.privateLogo')</p>
                          <p><i class="lni lni-checkmark-circle"></i> @lang('subscribe.SocialMedia')</p>
                          <p><i class="lni lni-checkmark-circle"></i> @lang('subscribe.bgColor')</p>
                          <p><i class="lni lni-checkmark-circle"></i> @lang('subscribe.buttons')</p>
                          <p><i class="lni lni-checkmark-circle"></i> @lang('subscribe.menuLink')</p>
                          <p><i class="lni lni-checkmark-circle"></i> @lang('subscribe.QRcode')</p>
                          <p><i class="lni lni-checkmark-circle"></i> @lang('subscribe.pageApper')</p>
                          {{-- <p><i class="lni lni-close"></i></p> --}}


                        </div>
                        <div class="button"><a class="btn btn-success btn-2" href="{{route('subscribe.payment',"Free")}}">@lang('subscribe.subscribe')</a></div>
                      </div>
                    </div>
                    <!-- Single Price Plan Area-->
                    <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                      <div class="single_price_plan active wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <!-- Side Shape-->
                        <div class="side-shape"><img src="{{asset('assets/imgs/popular-pricing.png')}}" alt=""></div>
                        <div class="title"><span>@lang('subscribe.popular')</span>
                          <h3>@lang('subscribe.plus')</h3>
                          <p>@lang('subscribe.plus.des')</p>
                          <div class="line"></div>
                        </div>
                        <div class="price">
                          <h4>@lang('subscribe.plusPrice')</h4>
                        </div>
                        <div class="description">
                          <p><i class="lni lni-diamond-alt"></i> @lang('subscribe.freeFeatures')</p>
                          <p><i class="lni lni-checkmark-circle"></i> @lang('subscribe.bgGif')</p>
                          <p><i class="lni lni-checkmark-circle"></i> @lang('subscribe.eMenu')</p>
                          <p><i class="lni lni-checkmark-circle"></i> @lang('subscribe.eMenuResp')</p>
                          <p><i class="lni lni-checkmark-circle"></i> @lang('subscribe.themes')</p>
                          <p><i class="lni lni-checkmark-circle"></i> @lang('subscribe.shareButton')</p>
                          <p><i class="lni lni-checkmark-circle"></i> @lang('subscribe.QRprint')</p>

                        </div>
                        <div class="button"><a class="btn btn-warning" href="{{route('subscribe.payment',"Plus")}}">@lang('subscribe.subscribe')</a></div>
                      </div>
                    </div>
                    <!-- Single Price Plan Area-->
                    <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                      <div class="single_price_plan wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="title">
                          <h3>@lang('subscribe.pro')</h3>
                          <p>@lang('subscribe.pro.des')</p>
                          <div class="line"></div>
                        </div>
                        <div class="price">
                          <h4>@lang('subscribe.proPrice')</h4>
                        </div>
                        <div class="description">
                          <p><i class="lni lni-diamond-alt"></i> @lang('subscribe.plusFeatures')</p>
                          <p><i class="lni lni-spinner"></i> @lang('subscribe.Soon')</p>
                        </div>
                        <div class="button"><button class="btn btn-info" href="#" disabled>@lang('subscribe.Soon')</button></div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>

        </div>

@endsection
