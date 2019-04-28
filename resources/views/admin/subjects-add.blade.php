@extends('layouts.template')

@section('title')
    <title>Add Subject | Online Exam</title>
@endsection


@section('content')

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Add Subject</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="/dashboard"><i class="demo-pli-home"></i></a></li>
					<li class="active">Add Subject</li>
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
					            <form id="demo-bvd-notempty" action="{{ isset($subject) ? '/subject/'.$subject->id : route('subject.store') }}" method="POST" class="form-horizontal">
					            	
					            	@if(isset($subject))
					            		@method('PUT')
					            	@endif

                        			@csrf
					                <div class="panel-body">
					                    <p class="bord-btm pad-ver text-main text-bold">Subject Form</p>
					
					                    <!--NOT EMPTY VALIDATOR-->
					                    <!--===================================================-->
					                    <fieldset>
					                        <div class="form-group">
					                            <label class="col-lg-12 col-md-12 col-sm-12 control-label pull-left" style="text-align: left">Subject Name</label>
					                            <div class="col-lg-12">
					                                <input type="text" class="form-control" name="name" placeholder="Subject Name" value="{{ isset($subject->name) ? $subject->name : '' }}">
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
		        subject_id: {
		            message: 'The subject name is not valid',
		            validators: {
		                notEmpty: {
		                    message: 'The subject name is required.'
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
