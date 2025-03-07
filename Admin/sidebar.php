<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="bg-header-dark">
        <div class="content-header bg-white-5">
        <!-- Logo -->
        <a class="fw-semibold text-white tracking-wide" href="index.php">
            <!-- <span class="smini-visible">
            D<span class="opacity-75">x</span>
            </span>
            <span class="smini-hidden">
            Dash<span class="opacity-75">mix</span>
            </span> -->
            <span class="smini-hidden">C<span class="opacity-75">ycle</span>S<span class="opacity-75">cribe</span></span>
        </a>
        <!-- END Logo -->

        <!-- Options -->
        <div>
            <!-- Toggle Sidebar Style -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <!-- Class Toggle, functionality initialized in Helpers.dmToggleClass() -->
            <!-- <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle" data-target="#sidebar-style-toggler" data-class="fa-toggle-off fa-toggle-on" onclick="Dashmix.layout('sidebar_style_toggle');Dashmix.layout('header_style_toggle');">
            <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
            </button> -->
            <!-- END Toggle Sidebar Style -->

            <!-- Dark Mode -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <!-- <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle" data-target="#dark-mode-toggler" data-class="far fa" onclick="Dashmix.layout('dark_mode_toggle');">
            <i class="far fa-moon" id="dark-mode-toggler"></i>
            </button> -->
            <!-- END Dark Mode -->

            <!-- Close Sidebar, Visible only on mobile screens -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout" data-action="sidebar_close">
            <i class="fa fa-times-circle"></i>
            </button>
            <!-- END Close Sidebar -->
        </div>
        <!-- END Options -->
        </div>
    </div>
        <!-- END Side Header -->

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link" href="index.php">
                        <i class="nav-main-link-icon fa fa-location-arrow"></i>
                        <span class="nav-main-link-name">Dashboard</span>
                        <!-- <span class="nav-main-link-badge badge rounded-pill bg-primary">8</span> -->
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="viewUser.php">
                        <i class="nav-main-link-icon fa fa-clone"></i>
                        <span class="nav-main-link-name">User</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-clone"></i>
                        <span class="nav-main-link-name">Books</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="viewBooks.php">
                                <span class="nav-main-link-name">View Books</span>
                            </a>
                        </li>
                        <!-- <li class="nav-main-item">
                            <a class="nav-main-link" href="bookCategory.php">
                                <span class="nav-main-link-name">Book Category</span>
                            </a>
                        </li> -->
                    </ul>  
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="viewOrders.php">
                        <i class="nav-main-link-icon fa fa-clone"></i>
                        <span class="nav-main-link-name">Order</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-clone"></i>
                        <span class="nav-main-link-name">Reports &amp; Analysis</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="orderReports.php">
                                <span class="nav-main-link-name">Order Reports</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="userReports.php">
                                <span class="nav-main-link-name">User Reports</span>
                            </a>
                        </li>
                        <!-- <li class="nav-main-item">
                            <a class="nav-main-link" href="viewPackage.php">
                                <span class="nav-main-link-name">Inventory Reports</span>
                            </a>
                        </li> -->
                    </ul>  
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="viewRecycleRequest.php">
                        <i class="nav-main-link-icon fa fa-clone"></i>
                        <span class="nav-main-link-name">Recycle Request</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="viewFeedback.php">
                        <i class="nav-main-link-icon fa fa-clone"></i>
                        <span class="nav-main-link-name">Feedback</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
        <!-- END Sidebar Scrolling -->
</nav>