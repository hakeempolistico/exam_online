@extends('layouts.template')

@section('title')
    <title>Add Lecture | Online Exam</title>
@endsection


@section('content')

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Add Lecture</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="/dashboard"><i class="demo-pli-home"></i></a></li>
					<li class="active">Add Lecture</li>
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
					            <form id="demo-bvd-notempty" action="{{ isset($lecture) ? '/lecture/'.$lecture->id : route('lecture.store') }}" method="POST" class="form-horizontal">
					            	
					            	@if(isset($lecture))
					            		@method('PUT')
					            	@endif

                        			@csrf
					                <div class="panel-body">
					                    <p class="bord-btm pad-ver text-main text-bold">Lecture Form</p>
					
					                    <!--NOT EMPTY VALIDATOR-->
					                    <!--===================================================-->
					                    <fieldset>
					                        <div class="form-group">
					                            <label class="col-lg-12 col-md-12 col-sm-12 control-label pull-left" style="text-align: left">Lecture Title</label>
					                            <div class="col-lg-12">
					                                <input type="text" class="form-control" name="title" placeholder="Lecture Title" value="{{ isset($lecture->title) ? $lecture->title : '' }}">
					                            </div>
					                        </div>
					                        <div class="form-group">
					                            <label class="col-lg-12 col-md-12 col-sm-12 control-label pull-left" style="text-align: left">Subject Category</label>
					                            <div class="col-lg-12">
					                                <select class="form-control" name="subject_category_id">
					                                	<option value=""></option>
					                                	@foreach($subject_categories as $subject_category)
					                                		<option value="{{ $subject_category->id }}" 
					                                			{{ isset($lecture) && $lecture->subject_category_id == $subject_category->id ? 'selected' : '' }} >
					                                			{{ $subject_category->name }}
					                                		</option>
					                                	@endforeach
					                                </select>
					                            </div>
					                        </div>
					                        <div class="form-group">
					                            <label class="col-lg-12 col-md-12 col-sm-12 control-label pull-left" style="text-align: left">Subject Category</label>
					                            <div class="col-lg-12">
													<div class="panel">
													    <div class="panel-heading">
													        <h3 class="panel-title">Full width content</h3>
													    </div>
													
													    <!--Summernote-->
													    <!--===================================================-->
													    <div id="demo-summernote-full-width" class="full-content">
													    </div>
													    <!--===================================================-->
													    <!-- End Summernote -->
													
													</div>
					                            </div>

					                            <textarea id="content" name="content" hidden>{{ isset($lecture) ? $lecture->content : '' }}</textarea>
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
    <!--Summernote [ OPTIONAL ]-->
    <link href="/plugins/summernote/summernote.min.css" rel="stylesheet">
    <!--Bootstrap Validator [ OPTIONAL ]-->
    <link href="/plugins/bootstrap-validator/bootstrapValidator.min.css" rel="stylesheet">
@endsection

@section('js')
<!--Bootstrap Validator [ OPTIONAL ]-->
    <script src="/plugins/bootstrap-validator/bootstrapValidator.min.js"></script>

    <!--Masked Input [ OPTIONAL ]-->
    <script src="/plugins/masked-input/jquery.maskedinput.min.js"></script>

    <!--Demo script [ DEMONSTRATION ]-->
    <script src="/js/demo/nifty-demo.min.js"></script>

    <!--Summernote [ OPTIONAL ]-->
    <script src="/plugins/summernote/summernote.min.js"></script>

    <!--Form File Upload [ SAMPLE ]-->
    <script src="/js/demo/form-text-editor.js"></script>


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

	    $('button[type="submit"]').on('click', function(){
		     $('#content').html($('.note-editable').html())
		})

		@if(isset($lecture))
			$(".note-editable").text('{{ htmlspecialchars_decode($lecture->content) }}')
		@endif




	});

    </script>
@endsection
