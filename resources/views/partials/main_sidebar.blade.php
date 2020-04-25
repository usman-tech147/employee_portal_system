<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->first_name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <ul class="nav nav-treeview">
                        @role('hr')
                        <li class="nav-item">
                            <a href="{{route('home')}}" class="nav-link">
                                <i class="fas fa-tachometer-alt"></i>
                                <p>HR Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('users.index')}}" class="nav-link">
                                <i class="fas fa-graduation-cap"></i>
                                <p>HR Register Teacher</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('course.index')}}" class="nav-link">
                                <i class="fas fa-book"></i>
                                <p>HR Manage Course</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fab fa-buffer"></i>
                                <p>HR Manage Program</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('role.index')}}" class="nav-link">
                                <i class="fas fa-sliders-h"></i>
                                <p>HR Manage Roles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('permission.index')}}" class="nav-link">
                                <i class="fas fa-sliders-h"></i>
                                <p>HR Manage Permissions</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-marker"></i>
                                <p>HR Assign Grade</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-history"></i>
                                <p>
                                    HR View History

                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-">
                            <a href="#" class="nav-link">
                                <i class="fas fa-school"></i>
                                <p>
                                    School And Department
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('school.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>School</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('department.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Department</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Program</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endrole

                        @role('dean')
                        <li class="nav-item">
                            <a href="{{route('dean.dashboard')}}" class="nav-link">
                                <i class="fas fa-tachometer-alt"></i>
                                <p>DEAN Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('dean.teachers')}}" class="nav-link">
                                <i class="far fa-eye"> </i>
                                <p>DEAN View Teachers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('dean.assign.grade')}}" class="nav-link">
                                <i class="fas fa-marker"></i>
                                <p>DEAN Assign Grades</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('dean.report.hr')}}" class="nav-link">
                                <i class="fas fa-share"></i>
                                <p>DEAN Send Details To HR</p>
                            </a>
                        </li>
                        @endrole

                        @role('teacher')
                        <li class="nav-item">
                            <a href="{{route('teacher.dashboard')}}" class="nav-link">
                                <i class="fas fa-tachometer-alt"></i>
                                <p>Teacher Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('teacher.history')}}" class="nav-link">
                                <i class="far fa-eye"></i>
                                <p>Teacher View History</p>
                            </a>
                        </li>
                        @if (\Illuminate\Support\Facades\Auth::user()->status == 0)
                            <li class="nav-item">
                                <a href="{{route('teaching.tabs')}}" class="nav-link">
                                    <i class="fas fa-tasks"></i>
                                    <p>Teaching</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('advising.tabs')}}" class="nav-link">
                                    <i class="fas fa-ad"></i>
                                    <p>Advising & Counseling</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('research.tabs')}}" class="nav-link">
                                    <i class="fas fa-search"></i>
                                    <p>Research & Publications </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('institutional.tabs')}}" class="nav-link">
                                    <i class="fas fa-university"></i>
                                    <p>Institutional Engagements </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('teacher.report.dean')}}" class="nav-link">
                                    <i class="fas fa-share"></i>
                                    <p>Teacher Send Report To Dean</p>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{route('teacher.grade')}}" class="nav-link">
                                <i class="fas fa-binoculars"></i>
                                <p>Teacher View Grades</p>
                            </a>
                        </li>
                        @endrole
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"

                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>