<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="index.html">
                    <img src="images/icon/logo.png" alt="CoolAdmin" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-tachometer-alt"></i>Dashboard
                    </a>
                </li>
                <li>
                    <a href="chart.html">
                        <i class="fas fa-chart-bar"></i>Charts</a>
                </li>
                <li>
                    <a href="table.html">
                        <i class="fas fa-table"></i>Tables</a>
                </li>
                <li>
                    <a href="form.html">
                        <i class="far fa-check-square"></i>Forms</a>
                </li>
                <li>
                    <a href="calendar.html">
                        <i class="fas fa-calendar-alt"></i>Calendar</a>
                </li>
                <li>
                    <a href="map.html">
                        <i class="fas fa-map-marker-alt"></i>Maps</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>Pages</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="login.html">Login</a>
                        </li>
                        <li>
                            <a href="register.html">Register</a>
                        </li>
                        <li>
                            <a href="forget-pass.html">Forget Password</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-desktop"></i>UI Elements</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="button.html">Button</a>
                        </li>
                        <li>
                            <a href="badge.html">Badges</a>
                        </li>
                        <li>
                            <a href="tab.html">Tabs</a>
                        </li>
                        <li>
                            <a href="card.html">Cards</a>
                        </li>
                        <li>
                            <a href="alert.html">Alerts</a>
                        </li>
                        <li>
                            <a href="progress-bar.html">Progress Bars</a>
                        </li>
                        <li>
                            <a href="modal.html">Modals</a>
                        </li>
                        <li>
                            <a href="switch.html">Switchs</a>
                        </li>
                        <li>
                            <a href="grid.html">Grids</a>
                        </li>
                        <li>
                            <a href="fontawesome.html">Fontawesome Icon</a>
                        </li>
                        <li>
                            <a href="typo.html">Typography</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->

<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="images/icon/logo.png" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub">
                    <a href="#!dashboard">
                        <i class="fas fa-tachometer-alt"></i>Dashboard
                    </a>
                </li>
                @if(Auth::user()->role === 'admin')
                <li>
                    <a href="#!students">
                        <i class="fas fa-users"></i>Students
                    </a>
                </li>
                <li>
                    <a href="#!teachers">
                        <i class="fas fa-user"></i>Teachers</a>
                </li>
                <li>
                    <a href="#!course">
                        <i class="fas fa-book"></i>Course</a>
                </li>
                <li>
                    <a href="#!staff">
                        <i class="fas fa-money"></i>Accountants
                    </a>
                </li>
                <li>
                    <a href="#!classes">
                        <i class="fas fa-user-md"></i>Classes
                    </a>
                </li>
                <li>
                    <a href="#!results">
                        <i class="far fa-bar-chart-o"></i>Results
                    </a>
                </li>
                <li>
                    <a href="#!time_table">
                        <i class="fas fa-calendar-alt"></i>Time Table
                    </a>
                </li>
                @endif
                @if(Auth::user()->role === 'teacher')
                <li>
                    <a href="#!students">
                        <i class="fas fa-users"></i>My Student
                    </a>
                </li>
                <li>
                    <a href="#!upload_marks">
                        <i class="fas fa-upload"></i>Upload Marks</a>
                </li>
                <li>
                    <a href="#!classes">
                        <i class="fas fa-user-md"></i>Classes
                    </a>
                </li>
                <li>
                    <a href="#!results">
                        <i class="far fa-bar-chart-o"></i>Results
                    </a>
                </li>
                <li>
                    <a href="#!time_table">
                        <i class="fas fa-calendar-alt"></i>Time Table
                    </a>
                </li>
                <li>
                    <a href="#!view_all_announcement">
                        <i class="fas fa-bullhorn"></i>Announcement
                    </a>
                </li>
                @endif
                @if(Auth::user()->role === 'accountant')
                <li>
                    <a href="#!students">
                        <i class="fas fa-users"></i>My Student
                    </a>
                </li>
                <li>
                    <a href="#!teachers">
                        <i class="fas fa-user"></i>Teachers</a>
                </li>
                <li>
                    <a href="#!time_table">
                        <i class="fas fa-calendar-alt"></i>Time Table
                    </a>
                </li>
                <li>
                    <a href="#!time_table">
                        <i class="fas fa-calendar-alt"></i>Payment
                    </a>
                </li>
                <li>
                    <a href="#!view_all_announcement">
                        <i class="fas fa-bullhorn"></i>Announcement
                    </a>
                </li>
                @endif
                <li>
                    <a href="#!holidays">
                        <i class="fas fa-calendar"></i>Holidays
                    </a>
                </li>
                <li>
                    <a href="#!request">
                        <i class="fas fa-envelope"></i>Request
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->