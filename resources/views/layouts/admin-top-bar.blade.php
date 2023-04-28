@section('admin-top-bar')
<div class="aiz-topbar px-15px px-lg-25px d-flex align-items-stretch justify-content-between">
    <div class="d-flex">
        <div class="aiz-topbar-nav-toggler d-flex align-items-center justify-content-start mr-2 mr-md-3 ml-0" data-toggle="aiz-mobile-nav">
            <button class="aiz-mobile-toggler">
                <span></span>
            </button>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-stretch flex-grow-xl-1">
        <div class="d-flex justify-content-around align-items-center align-items-stretch">
            <div class="d-flex justify-content-around align-items-center align-items-stretch">
                <div class="aiz-topbar-item">
                    <div class="d-flex align-items-center">
                        <a class="btn btn-icon btn-circle btn-light" href="/" target="_blank" title="Browse Website">
                            <i class="las la-globe"></i>
                        </a>
                    </div>
                </div>
            </div>
                            <div class="d-flex justify-content-around align-items-center align-items-stretch ml-3">
                    <div class="aiz-topbar-item">
                        <div class="d-flex align-items-center">
                            <a class="btn btn-icon btn-circle btn-light" href="/admin/pos" target="_blank" title="POS">
                                <i class="las la-print"></i>
                            </a>
                        </div>
                    </div>
                </div>
                        <div class="d-flex justify-content-around align-items-center align-items-stretch ml-3">
                <div class="aiz-topbar-item">
                    <div class="d-flex align-items-center">
                        @if ($store)
                            <a class="btn btn-soft-danger btn-sm d-flex align-items-center" href="">
                                <i class="las la-store fs-20"></i>
                                <span class="fw-500 ml-1 mr-0 d-none d-md-block">Current Store: {{ $store->name }}</span>
                            </a>
                        @else
                            PLEASE PICK A STORE TO MANAGE
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-around align-items-center align-items-stretch">

            <div class="aiz-topbar-item ml-2">
                <div class="align-items-stretch d-flex dropdown">
                    <a class="dropdown-toggle no-arrow" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="btn btn-icon p-0 d-flex justify-content-center align-items-center">
                            <span class="d-flex align-items-center position-relative">
                                <i class="las la-bell fs-24"></i>
                                @if ($user->unreadNotifications->count() > 0 )
                                    <span class="badge badge-sm badge-dot badge-circle badge-primary position-absolute absolute-top-right"></span>
                                @endif
                            </span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-lg py-0">
                        <div class="p-3 bg-light border-bottom">
                            <h6 class="mb-0">Notifications</h6>
                        </div>
                        <div class="px-3 c-scrollbar-light overflow-auto " style="max-height:300px;">
                            <ul class="list-group list-group-flush">
                                @foreach ($user->unreadNotifications  as $notification)
                                    <li class="list-group-item d-flex justify-content-between align-items- py-3">
                                        <div class="media text-inherit">
                                            <div class="media-body">
                                                <p class="mb-1 text-truncate-2">
                                                    <a href="{{ $notification->data['url'] ?? '' }}">
                                                        {{ $notification->data['message'] }}
                                                    </a>
                                                </p>
                                                <small class="text-muted">
                                                    September 12 2022, 12:09 am
                                                </small>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="text-center border-top">
                            <a href="/admin/all-notification" class="text-reset d-block py-2">
                                View All Notifications
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="aiz-topbar-item ml-2">
            
            </div>

            <div class="aiz-topbar-item ml-2">
                <div class="align-items-stretch d-flex dropdown">
                    <a class="dropdown-toggle no-arrow text-dark" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <span class="avatar avatar-sm mr-md-2">
                                <img
                                    src="/"
                                    onerror="this.onerror=null;this.src='/assets/img/avatar-place.png';"
                                >
                            </span>
                            <span class="d-none d-md-block">
                                <span class="d-block fw-500">{{ $user->name }}</span>
                                <span class="d-block small opacity-60">admin</span>
                            </span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-md">
                        <a href="/admin/profile" class="dropdown-item">
                            <i class="las la-user-circle"></i>
                            <span>Profile</span>
                        </a>

                        <a onclick="return logout()" class="dropdown-item">
                            <i class="las la-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>
            </div><!-- .aiz-topbar-item -->
        </div>
    </div>
</div><!-- .aiz-topbar -->
@endsection