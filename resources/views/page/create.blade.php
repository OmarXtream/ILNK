@extends('layout.user.master')

@section('ExtraCss')
<link rel="stylesheet" href="{{ asset('assets/css/steps.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/mdbassit/Coloris@latest/dist/coloris.min.css"/>

<style>
    
.wrapper{
  display: inline-flex;
  height: 100px;
  width: 400px;
  align-items: center;
  justify-content: space-evenly;
  border-radius: 5px;
  padding: 20px 15px;
  box-shadow: 5px 5px 30px rgba(0,0,0,0.2);
}
.wrapper .option{
  background: #fff;
  height: 100%;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: space-evenly;
  margin: 0 10px;
  border-radius: 5px;
  cursor: pointer;
  padding: 0 10px;
  border: 2px solid lightgrey;
  transition: all 0.3s ease;
}
.wrapper .option .dot{
  height: 20px;
  width: 20px;
  background: #d9d9d9;
  border-radius: 50%;
  position: relative;
}
.wrapper .option .dot::before{
  position: absolute;
  content: "";
  top: 4px;
  left: 4px;
  width: 12px;
  height: 12px;
  background: #1D2646;
  border-radius: 50%;
  opacity: 0;
  transform: scale(1.5);
  transition: all 0.3s ease;
}
input[type="radio"]{
  display: none;
}
#option-1:checked:checked ~ .option-1,
#option-2:checked:checked ~ .option-2{
  border-color: #C6C9D1;
  background: #C6C9D1;
}
#option-1:checked:checked ~ .option-1 .dot,
#option-2:checked:checked ~ .option-2 .dot{
  background: #fff;
}
#option-1:checked:checked ~ .option-1 .dot::before,
#option-2:checked:checked ~ .option-2 .dot::before{
  opacity: 1;
  transform: scale(1);
}
.wrapper .option span{
  font-size: 20px;
  color: #808080;
}
#option-1:checked:checked ~ .option-1 span,
#option-2:checked:checked ~ .option-2 span{
  color: #fff;
}
</style>
@endsection

@section('content')
        <!-- page-content -->
        <div class="page-content mb-4">
            @if (Session::has('errors'))
            <div class="text-center alert alert-danger mt-3">
                {{ Session::get('errors')->first() }}
            </div>
            @endif

            <div class="container">
                <div class="wizard my-5">
                    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                        <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('page.logoAndbg')">
                            <a class="nav-link active rounded-circle mx-auto d-flex align-items-center justify-content-center" href="#step1" id="step1-tab" data-bs-toggle="tab" role="tab" aria-controls="step1" aria-selected="true">
                                <i class="fas fa-image"></i>
                            </a>
                        </li>
                        <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('page.menuAndappearance')">
                            <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center" href="#step2" id="step2-tab" data-bs-toggle="tab" role="tab" aria-controls="step2" aria-selected="false" title="Step 2">
                                <i class="fas fa-star"></i>
                            </a>
                        </li>
                        <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('concept.socialmedia')">
                            <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center" href="#step3" id="step3-tab" data-bs-toggle="tab" role="tab" aria-controls="step3" aria-selected="false" title="Step 3">
                                <i class="fas fa-share-alt"></i>
                            </a>
                        </li>
                        <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('page.CustomButtons')">
                            <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center" href="#step4" id="step4-tab" data-bs-toggle="tab" role="tab" aria-controls="step4" aria-selected="false" title="Step 4">
                                <i class="fas fa-flag-checkered"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" role="tabpanel" id="step1" aria-labelledby="step1-tab">
                            
                            <h3 class="mt-4">@lang('page.logoAndbg')</h3>
							<div class="row justify-content-center align-items-center h-100">
								<div class="col-md-8 bg-light rounded py-4 my-5">					
							<div class="form-row">
                @if($page && $page->logo)  
                <img class="mx-auto rounded-circle" src="{{@$page->logoPath()}}" alt="logo" width="304" height="236">
                @endif
							<div class="row">

								<div class="col-12 mb-3">
									<label for="dropzone">@lang('page.logo')</label>
									<form method="post" action="{{route('page.logo.store')}}" enctype="multipart/form-data" 
									class="dropzone" id="dropzone">
					 					 @csrf
				  					</form>   
				  
								</div>

								<hr>
                @if($page && $page->bgImg)  
                <img class="mx-auto rounded-circle" src="{{@$page->bgPath()}}" alt="logo" width="304" height="236">
                @endif

								<div class="col-12 mb-3">
									<label for="dropzone">@lang('page.bgImage')</label>
									<form method="post" action="{{route('page.bgImage.store')}}" enctype="multipart/form-data" 
									class="dropzone" id="BGdropzone">
					 					 @csrf
				  					</form>   
				  
								</div>
                                <form method="post" action="{{route('page.create')}}">
                                    @csrf
                                <div class="col-12 mb-3">
                                    <label for="bgColor">@lang('page.bgColor')</label>
                                    <input type="text" id="bgColor" name="bgColor"
                                        class="coloris instance form-control @error('bgColor') is-invalid @enderror"
                                        value="{{ old('bgColor') ? old('bgColor') : @$page->bgColor}}" placeholder="#fff">
                                    @error('bgColor')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>


							</div>

						</div>
					</div>
				</div>


                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-primary next">@lang('concept.next') <i class="fas fa-angle-right"></i></button>
                            </div>
                        </div>
                        <div class="tab-pane fade" role="tabpanel" id="step2" aria-labelledby="step2-tab">
                            
                            <h3 class="mt-4">@lang('page.menuAndappearance')</h3>
							<div class="row justify-content-center align-items-center h-100">
								<div class="col-md-8 bg-light rounded py-4 my-5">					
							<div class="form-row">

							<div class="row">
                                <div class="col-12 mb-3">
                                    <label for="des">@lang('page.des')</label>
                                    <textarea id="des" name="des"
                                        class="form-control @error('des') is-invalid @enderror"
                                         placeholder="..." >{{ old('des') ? old('des') : @$page->des}}</textarea>
                                    @error('des')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
                                <div class="col-12 mb-3">
                                    <label for="theme">@lang('page.theme')</label>
                                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                        <option value="1">@lang('page.defaultTheme')</option>
                                      </select>
                                      
								</div>


                                <div class="col-12 mb-3">
                                    <label for="menuType">@lang('page.menuType') :</label>
                                    <div class="wrapper">
                                        <input type="radio" name="menuType" 
                                        value="1" id="option-1">
                                        <input type="radio" name="menuType" 
                                        value="2" id="option-2">
                                          <label for="option-1" class="option option-1">
                                            <div class="dot"></div>
                                             <span>@lang('page.menu.directLink')</span>
                                             </label>
                                          <label for="option-2" class="option option-2">
                                            <div class="dot"></div>
                                             <span>@lang('page.menu.interactive')</span>
                                          </label>
                                       </div>

                                       <div class="1 selectt mt-5" style="display: none;">
                                        <label for="menuTitle">@lang('concept.title')</label>
                                        <input type="text" id="menuTitle" name="menuTitle"
                                            class="form-control @error('menuTitle') is-invalid @enderror"
                                            value="{{ old('menuTitle') ? old('menuTitle') : @$page->menuTitle}}" placeholder="@lang('concept.title')">
                                        @error('menuTitle')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror


                                        <label class="mt-2" for="menuLink">@lang('concept.link')</label>
                                        <input type="text" id="menuLink" name="menuLink"
                                            class="form-control @error('menuLink') is-invalid @enderror"
                                            value="{{ old('menuLink') ? old('menuLink') : @$page->menuLink}}" placeholder="@lang('concept.link')">
                                        @error('menuLink')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        

                                    </div>
                                      <div class="2 selectt mt-5" style="display: none;">

                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createProduct">
                                            @lang('page.addProduct') <i class="fas fa-cookie-bite"></i>
                                          </button>
                                      
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary previous"><i class="fas fa-angle-left"></i> @lang('concept.prev')</button>
                                <button type="button" class="btn btn-primary next">@lang('concept.next') <i class="fas fa-angle-right"></i></button>
                            </div>
                        </div>
                        <div class="tab-pane fade" role="tabpanel" id="step3" aria-labelledby="step3-tab">
                           
                           
                            <h3 class="mt-4">@lang('concept.socialmedia')</h3>
                            <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#createSocial">
                                @lang('page.addButton') <i class="fas fa-plus"></i>
                              </button>

                            <div class="row justify-content-center align-items-center h-100">
                        <div class="col-md-8 bg-light rounded py-4 my-5">					
                      <div class="row d-flex justify-content-center">
					
                                <div class="col-12 mb-3">
                                    <h5 class="text-center mb-2">@lang('page.socialMenu')</h5>
                                    <table class="table table-bordered" id="socialTable">
                                        <thead>
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">@lang('concept.title')</th>
                                            <th scope="col">@lang('concept.link')</th>
                                          </tr>
                                        </thead>
                                        <tbody class="text-center">
                                          @foreach($socialButtons as $btn)
                                          <tr id="s-{{$btn->id}}">
                                            <td><i class="{{$btn->Icon()}}" aria-hidden="true"></i></td>
                                            <td>{{$btn->title}}</td>
                                            <td>{{$btn->url}}</td>
                                            <td> <button type="button" onclick="DeleteS({{$btn->id}})" class="btn btn-danger text-white"><i class="fa fa-times"></i> </button></td>

                                          </tr>
                                          @endforeach

                                        </tbody>
                                      </table>
                
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                            
                            
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary previous"><i class="fas fa-angle-left"></i> @lang('concept.prev')</button>
                                <button type="button" class="btn btn-primary next">@lang('concept.next') <i class="fas fa-angle-right"></i></button>
                            </div>
                        </div>
                        <div class="tab-pane fade" role="tabpanel" id="step4" aria-labelledby="step4-tab">
                            
                            <h3 class="mt-4">@lang('page.CustomButtons')</h3>
                            <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#createButton">
                                @lang('page.addButton') <i class="fas fa-plus"></i>
                              </button>

                            <div class="row justify-content-center align-items-center h-100">
								<div class="col-md-8 bg-light rounded py-4 my-5">					
							<div class="row d-flex justify-content-center">
					
                                <div class="col-12 mb-3">
                                    <h5 class="text-center mb-2">@lang('page.ButtonsMenu')</h5>
                                    <table class="table table-bordered" id="customTable">
                                        <thead>
                                          <tr>
                                            <th scope="col">@lang('concept.title')</th>
                                            <th scope="col">@lang('concept.link')</th>
                                            <th scope="col">-</th>
                                          </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @foreach($customButtons as $btn)
                                            <tr id="c-{{$btn->id}}">
                                              <td>{{$btn->title}}</td>
                                              <td>{{$btn->url}}</td>
                                              <td> <button type="button" onclick="DeleteC({{$btn->id}})" class="btn btn-danger text-white"><i class="fa fa-times"></i> </button></td>

                                            </tr>
                                          @endforeach

                                        </tbody>
                                      </table>
                
                                        </div>
                                    </div>
                                </div>
                            </div>   
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary previous"><i class="fas fa-angle-left"></i> @lang('concept.prev')</button>
                                <button type="submit" class="btn btn-primary">@lang('concept.send') <i class="fas fa-check"></i></button>
                            </div>
                        </div>

                    </form>

                    </div>
                </div>
            </div>


            <div class="modal fade" id="createButton" tabindex="-1" role="dialog" aria-labelledby="createUsingModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="createUsingModalTitle"><img src="{{asset("assets/imgs/edit.svg")}}" alt="Edit">@lang('page.addButton')</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="modal-body">

                        <form id="CustomForm" onsubmit="Create('{{route('page.ButtonCreate')}}','CustomForm','createButton'); return false;">
                        <div class="form-row">
                                    <div class="w-100 mb-3">
                                        <label for="pTitle" class="w-100 mb-2"> @lang('concept.title') </label>
                                        <input type="text" name="pTitle" class="form-control" placeholder="." required>
                                    </div>

                                    <div class="w-100 mb-3">
                                        <label for="link" class="w-100 mb-2"> @lang('concept.link') </label>
                                        <input type="text" name="link" class="form-control" required>
                                    </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('concept.cancel')</button>
                      <button type="submit" class="btn btn-primary">@lang('concept.send')</button>
                    </div>
                  </form>

                  </div>
                </div>
              </div>

            <div class="modal fade" id="createSocial" tabindex="-1" role="dialog" aria-labelledby="createUsingModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="createUsingModalTitle"><img src="{{asset("assets/imgs/edit.svg")}}" alt="Edit">@lang('page.addButton')</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="modal-body">

                        <form id="socialForm" onsubmit="Create('{{route('page.SocialCreate')}}','socialForm','createSocial'); return false;">
                        <div class="form-row">
                                    <div class="w-100 mb-3">
                                        <label for="pTitle" class="w-100 mb-2"> @lang('concept.title') </label>
                                        <input type="text" name="pTitle" class="form-control" placeholder="." required>
                                    </div>

                                    <div class="w-100 mb-3">
                                        <label for="link" class="w-100 mb-2"> @lang('concept.link') </label>
                                        <input type="text" name="link" class="form-control" required>
                                    </div>

                                    <div class="w-100 mb-3">
                                        <label for="platform">@lang('page.platform')</label>
                                        <select name="platform" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                            <option value="1"><i class="fab fa-twitter" aria-hidden="true"></i> Twitter</option>
                                            <option value="2"><i class="fab fa-facebook" aria-hidden="true"></i> FaceBook</option>
                                            <option value="3"><i class="fab fa-linkedin" aria-hidden="true"></i> LinkedIn</option>

                                          </select>
                                    </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('concept.cancel')</button>
                      <button type="submit" class="btn btn-primary">@lang('concept.send')</button>
                    </div>
                  </form>

                  </div>
                </div>
              </div>

            <div class="modal fade" id="createProduct" tabindex="-1" role="dialog" aria-labelledby="createUsingModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="createUsingModalTitle"><img src="{{asset("assets/imgs/edit.svg")}}" alt="Edit">@lang('page.addProduct')</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="modal-body">

                        <form onsubmit="return false;">
                        <div class="form-row">
                                    <h3 class="mb-3"> @lang('page.productInfo') </h3>
                                    <div class="w-100 mb-3">
                                        <label for="pTitle" class="w-100 mb-2"> @lang('concept.title') </label>
                                        <input type="text" name="pTitle" class="form-control" placeholder="." required>
                                    </div>

                                    <div class="w-100 mb-3">
                                        <label for="pPrice" class="w-100 mb-2"> @lang('payment.cost') </label>
                                        <input type="number" name="pPrice" class="form-control" required>
                                    </div>

                                    <div class="w-100 mb-3">
                                        <label for="img" class="w-100 mb-2"> @lang('concept.img') </label>
                                        <input type="file" name="img" class="form-control" required>
                                    </div>

 
                               
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('concept.cancel')</button>
                      <button type="submit" class="btn btn-primary">@lang('concept.send')</button>
                    </div>
                  </div>
                </div>
              </div>

        </div>

@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.js"></script>
<script src="https://cdn.jsdelivr.net/gh/mdbassit/Coloris@latest/dist/coloris.min.js"></script>
<script>

function Create(route,formID,modelID){
    var form = $('#'+formID);
sendData(route , form.serialize())
    .then(function(response) {
        if (response.tp == 'success') {
            $('#'+modelID).modal('hide');
            form[0].reset();

            if(response.Ttype == 'social'){
              var table = document.getElementById("socialTable");
              var row = table.insertRow(-1);
              var cell1 = row.insertCell(0);
              var cell2 = row.insertCell(1);
              var cell3 = row.insertCell(2);
              var cell4 = row.insertCell(3);

              cell1.innerHTML = "<i class='fa fa-spinner text-muted'></i>";
              cell2.innerHTML = response.title;
              cell3.innerHTML = response.url;
              cell4.innerHTML = '-';

              // Add animation using animateCSS
              row.classList.add("animate__animated", "animate__fadeIn");

            }else if(response.Ttype == 'custom'){
              var table = document.getElementById("customTable");
              var row = table.insertRow(-1);
              var cell1 = row.insertCell(0);
              var cell2 = row.insertCell(1);
              var cell3 = row.insertCell(2);

              cell1.innerHTML = response.title;
              cell2.innerHTML = response.url;
              cell3.innerHTML = '-';

              row.classList.add("animate__animated", "animate__fadeIn");

            }
            console.log('Created Successfuly');

            $.each(response.m,function(key,val) {
                    swal.fire({
                    title: val,
                    icon: response.tp,
                    showConfirmButton: false,
                });
            });
        }else{
          new toast({
            icon: 'error',
            title: response.message
            });
        }
    });
    }


    function DeleteS(id){
        swal.fire({
                title: '@lang("concept.sure")',
                text: '@lang("concept.notRecoverAble")',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: '@lang("concept.cancel")',
                confirmButtonText: '@lang("concept.yes")'
            }).then((result) => {
                if (result.value) {
    sendData("{{route('page.SocialDelete')}}","id="+id)
    .then(function(response)
    {
      $.each(response.m,function(key,val) {
        new toast({
            icon: response.tp,
            title: val
            });
        });
    
     if(response.tp == 'success')
    {
        animateCSS('#s-'+id, 'fadeOutUp').then((message) => {
            $('#s-'+id).remove();
            });
        console.log('Removed Successfuly');
    }
    });
            }
        });
    }

    
    function DeleteC(id){
        swal.fire({
                title: '@lang("concept.sure")',
                text: '@lang("concept.notRecoverAble")',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: '@lang("concept.cancel")',
                confirmButtonText: '@lang("concept.yes")'
            }).then((result) => {
                if (result.value) {
    sendData("{{route('page.ButtonDelete')}}","id="+id)
    .then(function(response)
    {
      $.each(response.m,function(key,val) {
        new toast({
            icon: response.tp,
            title: val
            });
        });
    
     if(response.tp == 'success')
    {
        animateCSS('#c-'+id, 'fadeOutUp').then((message) => {
            $('#c-'+id).remove();
            });
        console.log('Removed Successfuly');
    }
    });
            }
        });
    }

    // _______________
    $(document).ready(function () {
        $('input[type="radio"]').click(function() {
                    var inputValue = $(this).attr("value");
                    var targetBox = $("." + inputValue);
                    $(".selectt").not(targetBox).hide();
                    $(targetBox).show();
                });

	//Enable Tooltips
	var tooltipTriggerList = [].slice.call(
		document.querySelectorAll('[data-bs-toggle="tooltip"]')
	);
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		return new bootstrap.Tooltip(tooltipTriggerEl);
	});

	//Advance Tabs
	$(".next").click(function () {
		const nextTabLinkEl = $(".nav-tabs .active")
			.closest("li")
			.next("li")
			.find("a")[0];
		const nextTab = new bootstrap.Tab(nextTabLinkEl);
		nextTab.show();
	});

	$(".previous").click(function () {
		const prevTabLinkEl = $(".nav-tabs .active")
			.closest("li")
			.prev("li")
			.find("a")[0];
		const prevTab = new bootstrap.Tab(prevTabLinkEl);
		prevTab.show();
	});
});
</script>

<script type="text/javascript">
    Coloris({
      el: '.coloris',
      swatches: [
        '#264653',
        '#2a9d8f',
        '#e9c46a',
        '#f4a261',
        '#e76f51',
        '#d62828',
        '#023e8a',
        '#0077b6',
        '#0096c7',
        '#00b4d8',
        '#48cae4'
      ]
    });
   
        Dropzone.options.dropzone =
         {
            maxFilesize: 12,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
               return time+file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 50000,
            removedfile: function(file) 
            {
                var name = file.upload.filename;
                $.ajax({
                    headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                    type: 'POST',
                    url: '{{route('page.logo.destory')}}',
                    data: {filename: name},
                    success: function (data){
                        new toast({
                            icon: 'success',
                            title: '@lang("concept.success")'
                            });
                    },
                    error: function(e) {
                        console.log(e);
                    }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ? 
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
       
            success: function(file, response) 
            {
        $.each(response.m,function(key,val) {
            swal.fire({
            title: val,
            icon: response.tp,
            showConfirmButton: false,
        });
            });

        },
            error: function(file, response)
            {                
            new toast({
            icon: 'error',
            title: response.message
            });
            }
};



Dropzone.options.BGdropzone =
         {
            maxFilesize: 12,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
               return time+file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 50000,
            removedfile: function(file) 
            {
                var name = file.upload.filename;
                $.ajax({
                    headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                    type: 'POST',
                    url: '{{route('page.bgImage.destory')}}',
                    data: {filename: name},
                    success: function (data){
                        new toast({
                            icon: 'success',
                            title: '@lang("concept.success")'
                            });
                                            },
                    error: function(e) {
                        new toast({
                    icon: 'error',
                    title: e
                            });

                    }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ? 
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
       
            success: function(file, response) 
            {
                $.each(response.m,function(key,val) {
                    swal.fire({
                    title: val,
                    icon: response.tp,
                    showConfirmButton: false,
                });
            });

        },
            error: function(file, response)
            {      
            new toast({
            icon: 'error',
            title: response.message
            });

            }
};



</script>
@endsection


