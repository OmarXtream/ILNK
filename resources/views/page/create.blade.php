@extends('layout.user.master')

@section('ExtraCss')
<link rel="stylesheet" href="{{ asset('assets/css/steps.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">

@endsection

@section('content')
        <!-- page-content -->
        <div class="page-content mb-4">
         
            <div class="container">
                <div class="wizard my-5">
                    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                        <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip" data-bs-placement="top" title="Step 1">
                            <a class="nav-link active rounded-circle mx-auto d-flex align-items-center justify-content-center" href="#step1" id="step1-tab" data-bs-toggle="tab" role="tab" aria-controls="step1" aria-selected="true">
                                <i class="fas fa-image"></i>
                            </a>
                        </li>
                        <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip" data-bs-placement="top" title="Step 2">
                            <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center" href="#step2" id="step2-tab" data-bs-toggle="tab" role="tab" aria-controls="step2" aria-selected="false" title="Step 2">
                                <i class="fas fa-briefcase"></i>
                            </a>
                        </li>
                        <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip" data-bs-placement="top" title="Step 3">
                            <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center" href="#step3" id="step3-tab" data-bs-toggle="tab" role="tab" aria-controls="step3" aria-selected="false" title="Step 3">
                                <i class="fas fa-star"></i>
                            </a>
                        </li>
                        <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip" data-bs-placement="top" title="Step 4">
                            <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center" href="#step4" id="step4-tab" data-bs-toggle="tab" role="tab" aria-controls="step4" aria-selected="false" title="Step 4">
                                <i class="fas fa-flag-checkered"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" role="tabpanel" id="step1" aria-labelledby="step1-tab">
                            
                            <h3 class="mt-4">الشعار والخلفية</h3>
							<div class="row justify-content-center align-items-center h-100">
								<div class="col-md-8 bg-light rounded py-4 my-5">					
							<div class="form-row">

							<div class="row">

								<div class="col-12 mb-3">
									<label for="dropzone">@lang('page.bgImage')</label>
									<form method="post" action="{{route('page.logo.store')}}" enctype="multipart/form-data" 
									class="dropzone" id="dropzone">
					 					 @csrf
				  					</form>   
				  
								</div>

                                <div class="col-12 mb-3">
                                    <label for="bgColor">@lang('page.bgColor')</label>
                                    <input type="text" id="bgColor" name="bgColor"
                                        class="form-control @error('bgColor') is-invalid @enderror"
                                        value="{{ old('bgColor') }}" placeholder="#fff" required>
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
                                <button class="btn btn-primary next">@lang('concept.next') <i class="fas fa-angle-right"></i></button>
                            </div>
                        </div>
                        <div class="tab-pane fade" role="tabpanel" id="step2" aria-labelledby="step2-tab">
                            <h3>Step 2</h3>
                            <p>This is step 2</p>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-secondary previous"><i class="fas fa-angle-left"></i> @lang('concept.prev')</button>
                                <button class="btn btn-primary next">@lang('concept.next') <i class="fas fa-angle-right"></i></button>
                            </div>
                        </div>
                        <div class="tab-pane fade" role="tabpanel" id="step3" aria-labelledby="step3-tab">
                            <h3>Step 3</h3>
                            <p>This is step 3</p>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-secondary previous"><i class="fas fa-angle-left"></i> @lang('concept.prev')</button>
                                <button class="btn btn-primary next">@lang('concept.next') <i class="fas fa-angle-right"></i></button>
                            </div>
                        </div>
                        <div class="tab-pane fade" role="tabpanel" id="step4" aria-labelledby="step4-tab">
                            <h3>Complete</h3>
                            <p>You have successfully completed all steps.</p>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-secondary previous"><i class="fas fa-angle-left"></i> @lang('concept.prev')</button>
                                <button class="btn btn-primary next">Submit <i class="fas fa-angle-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
<script type="text/javascript">
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
                        console.log("File has been successfully removed!!");
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
                console.log(response);
            },
            error: function(file, response)
            {
				console.log(response);
            }
};

$(document).ready(function () {
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
@endsection


