
@if(Session::has('success-message'))
	<script>
		$.niftyNoty({
		    type: "success",
		    container : "floating",
		    icon : 'demo-pli-yes',
		    message : "{{ Session::get('success-message') }}",
		    closeBtn : false,
		    timer : 50000
		});
	</script>
@endif

@if(Session::has('error-message'))
	<script>
		$.niftyNoty({
		    type: "danger",
		    container : "floating",
		    icon : 'demo-pli-close',
		    message : "{{ Session::get('error-message') }}",
		    closeBtn : false,
		    timer : 5000
		});
	</script>
@endif