@section('delivery-moble-bottom-nav')
 <!-- Footer -->
    <!-- Mobile bottom nav -->
    <div class="aiz-mobile-bottom-nav d-xl-none fixed-bottom border-top border-sm-bottom border-sm-left border-sm-right mx-auto mb-sm-2" style="background-color: rgb(255 255 255 / 90%)!important;">
        <div class="row align-items-center gutters-5">
            <!-- Dashboard -->
            <div class="col">
                <a href="/delivery/dashboard" class="text-secondary d-block text-center pb-2 pt-3 svg-active">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                        <g id="Group_24768" data-name="Group 24768" transform="translate(3495.144 -602)">
                          <path id="Path_2916" data-name="Path 2916" d="M15.3,5.4,9.561.481A2,2,0,0,0,8.26,0H7.74a2,2,0,0,0-1.3.481L.7,5.4A2,2,0,0,0,0,6.92V14a2,2,0,0,0,2,2H14a2,2,0,0,0,2-2V6.92A2,2,0,0,0,15.3,5.4M10,15H6V9A1,1,0,0,1,7,8H9a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H11V9A2,2,0,0,0,9,7H7A2,2,0,0,0,5,9v6H2a1,1,0,0,1-1-1V6.92a1,1,0,0,1,.349-.76l5.74-4.92A1,1,0,0,1,7.74,1h.52a1,1,0,0,1,.651.24l5.74,4.92A1,1,0,0,1,15,6.92Z" transform="translate(-3495.144 602)" fill="#b5b5bf"/>
                        </g>
                    </svg>
                    <span class="d-block mt-1 fs-10 fw-600 text-reset text-primary">Dashboard</span>
                </a>
            </div>
        
            <!-- My Delivery -->
            <div class="col">
                <a href="/delivery/completed-deliveries" class="text-secondary d-block text-center pb-2 pt-3 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                        <g id="Group_25708" data-name="Group 25708" transform="translate(-216.001 -824)">
                          <path id="Path_39411" data-name="Path 39411" d="M221.069,0a8,8,0,1,0,8,8,8,8,0,0,0-8-8m0,15a7,7,0,1,1,7-7,7,7,0,0,1-7,7" transform="translate(2.932 824)" fill="#b5b5bf"/>
                          <g id="Group_25704" data-name="Group 25704" transform="translate(0 0.268)">
                            <rect id="Rectangle_19508" data-name="Rectangle 19508" width="8" height="1" rx="0.5" transform="translate(222.233 834.389) rotate(-45)" fill="#b5b5bf"/>
                            <rect id="Rectangle_19509" data-name="Rectangle 19509" width="1" height="5" rx="0.5" transform="translate(219.404 831.561) rotate(-45)" fill="#b5b5bf"/>
                          </g>
                        </g>
                    </svg>
                    <span class="d-block mt-1 fs-10 fw-600 text-reset ">My Delivery</span>
                </a>
            </div>
        
            <!-- My Earnings -->
            <div class="col">
                <a href="/delivery/total-earnings" class="text-secondary d-block text-center pb-2 pt-3 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                        <g id="Group_25706" data-name="Group 25706" transform="translate(-216.001 -775)">
                          <path id="Path_39412" data-name="Path 39412" d="M221.069,0a8,8,0,1,0,8,8,8,8,0,0,0-8-8m0,15a7,7,0,1,1,7-7,7,7,0,0,1-7,7" transform="translate(2.932 775)" fill="#b5b5bf"/>
                          <path id="Path_39413" data-name="Path 39413" d="M120.688,9.323v-1a.5.5,0,0,0-1,0v1a2,2,0,0,0-2,2v.5a2,2,0,0,0,2,2h1a1,1,0,0,1,1,1v.5a1,1,0,0,1-1,1h-1a1,1,0,0,1-1-1,.5.5,0,1,0-1,0,2,2,0,0,0,2,2v1a.5.5,0,0,0,1,0v-1a2,2,0,0,0,2-2v-.5a2,2,0,0,0-2-2h-1a1,1,0,0,1-1-1v-.5a1,1,0,0,1,1-1h1a1,1,0,0,1,1,1,.5.5,0,0,0,1,0,2,2,0,0,0-2-2" transform="translate(103.813 769.677)" fill="#b5b5bf"/>
                        </g>
                    </svg>
                    <span class="d-block mt-1 fs-10 fw-600 text-reset ">My Earnings</span>
                </a>
            </div>
        
            <!-- Account -->
            <div class="col">
                                <a href="javascript:void(0)" class="text-secondary d-block text-center pb-2 pt-3 mobile-side-nav-thumb" data-toggle="class-toggle" data-backdrop="static" data-target=".aiz-mobile-side-nav">
                        <span class="d-block mx-auto">
                                                        <img src="https://demo.activeitzone.com/ecommerce/public/assets/img/avatar-place.png" class="rounded-circle size-20px">
                                                </span>
                        <span class="d-block mt-1 fs-10 fw-600 text-reset">My Account</span>
                    </a>
                        </div>
        </div>
        </div>
@endsection