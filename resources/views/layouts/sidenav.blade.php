
            <!--===================================================-->
            <nav id="mainnav-container">
                <div id="mainnav">


                    <!--OPTIONAL : ADD YOUR LOGO TO THE NAVIGATION-->
                    <!--It will only appear on small screen devices.-->
                    <!--================================
                    <div class="mainnav-brand">
                        <a href="index.html" class="brand">
                            <img src="/img/logo.png" alt="Nifty Logo" class="brand-icon">
                            <span class="brand-text">Nifty</span>
                        </a>
                        <a href="#" class="mainnav-toggle"><i class="pci-cross pci-circle icon-lg"></i></a>
                    </div>
                    -->



                    <!--Menu-->
                    <!--================================-->
                    <div id="mainnav-menu-wrap">
                        <div class="nano">
                            <div class="nano-content">

                                <!--Profile Widget-->
                                <!--================================-->
                                <div id="mainnav-profile" class="mainnav-profile">
                                    <div class="profile-wrap text-center">
                                        <div class="pad-btm">
                                            <img class="img-circle img-md" src="/img/profile-photos/1.png" alt="Profile Picture">
                                        </div>
                                        <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                            <span class="pull-right dropdown-toggle">
                                                <i class="dropdown-caret"></i>
                                            </span>
                                            <p class="mnp-name">{{ Auth::user()->name }}</p>
                                            <span class="mnp-desc">{{ Auth::user()->email }}</span>
                                        </a>
                                    </div>
                                    <div id="profile-nav" class="collapse list-group bg-trans">
                                        {{-- <a href="#" class="list-group-item">
                                            <i class="demo-pli-male icon-lg icon-fw"></i> View Profile
                                        </a> --}}
                                        <a href="{{ route('user.logout') }}" class="list-group-item">
                                            <i class="demo-pli-unlock icon-lg icon-fw"></i> Logout
                                        </a>
                                    </div>
                                </div>


                                <!--Shortcut buttons-->
                                <!--================================-->
                                <div id="mainnav-shortcut" class="hidden">
                                    <ul class="list-unstyled shortcut-wrap">
                                        <li class="col-xs-3" data-content="My Profile">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-mint">
                                                <i class="demo-pli-male"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Messages">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-warning">
                                                <i class="demo-pli-speech-bubble-3"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Activity">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-success">
                                                <i class="demo-pli-thunder"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Lock Screen">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-purple">
                                                <i class="demo-pli-lock-2"></i>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!--================================-->
                                <!--End shortcut buttons-->


                                <ul id="mainnav-menu" class="list-group">
						
						            <!--Category name-->
						            <li class="list-header">Navigation</li>
                                        <!--Menu list item-->
                                        <li  class="{{ request()->is('dashboard*') ? 'active-sub' : '' }}">
                                            <a href="/dashboard">
                                                <i class="demo-pli-home"></i>
                                                <span class="menu-title">
                                                    Dashboard
                                                </span>
                                            </a>
                                        </li>

                                    <!-- Check User if Admin -->
                                    @if (!Auth::guest() && Auth::user()->user_type == 'admin')
                                        <!--Menu list item-->
                                        <li  class="{{ request()->is('student*') ? 'active-sub' :  '' }}">
                                            <a href="/student">
                                                <i class="demo-pli-male"></i>
                                                <span class="menu-title">
                                                    Students
                                                </span>
                                            </a>
                                        </li>
                                        <!--Menu list item-->
                                        <li  class="{{ request()->is('subject*') ? 'active-sub' :  '' }}">
                                            <a href="/subject">
                                                <i class="demo-pli-folder"></i>
                                                <span class="menu-title">
                                                    Subjects
                                                </span>
                                            </a>
                                        </li>
                                        <!--Menu list item-->
                                        <li  class="{{ request()->is('category*') ? 'active-sub' :  '' }}">
                                            <a href="/category">
                                                <i class="demo-pli-folder-organizing"></i>
                                                <span class="menu-title">
                                                    Subject Categories
                                                </span>
                                            </a>
                                        </li>
                                        <!--Menu list item-->
                                        <li  class="{{ request()->is('module*') ? 'active-sub' :  '' }}">
                                            <a href="/module">
                                                <i class="demo-pli-folder-zip"></i>
                                                <span class="menu-title">
                                                    Modules
                                                </span>
                                            </a>
                                        </li>
                                        <!--Menu list item-->
                                        <li  class="{{ request()->is('question*') ? 'active-sub' :  '' }}">
                                            <a href="/question">
                                                <i class="demo-pli-question"></i>
                                                <span class="menu-title">
                                                    Questions
                                                </span>
                                            </a>
                                        </li>
                                        <!--Menu list item-->
                                        <li  class="{{ request()->is('lecture*') ? 'active-sub' :  '' }}">
                                            <a href="/lecture">
                                                <i class="demo-pli-file"></i>
                                                <span class="menu-title">
                                                    Lecture
                                                </span>
                                            </a>
                                        </li>
                                    @endif
                                    <!-- Check User if Admin -->
                                    @if (!Auth::guest() && Auth::user()->user_type == 'student')
                                        <!--Menu list item-->
                                        <li  class="{{ request()->is('examination*') ? 'active-sub' : '' }}">
                                            <a href="/examination">
                                                <i class="demo-pli-folder"></i>
                                                <span class="menu-title">
                                                    Examination
                                                </span>
                                            </a>
                                        </li>
                                    @endif
						
						            <li class="list-divider"></li>

						
                            </div>
                        </div>
                    </div>
                    <!--================================-->
                    <!--End menu-->

                </div>
            </nav>
            <!--===================================================-->
            <!--END MAIN NAVIGATION