
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">
        <div class="pad-all text-center">
            <h3>Welcome back to the Dashboard.</h3>
            <p1>Scroll down to see quick links and overviews of your Server, To do list, Order status or get some Help using Nifty.</p>
        </div>
    </div>

    
    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">           
            <div class="row">
                {{-- <div class="col-md-3">
                    <div class="panel panel-warning panel-colorful media middle pad-all">
                        <div class="media-left">
                            <div class="pad-hor">
                                <i class="demo-pli-file-word icon-3x"></i>
                            </div>
                        </div>
                        <div class="media-body">
                            <p class="text-2x mar-no text-semibold">{{ $students->count() }}</p>
                            <p class="mar-no">Exams Taken</p>
                        </div>
                    </div>
                </div>
 --}}                <div class="col-md-3">
                    <div class="panel panel-info panel-colorful media middle pad-all">
                        <div class="media-left">
                            <div class="pad-hor">
                                <i class="demo-pli-file-zip icon-3x"></i>
                            </div>
                        </div>
                        <div class="media-body">
                            <p class="text-2x mar-no text-semibold">{{ $subjects->count() }}</p>
                            <p class="mar-no">Subjects</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-mint panel-colorful media middle pad-all">
                        <div class="media-left">
                            <div class="pad-hor">
                                <i class="demo-pli-camera-2 icon-3x"></i>
                            </div>
                        </div>
                        <div class="media-body">
                            <p class="text-2x mar-no text-semibold">{{ $subject_categories->count() }}</p>
                            <p class="mar-no">Subject Cats</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-danger panel-colorful media middle pad-all">
                        <div class="media-left">
                            <div class="pad-hor">
                                <i class="demo-pli-video icon-3x"></i>
                            </div>
                        </div>
                        <div class="media-body">
                            <p class="text-2x mar-no text-semibold">{{ $modules->count() }}</p>
                            <p class="mar-no">Modules</p>
                        </div>
                    </div>
                </div>
            </div>
        
        
            
    </div>
    <!--===================================================-->
    <!--End page content-->

</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->
