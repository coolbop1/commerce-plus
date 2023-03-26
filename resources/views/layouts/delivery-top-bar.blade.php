@section('delivery-top-bar')
<header class=" sticky-top  z-1020 bg-white">
    <!-- Search Bar -->
    <div class="position-relative logo-bar-area border-bottom border-md-nonea z-1025">
        <div class="container">
            <div class="d-flex align-items-center">
                <!-- Header Logo -->
                <div class="col-auto pl-0 pr-3 d-flex align-items-center">
                    <a class="d-block py-20px mr-3 ml-0" href="/delivery/dashboard">
                        <img src="/uploads/logo.png" alt="Active eCommerce CMS" class="mw-100 h-30px h-md-40px" height="40">
                    </a>
                </div>
    
                <div class="ml-auto mr-0">
                                            <span class="d-none d-xl-flex align-items-center nav-user-info py-20px" id="nav-user-info">
                            <!-- Image -->
                            <span class="size-40px rounded-circle overflow-hidden border border-transparent nav-user-img">
                                                                    <img src="https://demo.activeitzone.com/ecommerce/public/uploads/all/yPtFPf8AMEt5YELKpvQ3IjQTVPZKa49hBnT4Zdqa.png" class="img-fit h-100"
                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/avatar-place.png';">
                                                            </span>
                            <!-- Name -->
                            <h4 class="h5 fs-14 fw-700 text-dark ml-2 mb-0">{{ ucwords($user->name) }}</h4>
                        </span>
                                    </div>
            </div>
        </div>
    
        <!-- Loged in user Menus -->
        <div class="hover-user-top-menu position-absolute top-100 left-0 right-0 z-3">
            <div class="container">
                <div class="position-static float-right">
                    <div class="aiz-user-top-menu bg-white rounded-0 border-top shadow-sm" style="width:220px;">
                        <ul class="list-unstyled no-scrollbar mb-0 text-left">
                            <li class="user-top-nav-element border border-top-0" data-id="1">
                                <a href="/delivery/dashboard" class="text-truncate text-dark px-4 fs-14 d-flex align-items-center hov-column-gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                        <path id="Path_2916" data-name="Path 2916" d="M15.3,5.4,9.561.481A2,2,0,0,0,8.26,0H7.74a2,2,0,0,0-1.3.481L.7,5.4A2,2,0,0,0,0,6.92V14a2,2,0,0,0,2,2H14a2,2,0,0,0,2-2V6.92A2,2,0,0,0,15.3,5.4M10,15H6V9A1,1,0,0,1,7,8H9a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H11V9A2,2,0,0,0,9,7H7A2,2,0,0,0,5,9v6H2a1,1,0,0,1-1-1V6.92a1,1,0,0,1,.349-.76l5.74-4.92A1,1,0,0,1,7.74,1h.52a1,1,0,0,1,.651.24l5.74,4.92A1,1,0,0,1,15,6.92Z" fill="#b5b5c0"/>
                                    </svg>
                                    <span class="user-top-menu-name has-transition ml-3">Dashboard</span>
                                </a>
                            </li>
                            
                            <li class="user-top-nav-element border border-top-0" data-id="1">
                                <a style="cursor: pointer;" onclick="return logout()"  class="text-truncate text-dark px-4 fs-14 d-flex align-items-center hov-column-gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15.999" viewBox="0 0 16 15.999">
                                        <g id="Group_25503" data-name="Group 25503" transform="translate(-24.002 -377)">
                                          <g id="Group_25265" data-name="Group 25265" transform="translate(-216.534 -160)">
                                            <path id="Subtraction_192" data-name="Subtraction 192" d="M12052.535,2920a8,8,0,0,1-4.569-14.567l.721.72a7,7,0,1,0,7.7,0l.721-.72a8,8,0,0,1-4.567,14.567Z" transform="translate(-11803.999 -2367)" fill="#d43533"/>
                                          </g>
                                          <rect id="Rectangle_19022" data-name="Rectangle 19022" width="1" height="8" rx="0.5" transform="translate(31.5 377)" fill="#d43533"/>
                                        </g>
                                    </svg>
                                    <span class="user-top-menu-name text-primary has-transition ml-3">Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </header>
@endsection