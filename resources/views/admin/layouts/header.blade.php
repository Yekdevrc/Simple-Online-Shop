<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="{{route('admin.dashboard')}}" class="logo d-flex align-items-center">
            <img src="{{asset('assets/img/logo.png')}}" alt="">
            <span class="d-none d-lg-block">Online Shop</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->


            <li class="nav-item dropdown">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-chat-left-text"></i>
                    <span class="badge bg-success badge-number">{{\App\Models\FAQ::all()->count()}}</span>
                </a><!-- End Messages Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                    <li class="dropdown-header">
                        You have  new messages
                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    @forelse(\App\Models\FAQ::all() as $faq)
                    <li class="message-item text-center">
                        <a href="#">
                            <div>
                                <h4>{{$faq->name}}</h4>
                                <p>{{$faq->subject}}</p>
                                <p>{{$faq->email}}</p>
                            </div>
                        </a>
                    </li>
                    @empty
                        <li class="message-item text-center">No Message Found</li>
                    <li>
                        @endforelse
                        <hr class="dropdown-divider">
                    </li>

                </ul><!-- End Messages Dropdown Items -->

            </li><!-- End Messages Nav -->

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{auth()->user()->profile_photo_url ?? ''}}" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{auth()->user()->name?? ''}}</span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li>
                        <form class="dropdown-item d-flex align-items-center" action="{{route('admin.logout')}}" method="post">
                            @csrf
                            <i class="bi bi-box-arrow-right"></i>
                            <button type="submit" class="btn-close">
                            <span>Sign Out</span>
                            </button>
                        </form>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->
