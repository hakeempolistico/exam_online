@extends('layouts.template')

@section('title')
    <title>Add Student | Online Exam</title>
@endsection


@section('content')

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Add Student</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="/dashboard"><i class="demo-pli-home"></i></a></li>
					<li class="active">Add Student</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>

                
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    
					<div class="row">
					    <div class="col-lg-12">
					        <div class="panel">					
					            <form id="demo-bvd-notempty" action="{{ isset($student) ? '/student/'.$student->id : route('student.store') }}" method="POST" class="form-horizontal">
					            	
					            	@if(isset($student))
					            		@method('PUT')
					            	@endif

                        			@csrf
					                <div class="panel-body">
					                    <p class="bord-btm pad-ver text-main text-bold">Student Form</p>
					
					                    <!--NOT EMPTY VALIDATOR-->
					                    <!--===================================================-->
					                    <fieldset>
					                        <div class="form-group">
					                            <label class="col-lg-12 col-md-12 col-sm-12 control-label pull-left" style="text-align: left">Student ID</label>
					                            <div class="col-lg-12">
					                                <input type="text" class="form-control" name="student_id" placeholder="Student ID" value="{{ isset($student->student_id) ? $student->student_id : '' }}">
					                            </div>
					                        </div>
					                        <div class="form-group">
					                            <label class="col-lg-12 col-md-12 col-sm-12 control-label pull-left" style="text-align: left">Email</label>
					                            <div class="col-lg-12">
					                                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ isset($student) ? $student->user->email : '' }}">
					                            </div>
					                        </div>
					                        @if(!isset($student))
						                        <div class="form-group">
						                            <label class="col-lg-12 col-md-12 col-sm-12 control-label pull-left" style="text-align: left">Password 
						                            </label>
						                            <div class="col-lg-12">
						                                <input type="password" class="form-control" name="password" placeholder="Password" value="">
						                            </div>
						                        </div>
					                        @endif
					                        <hr>
					                        <div class="form-group">
					                            <label class="col-lg-12 col-md-12 col-sm-12 control-label pull-left" style="text-align: left">First Name</label>
					                            <div class="col-lg-12">
					                                <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ isset($student->first_name) ? $student->first_name : '' }}">
					                            </div>
					                        </div>
					                        <div class="form-group">
					                            <label class="col-lg-12 col-md-12 col-sm-12 control-label pull-left" style="text-align: left">Middle Name</label>
					                            <div class="col-lg-12">
					                                <input type="text" class="form-control" name="middle_name" placeholder="Middle Name" value="{{ isset($student->middle_name) ? $student->middle_name : '' }}">
					                            </div>
					                        </div>
					                        <div class="form-group">
					                            <label class="col-lg-12 col-md-12 col-sm-12 control-label pull-left" style="text-align: left">Last Name</label>
					                            <div class="col-lg-12">
					                                <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ isset($student->last_name) ? $student->last_name : '' }}">
					                            </div>
					                        </div>
					                        <div class="form-group">
					                            <label class="col-lg-12 col-md-12 col-sm-12 control-label pull-left" style="text-align: left">Address</label>
					                            <div class="col-lg-12">
					                                <input type="text" class="form-control" name="address" placeholder="Address"  value="{{ isset($student->address) ? $student->address : '' }}">
					                            </div>
					                        </div>
					                        <div class="form-group">
					                            <label class="col-lg-12 col-md-12 col-sm-12 control-label pull-left" style="text-align: left">Contact Number</label>
					                            <div class="col-lg-12">
					                                <input type="text" class="form-control" name="contact_number" placeholder="Contact Number"  value="{{ isset($student->contact_number) ? $student->contact_number : '' }}">
					                            </div>
					                        </div>
					                        <div class="form-group">
					                            <label class="col-lg-12 col-md-12 col-sm-12 control-label pull-left" style="text-align: left">Gender</label>
					                            <div class="col-lg-12">
					                                <select class="form-control" name="gender" placeholder="Gender">
					                                	<option></option>
					                                	<option value="male" {{ isset($student->gender) && $student->gender == 'male' ? 'selected' : '' }}>Male</option>
					                                	<option value="female"  {{ isset($student->gender) && $student->gender == 'female' ? 'selected': '' }}>Female</option>
					                                </select>
					                            </div>
					                        </div>
					                        <div class="form-group">
					                            <label class="col-lg-12 col-md-12 col-sm-12 control-label pull-left" style="text-align: left">Year</label>
					                            <div class="col-lg-12">
					                                <input type="text" class="form-control" name="year" placeholder="Year"  value="{{ isset($student->year) ? $student->year : '' }}">
					                            </div>
					                        </div>
					                        <div class="form-group">
					                            <label class="col-lg-12 col-md-12 col-sm-12 control-label pull-left" style="text-align: left">Section</label>
					                            <div class="col-lg-12">
					                                <input type="text" class="form-control" name="section" placeholder="Section"  value="{{ isset($student->section) ? $student->section : '' }}">
					                            </div>
					                        </div>
					                    </fieldset>
					                    <!--===================================================-->
					
					
					                </div>
					                <div class="panel-footer">
					                    <div class="row">
					                        <div class="col-sm-7">
					                            <button class="btn btn-mint pull-left" type="submit">Submit</button>
					                        </div>
					                    </div>
					                </div>
					            </form>
					        </div>
					    </div>
					</div>
					
					
					
                </div>
                <!--===================================================-->
                <!--End page content-->

            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->
@endsection

@section('css')
    <!--Demo [ DEMONSTRATION ]-->
    <link href="/css/demo/nifty-demo.min.css" rel="stylesheet">


        
    <!--Bootstrap Validator [ OPTIONAL ]-->
    <link href="/plugins/bootstrap-validator/bootstrapValidator.min.css" rel="stylesheet">
@endsection

@section('js')
<!--Bootstrap Validator [ OPTIONAL ]-->
    <script src="/plugins/bootstrap-validator/bootstrapValidator.min.js"></script>


    <!--Masked Input [ OPTIONAL ]-->
    <script src="/plugins/masked-input/jquery.maskedinput.min.js"></script>


    <!--Form validation [ SAMPLE ]-->
    <script>
    	
	$(document).on('nifty.ready', function() {


	    // FORM VALIDATION FEEDBACK ICONS
	    // =================================================================
	    var faIcon = {
	        valid: 'fa fa-check-circle fa-lg text-success',
	        invalid: 'fa fa-times-circle fa-lg',
	        validating: 'fa fa-refresh'
	    }


	    // FORM VARIOUS VALIDATION
	    // =================================================================
	    $('#demo-bvd-notempty').bootstrapValidator({
	        message: 'This value is not valid',
	        feedbackIcons: faIcon,
	        fields: {
	        student_id: {
	            message: 'The student ID is not valid',
	            validators: {
	                notEmpty: {
	                    message: 'The student ID is required.'
	                }
	            }
	        },
	        email: {
	            message: 'The email is not valid',
	            validators: {
	                notEmpty: {
	                    message: 'The email is required.'
	                }
	            }
	        },
	        password: {
	            message: 'The password is not valid',
	            validators: {
	                notEmpty: {
	                    message: 'The password is required.'
	                }
	            }
	        },
	        first_name: {
	            message: 'The first_name is not valid',
	            validators: {
	                notEmpty: {
	                    message: 'The first name is required.'
	                }
	            }
	        },
	        last_name: {
	            message: 'The last name is not valid',
	            validators: {
	                notEmpty: {
	                    message: 'The last name is required.'
	                }
	            }
	        },
	        address: {
	            message: 'The address is not valid',
	            validators: {
	                notEmpty: {
	                    message: 'The address is required.'
	                }
	            }
	        },
	        contact_number: {
	            message: 'The contact number is not valid',
	            validators: {
	                notEmpty: {
	                    message: 'The contact number is required.'
	                }
	            }
	        },
	        gender: {
	            message: 'The gender is not valid',
	            validators: {
	                notEmpty: {
	                    message: 'The gender is required.'
	                }
	            }
	        },
	        year: {
	            message: 'The year is not valid',
	            validators: {
	                notEmpty: {
	                    message: 'The year is required.'
	                }
	            }
	        },
	        section: {
	            message: 'The section is not valid',
	            validators: {
	                notEmpty: {
	                    message: 'The section is required.'
	                }
	            }
	        },
	        }
	    }).on('success.field.bv', function(e, data) {
	        // $(e.target)  --> The field element
	        // data.bv      --> The BootstrapValidator instance
	        // data.field   --> The field name
	        // data.element --> The field element

	        var $parent = data.element.parents('.form-group');

	        // Remove the has-success class
	        $parent.removeClass('has-success');
	    });


	});

    </script>
@endsection
