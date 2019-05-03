@extends('layouts.template')

@section('title')
    <title>Lecture | Online Exam</title>
@endsection


@section('content')
	<div id="content-container">
	    <div id="page-head">
	        <div id="page-title">
	            <h1 class="page-header text-overflow">Lecture</h1>
	        </div>
	    </div>
	    <div id="page-content">
		    <div class="row pad-btm">
		        <div class="col-sm-6 toolbar-left">
		            <p class="text-light text-semibold"> </p>
		        </div>
		    </div>
		
			
		    <div class="row">
		    	<div class="col-md-12">
		    		<div class="panel">
		    			<div class="panel-heading">
		    				<h3 class="panel-title">
		    					{{ $lecture->title }}
		    				</h3>
		    			</div>
		    			<div class="panel-body">
		    				{{ $lecture->content }}
		    			</div>
		    		</div>
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
