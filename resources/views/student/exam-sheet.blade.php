@php
    $user_id =  \Auth::user()->id;
@endphp
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Exam</title>


    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="/css/bootstrap.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="/css/nifty.min.css" rel="stylesheet">


    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="/css/demo/nifty-demo-icons.min.css" rel="stylesheet">


    <!--=================================================-->



    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="plugins/pace/pace.min.css" rel="stylesheet">
    <script src="/plugins/pace/pace.min.js"></script>


    <!--Demo [ DEMONSTRATION ]-->
    <link href="/css/demo/nifty-demo.min.css" rel="stylesheet">


        
    <!--Bootstrap Validator [ OPTIONAL ]-->
    <link href="plugins/bootstrap-validator/bootstrapValidator.min.css" rel="stylesheet">

    
    <!--=================================================

    REQUIRED
    You must include this in your project.


    RECOMMENDED
    This category must be included but you may modify which plugins or components which should be included in your project.


    OPTIONAL
    Optional plugins. You may choose whether to include it in your project or not.


    DEMONSTRATION
    This is to be removed, used for demonstration purposes only. This category must not be included in your project.


    SAMPLE
    Some script samples which explain how to initialize plugins or components. This category should not be included in your project.


    Detailed information and more samples can be found in the document.

    =================================================-->
        
</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg" style="padding: 3rem 2rem;">
    

        <div class="boxed">

            <div class="col-lg-12">
                <hr class="new-section-sm bord-no">
                <h4 class="text-main pad-btm bord-btm">{{ $module->name }}</h4>
                <div class="panel">

                    <!-- Bubble Numbers Form Wizard -->
                    <!--===================================================-->
                    <div id="demo-step-wz">
                        <div class="wz-heading wz-w-label bg-info">

                            <!--Progress bar-->
                            <div class="progress progress-xs">
                                <div style="width: 15%;" class="progress-bar progress-bar-dark"></div>
                            </div>

                            <!--Nav-->
                            <ul class="wz-steps wz-icon-bw wz-nav-off text-lg">

                                <div class="col-xs-1">
                                </div>
                                @foreach($module->questions->take(10) as $key => $question)
                                    <li class="col-xs-1">
                                        <a data-toggle="tab" href="#demo-step-tab{{ $key+1 }}">
                                            <span class="icon-wrap icon-wrap-xs icon-circle bg-dark mar-ver">
                                                <span class="wz-icon icon-txt text-bold">{{ $key+1}}</span>
                                                <i class="wz-icon-done demo-psi-like"></i>
                                            </span>
                                            {{-- <small class="wz-desc box-block text-semibold">{{$question->name}}</small> --}}
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                        <!--Form-->
                        <form class="form-horizontal">
                            <div class="panel-body">
                                <div class="tab-content">

                                    @foreach($module->questions->shuffle()->take(10) as $key => $question)
                                        <div id="demo-step-tab{{ $key+1 }}" class="tab-pane">
                                            <div class="container form-group">
                                                <label class="control-label text-left">{{ $question->question }}</label>
                                            </div>
                                            <div class="form-group container">
                                               <div class="col-md-12">             
                                                @foreach($question->choices->shuffle() as $letter => $choice)
                                                    <input id="question_id-{{$choice->id}}" class="magic-radio rad-choices" type="radio" value="{{$choice->answer}}" name="question_id-{{$key+1}}" data-stat="{{$choice->answer}}" data-bol="1" data-index="{{ $question->id }}">             
                                                    <label for="question_id-{{$choice->id}}"> {{ $letter==0 ? 'A.' : '' }} {{ $letter==1 ? 'B.' : '' }} {{ $letter==2 ? 'C.' : '' }} {{ $letter==3 ? 'D.' : '' }} {{ $choice->choice }}</label>
                                                @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!--Footer button-->
                            <div class="panel-footer text-right">
                                <div class="box-inline">
                                    <button type="button" class="previous btn btn-info">Previous</button>
                                    <button type="button" class="next btn btn-info">Next</button>
                                        <button type="button" class="finish btn btn-info btn-finish" disabled>Finish</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--===================================================-->
                    <!-- End Bubble Numbers Form Wizard -->

                </div>
            </div>
            

        </div>

        <!-- SCROLL PAGE BUTTON -->
        <!--===================================================-->
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
        <!--===================================================-->
    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->


    
    
    
    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--jQuery [ REQUIRED ]-->
    <script src="/js/jquery.min.js"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="/js/bootstrap.min.js"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="/js/nifty.min.js"></script>




    <!--=================================================-->

    
    <!--Bootstrap Wizard [ OPTIONAL ]-->
    <script src="/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>


    <!--Bootstrap Validator [ OPTIONAL ]-->
    <script src="/plugins/bootstrap-validator/bootstrapValidator.min.js"></script>


    <!--Form Wizard [ SAMPLE ]-->
    <script src="/js/demo/form-wizard.js"></script>

    <script type="text/javascript">
        
        
        // Put the object into storage
        var testObject = {}; 

        localStorage.setItem('score', JSON.stringify(testObject));

        localStorage.setItem('final_score', 0);


        $(".form-horizontal").delegate(".rad-choices", "click", function() {

        var stat = $(this).attr('data-stat');

        var index  = $(this).attr('data-index');

        var aItem = JSON.parse(localStorage.getItem('score'));

        console.log(index);

        if (stat == '1' ) {

          aItem[index] = '1';

          localStorage.setItem('score', JSON.stringify(aItem));

        }else{

          aItem[index] = '0';      

          localStorage.setItem('score', JSON.stringify(aItem));
        }

        computeFinalScore();

      });


    function computeFinalScore(){

        // compute score 

        var aItem = JSON.parse(localStorage.getItem('score'));

        var countTotal = 0;

        var countItemfill = 0;

        $.each(aItem, function (key, val) { 

          countItemfill ++;

          if (val != '0') {
            countTotal++;

          } 
          
        });

        localStorage.setItem('final_score', countTotal);

    }


    $('.finish').click(function() {
        location.replace('/store-score/'+'{{ $user_id }}'+'/{{ $module->id }}'+'/'+localStorage.getItem('final_score'))
    }); 



    </script>
</body>
</html>

