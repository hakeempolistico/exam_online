<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Register | Nifty - Admin Template</title>


    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="{{ asset('') }}css/bootstrap.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="{{ asset('') }}css/nifty.min.css" rel="stylesheet">


    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="{{ asset('') }}css/demo/nifty-demo-icons.min.css" rel="stylesheet">


    <!--=================================================-->



    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="{{ asset('') }}plugins/pace/pace.min.css" rel="stylesheet">
    <script src="{{ asset('') }}plugins/pace/pace.min.js"></script>


        

    
    <!--=================================================

    REQUIRED
    You must include this in your project.


    RECOMMENDED
    This category must be included but you may modify which plugins or components which should be included in your project.


    OPTIONAL
    Optional plugins. You may choose whether to include it in your project or not.


    DEMONSTRATION
    This is to be removed, used for demonstration purposes only. This category must not be included in your project.


    SAMPLE
    Some script samples which explain how to initialize plugins or components. This category should not be included in your project.


    Detailed information and more samples can be found in the document.

    =================================================-->
        
</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body>
    <div id="container" class="cls-container">
        
		
		<!-- BACKGROUND IMAGE -->
		<!--===================================================-->
		<div id="bg-overlay"></div>
		
		
		<!-- REGISTRATION FORM -->
		<!--===================================================-->
		<div class="cls-content">
		    <div class="cls-content-lg panel">
		        <div class="panel-body">
		            <div class="mar-ver pad-btm">
		                <h1 class="h3">Create a New Account</h1>
		                <p>Come join the Nifty community! Let's set up your account.</p>
		            </div>
		            <form  method="POST" action="{{ route('register') }}">
		            	@csrf
		                <div class="row">
		                    <div class="col-sm-12">
		                        <div class="form-group text-left">
		                            <input type="text" class="form-control" placeholder="Full name" name="name" value="{{ old('name') }}" >
		                            @if ($errors->has('name'))
		                    			<small class="text-danger">{{ $errors->first('name') }}</small>
	                                @endif
		                        </div>
		                    </div>
		                    <div class="col-sm-12">
		                        <div class="form-group text-left">
		                            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" >
		                            @if ($errors->has('email'))
		                    			<small class="text-danger">{{ $errors->first('email') }}</small>
	                                @endif
		                        </div>
		                    </div>
		                    <div class="col-sm-12">
		                        <div class="form-group text-left">
		                            <input type="password" class="form-control" placeholder="Password" name="password">
		                            @if ($errors->has('password'))
		                    			<small class="text-danger">{{ $errors->first('password') }}</small>
	                                @endif
		                        </div>
		                    </div>
		                    <div class="col-sm-12">
		                        <div class="form-group text-left">
		                            <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
		                        </div>
		                    </div>
		                </div>
		                <button class="btn btn-primary btn-lg btn-block" type="submit">Register</button>
		            </form>
		        </div>
		        <div class="pad-all">
		            Already have an account ? <a href="pages-login.html" class="btn-link mar-rgt text-bold">Sign In</a>
		        </div>
		    </div>
		</div>
		
		
		
    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->


        
    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--jQuery [ REQUIRED ]-->
    <script src="{{ asset('') }}js/jquery.min.js"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="{{ asset('') }}js/bootstrap.min.js"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="{{ asset('') }}js/nifty.min.js"></script>



</body>
</html>
