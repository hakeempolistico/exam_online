@extends('layouts.template')

@section('title')
    <title>Dashboard | Online Exam</title>
@endsection


@section('content')
<div id="content-container">
                <div id="page-head">
                    
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Examination</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->
                </div>

                
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    
					    <div class="row pad-btm">
					        {{-- <div class="col-sm-6 toolbar-left">
					            <button id="demo-btn-addrow" class="btn btn-purple">Add New</button>
					            <button class="btn btn-default"><i class="demo-pli-printer"></i></button>
					        </div> --}}
					        <div class="col-sm-6 toolbar-left text-right">
					            Sort by :
					            <div class="select">
					                <select id="demo-ease">
					                    <option value="date-created" selected="">Date Created</option>
					                    <option value="date-modified">Date Modified</option>
					                    <option value="frequency-used">Frequency Used</option>
					                    <option value="alpabetically">Alpabetically</option>
					                    <option value="alpabetically-reversed">Alpabetically Reversed</option>
					                </select>
					            </div>
					            <button class="btn btn-default">Filter</button>
					        </div>
					    </div>
					
					
					    <div class="row">
					        <div class="col-sm-4 col-md-3">
					            <div class="panel pos-rel">
					                <div class="pad-all text-center">
					                    <div class="widget-control">
					                        <a href="#" class="add-tooltip btn btn-trans" data-original-title="Favorite"><span class="favorite-color"><i class="demo-psi-star icon-lg"></i></span></a>
					                    </div>
					                    <a href="#">
					                        <img alt="Profile Picture" class="img-lg img-circle mar-ver" src="img/profile-photos/2.png">
					                        <p class="text-lg text-semibold mar-no text-main">Module 1</p>
					                        <p class="text-sm mar-no text-semibold text-primary">Algebra</p>
					                        <p class="text-sm text-bold text-primary">Mathematics</p>
					                    </a>
					                    
					                </div>
					            </div>
					
					
					        </div>
					        <div class="col-sm-4 col-md-3">
					
					
					            <!-- Contact Widget -->
					            <div class="panel pos-rel">
					                <div class="pad-all text-center">
					                    <div class="widget-control">
					                        <a href="#" class="add-tooltip btn btn-trans" data-original-title="Favorite"><span class="unfavorite-color"><i class="demo-psi-star icon-lg"></i></span></a>
					                    </div>
					                    <a href="#">
					                        <img alt="Profile Picture" class="img-lg img-circle mar-ver" src="img/profile-photos/10.png">
					                        <p class="text-lg text-semibold mar-no text-main">Brenda Fuller</p>
					                        <p class="text-sm">Graphics designer</p>
					                    </a>
					                    
					                </div>
					            </div>
					
					
					        </div>
					        <div class="col-sm-4 col-md-3">
					
					
					            <!-- Contact Widget -->
					            <div class="panel pos-rel">
					                <div class="pad-all text-center">
					                    <div class="widget-control">
					                        <a href="#" class="add-tooltip btn btn-trans" data-original-title="Favorite"><span class="favorite-color"><i class="demo-psi-star icon-lg"></i></span></a>
					                    </div>
					                    <a href="#">
					                        <img alt="Profile Picture" class="img-lg img-circle mar-ver" src="img/profile-photos/1.png">
					                        <p class="text-lg text-semibold mar-no text-main">Aaron Chavez</p>
					                        <p class="text-sm">CEO</p>
					                    </a>
					                    
					                </div>
					            </div>
					
					
					        </div>
					        <div class="col-sm-4 col-md-3">
					
					
					            <!-- Contact Widget -->
					            <div class="panel pos-rel">
					                <div class="pad-all text-center">
					                    <div class="widget-control">
					                        <a href="#" class="add-tooltip btn btn-trans" data-original-title="Favorite"><span class="unfavorite-color"><i class="demo-psi-star icon-lg"></i></span></a>
					                    </div>
					                    <a href="#">
					                        <img alt="Profile Picture" class="img-lg img-circle mar-ver" src="img/profile-photos/5.png">
					                        <p class="text-lg text-semibold mar-no text-main">Donald Brown</p>
					                        <p class="text-sm mar-no"><strong>Programmer</strong></p>
					                        <p class="text-sm">Programmer</p>
					                    </a>
					                    
					                </div>
					            </div>
					
					
					        </div>
					    </div>
					
					    
                </div>

            </div>

@endsection
