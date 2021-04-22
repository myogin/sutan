@extends('layouts.app')

@section('css')

@endsection
@section('content')

					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Subheader-->
						<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
							<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								<div class="d-flex align-items-center flex-wrap mr-1">
									<!--begin::Page Heading-->
									<div class="d-flex align-items-baseline flex-wrap mr-5">
										<!--begin::Page Title-->
										<h5 class="text-dark font-weight-bold my-1 mr-5">Form Controls</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											<li class="breadcrumb-item">
												<a href="" class="text-muted">Crud</a>
											</li>
											<li class="breadcrumb-item">
												<a href="" class="text-muted">Forms &amp; Controls</a>
											</li>
											<li class="breadcrumb-item">
												<a href="" class="text-muted">Form Validation</a>
											</li>
											<li class="breadcrumb-item">
												<a href="" class="text-muted">Form Controls</a>
											</li>
										</ul>
										<!--end::Breadcrumb-->
									</div>
									<!--end::Page Heading-->
								</div>
								<!--end::Info-->
								<!--begin::Toolbar-->
								<div class="d-flex align-items-center">
									<!--begin::Actions-->
									<a href="#" class="btn btn-light-primary font-weight-bolder btn-sm">Actions</a>
									<!--end::Actions-->
									<!--begin::Dropdown-->
									<div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
										<a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="svg-icon svg-icon-success svg-icon-2x">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Files/File-plus.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24" />
														<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
														<path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</a>
										<div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-0 m-0">
											<!--begin::Navigation-->
											<ul class="navi navi-hover">
												<li class="navi-header font-weight-bold py-4">
													<span class="font-size-lg">Choose Label:</span>
													<i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
												</li>
												<li class="navi-separator mb-3 opacity-70"></li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-text">
															<span class="label label-xl label-inline label-light-success">Customer</span>
														</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-text">
															<span class="label label-xl label-inline label-light-danger">Partner</span>
														</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-text">
															<span class="label label-xl label-inline label-light-warning">Suplier</span>
														</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-text">
															<span class="label label-xl label-inline label-light-primary">Member</span>
														</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-text">
															<span class="label label-xl label-inline label-light-dark">Staff</span>
														</span>
													</a>
												</li>
												<li class="navi-separator mt-3 opacity-70"></li>
												<li class="navi-footer py-4">
													<a class="btn btn-clean font-weight-bold btn-sm" href="#">
													<i class="ki ki-plus icon-sm"></i>Add new</a>
												</li>
											</ul>
											<!--end::Navigation-->
										</div>
									</div>
									<!--end::Dropdown-->
								</div>
								<!--end::Toolbar-->
							</div>
						</div>
						<!--end::Subheader-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Notice-->
								<div class="alert alert-custom alert-white alert-shadow gutter-b" role="alert">
									<div class="alert-icon">
										<span class="svg-icon svg-icon-primary svg-icon-xl">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3" />
													<path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</div>
									<div class="alert-text">Metronic fully integrates FormValidation, the best Premium From Validation Library for JavaScript. Zero dependencies!
									<br />For more info please visit
									<a class="font-weight-bold" href="https://formvalidation.io/" target="_blank">FormValidation Home</a></div>
								</div>
								<!--end::Notice-->
								<!--begin::Card-->
								<div class="row">
									<div class="col-lg-8">
										<!--begin::Card-->

										<div class="card card-custom example example-compact">
											<div class="card-header">
												<h3 class="card-title">Form Guru</h3>
											</div>
											<!--begin::Form-->
											<form class="form" id="kt_form_1" action="{{route('guru.store')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
												<div class="card-body">
                                                    <!--begin::ALLERT-->
                                                    @if(session('status'))
													<div class="alert alert-custom alert-light-success" role="alert" id="kt_form_1_msg">
														<div class="alert-icon">
															<i class="flaticon2-check-mark"></i>
														</div>
														<div class="alert-text font-weight-bold">{{session('status')}}</div>
														<div class="alert-close">
															<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span>
																	<i class="ki ki-close"></i>
																</span>
															</button>
														</div>
													</div>
                                                    @endif
                                                    <!--END::ALLERT-->


                                                    <div class="form-group row">
                                                        <label class="col-form-label text-right col-lg-3 col-sm-12">Tanggal</label>
                                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                                         <input type="text" value="{{old('date')}}" class="form-control" name="date" readonly placeholder="Select date" id='kt_datepicker'/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
														<label class="col-form-label text-right col-lg-3 col-sm-12">NIK *</label>
														<div class="col-lg-9 col-md-9 col-sm-12">
															<input type="text" value="{{old('nip')}}" class="form-control  {{$errors->first('nip') ? "is-invalid" : ""}}" name="nip" placeholder="Enter your name" />
                                                            <div class="invalid-feedback">{{$errors->first('nip')}}</div>
                                                        </div>
													</div>
                                                    <div class="form-group row">
														<label class="col-form-label text-right col-lg-3 col-sm-12">Name *</label>
														<div class="col-lg-9 col-md-9 col-sm-12">
															<input type="text" value="{{old('name')}}" class="form-control" name="name" placeholder="Enter your name" />
														</div>
													</div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-right">Foto</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <div class="image-input image-input-outline" id="kt_image_1">
                                                                <div class="image-input-wrapper" style="background-image:  url('{{asset('media/default-user-image.png')}}')"></div>
                                                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                                    <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" />
                                                                    <input type="hidden" name="profile_avatar_remove" />
                                                                </label>
                                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                                </span>
                                                            </div>
                                                            <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                                                        </div>
                                                    </div>
												</div>
												<div class="card-footer">
													<div class="row">
														<div class="col-lg-9 ml-lg-auto">
															<button type="submit" class="btn btn-primary font-weight-bold mr-2" name="submitButton">Create</button>
															<button type="reset" class="btn btn-light-primary font-weight-bold">Cancel</button>
														</div>
													</div>
												</div>
											</form>
											<!--end::Form-->
										</div>
										<!--end::Card-->
									</div>
								</div>
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
@endsection

@section('js')

		<!--begin::Page Scripts(used by this page)-->
		<script type="text/javascript">
        // Class definition
var KTFormControls = function () {
	// Private functions

    var validator;

    var _initWidgets = function() {
        // Initialize Plugins
        // Datepicker
    $("#kt_datepicker").datepicker().datepicker("setDate", new Date());
        $('#kt_datepicker').datepicker({
            todayHighlight: true,
            dateFormat:"dd-mm-yy",
            templates: {
                leftArrow: '<i class=\"la la-angle-left\"></i>',
                rightArrow: '<i class=\"la la-angle-right\"></i>'
            },
            autoclose: true
        }).on('changeDate', function(e) {
            // Revalidate field
            validator.revalidateField('date');
        });
        $('#kt_datepicker').datepicker({
            dateFormat:"dd-mm-yy",
        })
    }

	var _initDemo1 = function () {
        const form = document.getElementById('kt_form_1');

		validator = FormValidation.formValidation(
			document.getElementById('kt_form_1'),
			{
				fields: {
                    date: {
                        validators: {
                            notEmpty: {
                                message: 'Date is required'
                            },
                        }
                    },
					nip: {
						validators: {
							notEmpty: {
								message: 'Nik is required'
							}
						}
					},

					name: {
						validators: {
							notEmpty: {
								message: 'Name is required'
							}
						}
					},
				},

				plugins: { //Learn more: https://formvalidation.io/guide/plugins
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap(),
					// Validate fields when clicking the Submit button
					submitButton: new FormValidation.plugins.SubmitButton(),
                    icon: new FormValidation.plugins.Icon({
                    valid: 'fa fa-check',
                    invalid: 'fa fa-times',
                    validating: 'fa fa-refresh'
                }),

            		// Submit the form when all fields are valid
            		defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
				}
			}
		);
	}

	return {
		// public functions
		init: function() {
            _initWidgets();
			_initDemo1();
		}
	};
}();

jQuery(document).ready(function() {
	KTFormControls.init();
});

'use strict';

// Class definition
var KTImageInputDemo = function () {
	// Private functions
	var initDemos = function () {
		// Example 1
		var avatar1 = new KTImageInput('kt_image_1');

	}

	return {
		// public functions
		init: function() {
			initDemos();
		}
	};
}();

KTUtil.ready(function() {
	KTImageInputDemo.init();
});

        </script>
		<!--end::Page Scripts-->
@endsection
