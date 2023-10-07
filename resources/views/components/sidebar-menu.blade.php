<!-- navbar vertical -->
<!-- Sidebar -->
<nav class="navbar-vertical navbar">
    <div class="vh-100" data-simplebar>
        <!-- Brand logo -->
        <a class="navbar-brand" href="/dashboard">
            <img src="./assets/images/brand/google-drive.svg" alt="">
        </a>
        <!-- Navbar nav -->
        <ul class="navbar-nav flex-column" id="sideNavbar">
            <li class="nav-item">
                <a class="nav-link   collapsed " href="#" data-bs-toggle="collapse" data-bs-target="#navDashboard"
                    aria-expanded="false" aria-controls="navDashboard">
                    <i class="nav-icon fe fe-home me-2"></i> Dashboard
                </a>
                <div id="navDashboard" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item ">
                            <a class="nav-link " href="#">
                                Inicio
                            </a>
                        </li>
                        <!-- Nav item -->
                        <li class="nav-item ">
                            <a class="nav-link " href="#">
                                Mi perfil

                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link  collapsed " href="#" data-bs-toggle="collapse" data-bs-target="#navCourses"
                    aria-expanded="false" aria-controls="navCourses">
                    <i class="nav-icon fe fe-book me-2"></i> Courses
                </a>
                <div id="navCourses" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="../../../pages/dashboard/admin-course-overview.html">
                                All Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../../../pages/dashboard/admin-course-category.html">
                                Courses Category
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../../../pages/dashboard/admin-course-category-single.html">
                                Category Single
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link   collapsed " href="#" data-bs-toggle="collapse" data-bs-target="#navProfile"
                    aria-expanded="false" aria-controls="navProfile">
                    <i class="nav-icon fe fe-user me-2"></i> User
                </a>
                <div id="navProfile" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="../../../pages/dashboard/admin-instructor.html">
                                Instructor
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../../../pages/dashboard/admin-students.html">Students</a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Nav item -->
            <li class="nav-item ">
                <a class="nav-link   collapsed  " href="#" data-bs-toggle="collapse" data-bs-target="#navCMS"
                    aria-expanded="false" aria-controls="navCMS">
                    <i class="nav-icon fe fe-book-open me-2"></i> CMS
                </a>
                <div id="navCMS" class="collapse  " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link   " href="../../../pages/dashboard/admin-cms-overview.html">
                                Overview
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  " href="../../../pages/dashboard/admin-cms-post.html">
                                All Post
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../../../pages/dashboard/admin-cms-post-new.html">
                                New Post
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../../../pages/dashboard/admin-cms-post-category.html">
                                Category
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Nav item -->
            <li class="nav-item ">
                <a class="nav-link   collapsed  " href="#" data-bs-toggle="collapse" data-bs-target="#navProject"
                    aria-expanded="false" aria-controls="navProject">
                    <i class="nav-icon fe fe-file me-2"></i> Project
                </a>
                <div id="navProject" class="collapse  " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link   " href="../../../pages/dashboard/project-grid.html">
                                Grid
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  " href="../../../pages/dashboard/project-list.html">
                                List
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link   collapsed  " href="#" data-bs-toggle="collapse"
                                data-bs-target="#navprojectSingle" aria-expanded="false"
                                aria-controls="navprojectSingle">

                                Single
                            </a>
                            <div id="navprojectSingle" class="collapse " data-bs-parent="#navProject">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link " href="../../../pages/dashboard/project-overview.html">
                                            Overview
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="../../../pages/dashboard/project-task.html">
                                            Task
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="../../../pages/dashboard/project-budget.html">
                                            Budget
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="../../../pages/dashboard/project-team.html">
                                            Team
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="../../../pages/dashboard/project-files.html">
                                            Files
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="../../../pages/dashboard/project-summary.html">
                                            Summary
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../../../pages/dashboard/add-project.html">
                                Create Project
                            </a>
                        </li>









                    </ul>
                </div>
            </li>






            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link  collapsed " href="#" data-bs-toggle="collapse"
                    data-bs-target="#navAuthentication" aria-expanded="false" aria-controls="navAuthentication">
                    <i class="nav-icon fe fe-lock me-2"></i> Authentication
                </a>
                <div id="navAuthentication" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="../../../pages/sign-in.html">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  " href="../../../pages/sign-up.html">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../../../pages/forget-password.html">
                                Forget Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  " href="../../../pages/dashboard/notification-history.html">
                                Notifications
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  " href="../../../pages/404-error.html"> 404 Error</a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link  collapsed " href="#" data-bs-toggle="collapse"
                    data-bs-target="#navecommerce" aria-expanded="false" aria-controls="navecommerce">
                    <i class="nav-icon fe fe-shopping-bag me-2"></i> Ecommerce
                </a>
                <div id="navecommerce" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link   collapsed  " href="#" data-bs-toggle="collapse"
                                data-bs-target="#navproduct" aria-expanded="false" aria-controls="navproduct">

                                Product
                            </a>
                            <div id="navproduct" class="collapse " data-bs-parent="#navProduct">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link "
                                            href="../../../pages/dashboard/ecommerce/product-grid.html">Grid</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link "
                                            href="../../../pages/dashboard/ecommerce/product-grid-with-sidebar.html">Grid
                                            Sidebar</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link "
                                            href="../../../pages/dashboard/ecommerce/products.html">Products</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link "
                                            href="../../../pages/dashboard/ecommerce/product-single.html">Product
                                            Single</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link "
                                            href="../../../pages/dashboard/ecommerce/product-single-v2.html">Product
                                            Single v2</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link  "
                                            href="../../../pages/dashboard/ecommerce/add-product.html">Add Product</a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  "
                                href="../../../pages/dashboard/ecommerce/shopping-cart.html">Shopping Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  " href="../../../pages/dashboard/ecommerce/checkout.html">Checkout</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  " href="../../../pages/dashboard/ecommerce/order.html">Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  " href="../../../pages/dashboard/ecommerce/order-single.html">Order
                                Single</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  " href="../../../pages/dashboard/ecommerce/order-history.html">Order
                                History</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  " href="../../../pages/dashboard/ecommerce/order-summary.html">Order
                                Summary</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link  "
                                href="../../../pages/dashboard/ecommerce/customers.html">Customers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  "
                                href="../../../pages/dashboard/ecommerce/customer-single.html">Customer Single</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  " href="../../../pages/dashboard/ecommerce/add-customer.html">Add
                                Customer</a>
                        </li>




                    </ul>
                </div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link  collapsed " href="#" data-bs-toggle="collapse"
                    data-bs-target="#navlayouts" aria-expanded="false" aria-controls="navlayouts">
                    <i class="nav-icon fe fe-layout me-2"></i> Layouts
                </a>
                <div id="navlayouts" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link "
                                href="../../../pages/dashboard/layouts/layout-horizontal.html">Top</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="../../../pages/dashboard/layouts/layout-compact.html">
                                Compact
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  "
                                href="../../../pages/dashboard/layouts/layout-vertical.html">Vertical</a>
                        </li>

                    </ul>
                </div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <div class="nav-divider"></div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <div class="navbar-heading">Apps</div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link " href="../../../pages/dashboard/chat-app.html">
                    <i class="nav-icon fe fe-message-square me-2"></i> Chat

                </a>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link " href="../../../pages/dashboard/task-kanban.html">
                    <i class="nav-icon mdi mdi-trello me-2"></i>
                    Task
                </a>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link " href="../../../pages/dashboard/mail.html">
                    <i class="nav-icon mdi mdi-email-outline me-2"></i>
                    Mail
                </a>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link " href="../../../pages/dashboard/calendar.html">
                    <i class="nav-icon mdi mdi-calendar me-2"></i>
                    Calendar
                </a>
            </li>
            <li class="nav-item">
                <div class="nav-divider"></div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <div class="navbar-heading">Components</div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link  collapsed " href="#" data-bs-toggle="collapse" data-bs-target="#navTables"
                    aria-expanded="false" aria-controls="navTables">
                    <i class="nav-icon fe fe-database me-2"></i> Tables
                </a>
                <div id="navTables" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="../../../pages/dashboard/basic-table.html">
                                Basic
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../../../pages/dashboard/datatables.html">
                                Data Tables
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <!-- Nav item -->
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link " href="../../../pages/help-center.html">
                    <i class="nav-icon fe fe-help-circle me-2"></i> Help Center

                </a>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link  collapsed " href="#" data-bs-toggle="collapse"
                    data-bs-target="#navSiteSetting" aria-expanded="false" aria-controls="navSiteSetting">
                    <i class="nav-icon fe fe-settings me-2"></i> Site Setting
                </a>
                <div id="navSiteSetting" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="../../../pages/dashboard/setting-general.html">
                                General
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../../../pages/dashboard/setting-google.html">
                                Google
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../../../pages/dashboard/setting-social.html">
                                Social
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../../../pages/dashboard/setting-social-login.html">
                                Social Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../../../pages/dashboard/setting-payment.html">
                                Payment
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../../../pages/dashboard/setting-smpt.html">
                                SMPT
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link  collapsed " href="#" data-bs-toggle="collapse"
                    data-bs-target="#navMenuLevel" aria-expanded="false" aria-controls="navMenuLevel">
                    <i class="nav-icon fe fe-corner-left-down me-2"></i> Menu Level
                </a>
                <div id="navMenuLevel" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="#" data-bs-toggle="collapse"
                                data-bs-target="#navMenuLevelSecond" aria-expanded="false"
                                aria-controls="navMenuLevelSecond">
                                Two Level
                            </a>
                            <div id="navMenuLevelSecond" class="collapse" data-bs-parent="#navMenuLevel">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link " href="#">NavItem 1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="#">NavItem 2</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  collapsed  " href="#" data-bs-toggle="collapse"
                                data-bs-target="#navMenuLevelThree" aria-expanded="false"
                                aria-controls="navMenuLevelThree">
                                Three Level
                            </a>
                            <div id="navMenuLevelThree" class="collapse " data-bs-parent="#navMenuLevel">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link  collapsed " href="#" data-bs-toggle="collapse"
                                            data-bs-target="#navMenuLevelThreeOne" aria-expanded="false"
                                            aria-controls="navMenuLevelThreeOne">
                                            NavItem 1
                                        </a>
                                        <div id="navMenuLevelThreeOne" class="collapse collapse "
                                            data-bs-parent="#navMenuLevelThree">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a class="nav-link " href="#">
                                                        NavChild Item 1
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="#">Nav
                                            Item 2</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <div class="nav-divider"></div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <div class="navbar-heading">Documentation</div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link" href="../../../docs/index.html">
                    <i class="nav-icon fe fe-clipboard me-2"></i> Documentation
                </a>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link" href="../../../docs/changelog.html">
                    <i class="nav-icon fe fe-git-pull-request me-2"></i> Changelog <span class="text-primary ms-1"
                        id="changelog"></span>
                </a>
            </li> --}}
        </ul>

    </div>
</nav>
