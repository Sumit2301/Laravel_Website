<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt"></i>
                    Dashboard
                </a>
            </li>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users nav-icon"></i>
                        Manage College
                    </a>
                    <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="{{ route("admin.colleges.add-new") }}" class="nav-link {{ request()->is('admin/colleges/add-new') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon"></i>
                                    Add College
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route("admin.colleges") }}" class="nav-link {{ request()->is('admin/colleges') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon"></i>
                                    All College
                                </a>
                            </li>
                    </ul>
                </li>
				<li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users nav-icon"></i>
                        Manage Exams
                    </a>
                    <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="{{ route("admin.exams.add-new") }}" class="nav-link {{ request()->is('admin/exams/add-new') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon"></i>
                                    Add Exam
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route("admin.exams") }}" class="nav-link {{ request()->is('admin/exams') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon"></i>
                                    All Exams
                                </a>
                            </li>
                    </ul>
                </li>

                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users nav-icon"></i>
                       Courses
                    </a>
                    <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="{{ route("admin.courses.add-new") }}" class="nav-link {{ request()->is('admin/courses/add-new') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon"></i>
                                    Add Course
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route("admin.courses") }}" class="nav-link {{ request()->is('admin/courses') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon"></i>
                                    All Courses
                                </a>
                            </li>
                    </ul>
                </li>


                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users nav-icon"></i>
                       Rank Type
                    </a>
                    <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="{{ route("admin.ranktypes.create") }}" class="nav-link {{ request()->is('admin/ranktype') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon"></i>
                                    Add Rank Type
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route("admin.ranktypes.index") }}" class="nav-link {{ request()->is('admin/ranktype/ranklist') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon"></i>
                                    All Rank Types
                                </a>
                            </li>
                    </ul>
                </li>

            <li class="nav-item">
                <a href="{{ route("admin.blogs.index") }}" class="nav-link" >
                    <i class="nav-icon fas fa-fw fa-list"></i>
                    News
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route("admin.ebooks") }}" class="nav-link" >
                    <i class="nav-icon fas fa-file-pdf-o fa-list"></i>
                    Ebooks
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route("admin.articles.index") }}" class="nav-link" >
                    <i class="nav-icon fas fa-fw fa-list"></i>
                    MBA Course Blogs
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route("admin.staticpages.index") }}" class="nav-link" >
                    <i class="nav-icon fas fa-fw fa-list"></i>
                    Static Pages
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ url("admin/videos") }}" class="nav-link" >
                    <i class="nav-icon fas fa-file-pdf-o fa-list"></i>
                    Videos
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route("admin.courseinterests.index") }}" class="nav-link" >
                    <i class="nav-icon fas fa-fw fa-heart"></i>
                    Show Interest
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route("admin.newsletters.index") }}" class="nav-link" >
                    <i class="nav-icon fas fa-fw fa-heart"></i>
                    Subscribe Newsletter
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route("admin.courseexpertadvices.index") }}" class="nav-link" >
                    <i class="nav-icon fas fa-fw fa-question-circle"></i>
                    Free Expert Advice
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route("admin.downloadbrochures.index") }}" class="nav-link" >
                    <i class="nav-icon fas fa-fw fa-file-pdf-o"></i>
                    Download Brochures
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route("admin.contacts.index") }}" class="nav-link" >
                    <i class="nav-icon fas fa-fw fa-question-circle"></i>
                    Contact Enquiries
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ url("admin/college-enquires") }}" class="nav-link" >
                    <i class="nav-icon fas fa-fw fa-question-circle"></i>
                    College Enquiries
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route("admin.cities.index") }}" class="nav-link" >
                    <i class="nav-icon fas fa-fw fa-list"></i>
                    Cities
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route("admin.college-predictor") }}" class="nav-link" >
                    <i class="nav-icon fas fa-fw fa-list"></i>
                    College Predictor
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route("logout") }}" class="nav-link" >
                    <i class="nav-icon fas fa-fw fa-sign-out-alt"></i>
                    Logout
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>