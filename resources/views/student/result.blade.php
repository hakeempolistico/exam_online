@extends('layouts.template')

@section('title')
    <title>Lecture | Online Exam</title>
@endsection


@section('content')
	<div id="content-container">
	    <div id="page-head">
	        <div id="page-title">
	            <h1 class="page-header text-overflow">Result</h1>
	        </div>
	    </div>
	    <div id="page-content">
		    <div class="row pad-btm">
		        <div class="col-sm-6 toolbar-left">
		            <p class="text-light text-semibold"> Result for module taken </p>
		        </div>
		    </div>
		
			
		    <div class="row">
		    			<div class="col-md-12">	
		    					<div class="panel">	
		    							<div class="panel-header">	
		    									<h3 class="panel-title"> Result	</h3>
		    							</div>	
		    							<div class="panel-body">	
		    									<div class="table-responsive">
					                    <table class="table table-striped">
					                        <thead>
					                            <tr>
					                                <th></th>
					                                <th>Module</th>
					                                <th>Score</th>
					                                <th>Date Taken</th>
					                            </tr>
					                        </thead>
					                        <tbody>
					                        	@foreach($user->scores as $key => $score)
						                            <tr>
						                                <td>{{ $key+1 }}</td>
						                                <td>{{ $score->module->name }}</td>
						                                <td>{{ $score->score }}</td>
						                                <td>{{ $score->created_at }}</td>
						                            </tr>
						                        @endforeach
					                        </tbody>
					                    </table>
					                </div>
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
