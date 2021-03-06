@extends('layouts.template')

@section('title')
    <title>Add Question | Online Exam</title>
@endsection


@section('content')

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Add Question</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="/dashboard"><i class="demo-pli-home"></i></a></li>
					<li class="active">Add Question</li>
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
					            <form id="demo-bvd-notempty" action="{{ isset($question) ? '/question/'.$question->id :  '/question'  }}" method="POST" class="form-horizontal">
					            	
					            	@if(isset($question))
					            		@method('PUT')
					            	@endif

                        			@csrf
					                <div class="panel-body">
					                    <p class="bord-btm pad-ver text-main text-bold">Question Form</p>
					
					                    <!--NOT EMPTY VALIDATOR-->
					                    <!--===================================================-->
					                    <fieldset>
					                        <div class="form-group">
					                            <label class="col-lg-12 col-md-12 col-sm-12 control-label pull-left" style="text-align: left">Question</label>
					                            <div class="col-lg-12">
					                                <textarea class="form-control" name="question" placeholder="Question">{{ isset($question) ? $question->question : '' }}</textarea>
					                            </div>
					                        </div>
					                        <div class="form-group">
					                            <label class="col-lg-12 col-md-12 col-sm-12 control-label pull-left" style="text-align: left">Module</label>
					                            <div class="col-lg-12">
					                                <select class="form-control" name="module_id">
					                                	<option value=""></option>
					                                	@foreach($modules as $module)
					                                		<option value="{{ $module->id }}" {{  isset($question) && $module->id == $question->module_id ? 'selected' : '' }}>{{ $module->name }}</option>
					                                	@endforeach
					                                </select>
					                            </div>
					                        </div>
					                        <hr>
					                        <div class="form-group form-group-choice">
					                        	@if(isset($question))
					                        		@foreach($question->choices as $choice)
						                        	<div class="group-choice">

							                            <div class="col-lg-9">
								                            <div class="form-group">
									                            <label class="col-lg-12 col-md-12 col-sm-12 control-label pull-left" style="text-align: left">Choice</label>
									                            <div class="col-lg-12">
									                                <textarea class="form-control input-choice" name="choices[]" placeholder="Choices" required>{{ $choice->choice }}</textarea>
									                            </div>
									                        </div>
							                            	
							                            </div>
							                            <div class="col-lg-3">
							                                <div class="form-group">
											                    <label class=" control-label">Correct Answer</label>
											                    <select class="form-control" name="answers[]">
											                    	<option value="0" {{ !$choice->answer ? 'selected' : '' }}>No</option>
											                    	<option value="1" {{ $choice->answer ? 'selected' : '' }}>Yes</option>
											                    </select>
											                </div>
							                            </div>
							                        </div>
							                        @endforeach
					                        	@else
						                        	<div class="group-choice">
							                            <div class="col-lg-9">
								                            <div class="form-group">
									                            <label class="col-lg-12 col-md-12 col-sm-12 control-label pull-left" style="text-align: left">Choice</label>
									                            <div class="col-lg-12">
									                                <textarea class="form-control input-choice" name="choices[]" placeholder="Choices" required>{{ isset($question) ? $question->question : '' }}</textarea>
									                            </div>
									                        </div>
							                            	
							                            </div>
							                            <div class="col-lg-3">
							                                <div class="form-group">
											                    <label class=" control-label">Correct Answer</label>
											                    <select class="form-control" name="answers[]">
											                    	<option value="0">No</option>
											                    	<option value="1">Yes</option>
											                    </select>
											                </div>
							                            </div>
							                        </div>
						                        @endif
					                        </div>


					                    </fieldset>
					                    <!--===================================================-->
					
					
					                </div>
					                <div class="panel-footer">
					                    <div class="row">
					                        <div class="col-sm-7">
					                            <button class="btn btn-mint pull-left mar-rgt btn-submit" type="submit">Submit</button>
					                            <a class="btn btn-primary pull-left add-choice">Add Choice</a>
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
		        question: {
		            message: 'The question name is not valid',
		            validators: {
		                notEmpty: {
		                    message: 'The question name is required.'
		                }
		            }
		        },
		        module_id: {
		            message: 'The module is not valid',
		            validators: {
		                notEmpty: {
		                    message: 'The module is required.'
		                }
		            }
		        },
		        choices: {
		            message: 'The choice is not valid',
		            validators: {
		                notEmpty: {
		                    message: 'The choice is required.'
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

	    $('.add-choice').on('click', function(){
	    	clone()	
	    	$('.input-choice:last').val('')
	    })

	    function clone(){
	    	$('.group-choice:first')
	    		.clone()
	    		.appendTo('.form-group-choice')
	    		.closest('.panel')
	    		.find('.btn-submit')
	    		.removeAttr('disabled')
	    }

	    $('form').on('submit', function(e){
	    	var arr = []
	    	$('select[name="answers[]"]').each(function(index){
				arr.push($(this).val())
			})
			if(arr.includes('1')){
				return true;
			} 
			return false;

	    })


	});

    </script>
@endsection
