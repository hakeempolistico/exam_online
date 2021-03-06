@extends('layouts.template')

@section('title')
    <title>Dashboard | Online Exam</title>
@endsection


@section('content')
	<div id="content-container">
	    <div id="page-head">
	        <div id="page-title">
	            <h1 class="page-header text-overflow">Examination</h1>
	        </div>
	    </div>
	    <div id="page-content">
		    <div class="row pad-btm">
		        <div class="col-sm-6 toolbar-left">
		            <p class="text-light text-semibold"> Click on module to take test examination. </p>
		        </div>
		        <div class="col-sm-6 toolbar-right text-right">
		            Filter by Subject/Category :
		            <div class="select">
		                <select id="select-filter">
		                    <option class="text-semibold">Subjects</option>
		                    @foreach($subjects as $subject)
		                    	<option value="subject-{{ str_replace(' ', '-', strtolower($subject->name)) }}">{{$subject->name}}</option>
		                    @endforeach
		                    <option class="text-semibold">Categories</option>
		                    @foreach($categories as $category)
		                    	<option value="category-{{ str_replace(' ', '-', strtolower($category->name)) }}">{{ $category->name }}</option>
		                    @endforeach
		                </select>
		            </div>
		            <button class="btn btn-default">Filter</button>
		        </div>
		    </div>
		
			
		    <div class="row">
				@foreach($modules as $key => $module)
			        <div class="col-sm-4 col-md-3 tiles subject-{{ str_replace(' ', '-', strtolower($module->category->subject->name)) }} category-{{ str_replace(' ', '-', strtolower($module->category->name)) }}">
			            <div class="panel pos-rel">
			                <div class="pad-all text-center">
			                    <div class="widget-control">
			                        <a href="#" class="add-tooltip btn btn-trans" data-original-title="Favorite"><span class="unfavorite-color"><i class="demo-psi-star icon-lg"></i></span></a>
			                    </div>
			                    <a href="/exam/{{ $module->id }}"  target="_blank">
			                        <img alt="Profile Picture" class="img-lg img-circle mar-ver" src="img/profile-photos/2.png">
			                        <p class="text-lg text-semibold mar-no text-main">{{ $module->name }}</p>
			                        <p class="text-sm mar-no text-semibold text-primary">{{ $module->category->name }}</p>
			                        <p class="text-sm text-bold text-primary">{{ $module->category->subject->name }}</p>
			                    </a>
			                </div>
			            </div>
			        </div>
		 		@endforeach
		 		<div class="col-md-12 no-result" hidden>
		 			<p class="text-bold" style="margin-top: 5em">NO RESULTS FOUND!</p>
		 		</div>
		    </div>
	    </div>
	</div>

@endsection

@section('js')
	<script>
		$('#select-filter').on('change', function(){
			$('.tiles').hide()
			$('.'+$(this).val()).show()
			if($('.'+$(this).val()).length == 0){
				$('.no-result').show()
			} else {
				$('.no-result').hide()
			}

		})
	</script>
@endsection
