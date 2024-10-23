<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="https://learn.careerwave.org/admin/login" class="brand-link">
        <img src="{{ asset('assets/CareerLogo.png') }}" alt="Career Wave Logo" class="brand-image  elevation-4"
            style="opacity: .8">
        <span class="brand-text font-weight-bold">Career Wave</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item ">
                    <a href="{{ Route('admin.pages.getCourse') }}" class="nav-link {{ request()->is('admin/course') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-book"></i>
                        <p>
                            Courses
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ Route('admin.pages.getExamName') }}" class="nav-link {{ request()->is('admin/examName') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p>
                            Exam Name
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ Route('admin.pages.getBatch') }}" class="nav-link {{ request()->is('admin/batch') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Batch
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ Route('admin.pages.blogs') }}" class="nav-link {{ request()->is('admin/blog') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-blog"></i>
                        <p>
                            Blog
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ Route('admin.pages.pageContent') }}" class="nav-link  {{ request()->is('admin/page-content') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Page Content
                        </p>
                    </a>
                </li>
                <li class="nav-item  {{ request()->is('admin/faqs/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-question-circle"></i>
                        <p>
                            FAQ's
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="{{ Route('admin.pages.getFaq') }}" class="nav-link {{ request()->is('admin/faqs/website') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Website</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ Route('admin.pages.getExamFaq') }}" class="nav-link {{ request()->is('admin/faqs/exam') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Exam</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ Route('admin.pages.getBatchFaq') }}" class="nav-link  {{ request()->is('admin/faqs/batch') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Batch</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ Route('admin.pages.banner') }}" class="nav-link {{ request()->is('admin/banner') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            Website Banner
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ Route('admin.pages.review') }}" class="nav-link {{ request()->is('admin/review') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-star"></i>
                        <p>
                            Review
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ Route('admin.pages.platform') }}" class="nav-link {{ request()->is('admin/platform') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-laptop"></i>
                        <p>
                            Platform
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ Route('admin.pages.Founder') }}" class="nav-link {{ request()->is('admin/founder') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            Founder
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ Route('admin.pages.Enquiry') }}" class="nav-link {{ request()->is('admin/enquiry') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Enquiry
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('admin/settings/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Setting
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="{{ Route('admin.pages.Settings') }}" class="nav-link {{ request()->is('admin/settings/general') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    General
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ Route('admin.pages.missionVision') }}" class="nav-link {{ request()->is('admin/settings/mission-vision') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mission Vision</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item ">
                    <form id="logout" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout').submit();"
                        class="nav-link ">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>

                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // $(document).ready(function() {
        //     // Check if there is an active link stored in localStorage and set it as active
        //     var currentActiveLink = localStorage.getItem('activeLink');
        //     if (currentActiveLink) {
        //         $('nav a.nav-link').removeClass('active');
        //         $('nav a.nav-link[href="' + currentActiveLink + '"]').addClass('active');
        //     }

        //     // Add 'active' class to the clicked link, remove it from other links, and store the active link
        //     $('nav a.nav-link').on('click', function() {
        //         $('nav a.nav-link').removeClass('active');
        //         $(this).addClass('active');

        //         // Store the href of the clicked link in localStorage
        //         var activeLink = $(this).attr('href');
        //         localStorage.setItem('activeLink', activeLink);
        //     });
        // });
    </script>

</aside>
