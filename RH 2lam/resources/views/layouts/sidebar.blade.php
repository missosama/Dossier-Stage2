
            <div class="left side-menu" style="background: rgb(0, 0, 0)">
                <div class="slimscroll-menu" id="remove-scroll">


                    <div id="sidebar-menu">


                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title">Main</li>
                            <li class="">
                                <a href="{{route('admin')}}" class="waves-effect {{ request()->is("admin") || request()->is("admin/*") ? "mm active" : "" }}">
                                    <i class="ti-home"></i> <span> Dashboard </span>
                                </a>
                            </li>


                            <li>
                            <a href="/employees" class="waves-effect {{ request()->is("employees") || request()->is("/employees/*") ? "mm active" : "" }}"><i class="ti-user"></i><span> Employees </span></a>

                            </li>

                            <li class="menu-title">Management</li>
                            <li class="">
                                <a href="#" class="waves-effect">
                                    <i class="dripicons-to-do"></i> <span> Attendance </span> <span class="menu-arrow"></span>
                                </a>
                                <ul class="submenu">
                                    <li class="">
                                        <a href="/schedule" class="{{ request()->is('schedule') || request()->is('schedule/*') ? 'mm active' : '' }}">
                                            <i class="ti-time"></i> <span> Schedule </span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="/check" class="{{ request()->is('check') || request()->is('check/*') ? 'mm active' : '' }}">
                                            <i class="dripicons-to-do"></i> <span> Attendance Sheet </span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="/sheet-report" class="{{ request()->is('sheet-report') || request()->is('sheet-report/*') ? 'mm active' : '' }}">
                                            <i class="dripicons-to-do"></i> <span> Sheet Report </span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="/attendance" class="{{ request()->is('attendance') || request()->is('attendance/*') ? 'mm active' : '' }}">
                                            <i class="ti-calendar"></i> <span> Attendance Logs </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="">
                                <a href="/lvr" class="waves-effect {{ request()->is("lvr") || request()->is("lvr/*") ? "mm active" : "" }}">
                                    <i class="dripicons-backspace"></i> <span> Leave Request </span>
                                </a>
                            </li>

                            <li class="">
                                <a href="#" class="waves-effect">
                                    <i class="ti-menu"></i> <span> Post Job </span> <span class="menu-arrow"></span>
                                </a>
                                <ul class="submenu">
                                    <li class="">
                                        <a href="/candidates" class="{{ request()->is('candidates') || request()->is('candidates/*') ? 'mm active' : '' }}">
                                            <i class="ti-user"></i> <span> Candidates </span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="/postJobs" class="{{ request()->is('postJobs') || request()->is('postJobs/*') ? 'mm active' : '' }}">
                                            <i class="ti-pencil-alt"></i> <span> Post Jobs </span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="/interviews" class="{{ request()->is('interviews') || request()->is('interviews/*') ? 'mm active' : '' }}">
                                            <i class="ti-check-box"></i> <span> Interviews </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="">
                                <a href="#" class="waves-effect">
                                    <i class="ti-layout"></i> <span> Training </span> <span class="menu-arrow"></span>
                                </a>
                                <ul class="submenu">
                                    <li class="">
                                        <a href="/schT" class="{{ request()->is('schT') || request()->is('schT/*') ? 'mm active' : '' }}">
                                            <i class="ti-calendar"></i> <span> Schedule </span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="/ressources" class="{{ request()->is('resources') || request()->is('resources/*') ? 'mm active' : '' }}">
                                            <i class="ti-bookmark-alt"></i> <span> Resources </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-title">Tools</li>
                            <li class="">
                                <a href="{{ route("finger_device.index") }}" class="waves-effect {{ request()->is("finger_device") || request()->is("finger_device/*") ? "mm active" : "" }}">
                                    <i class="fas fa-fingerprint"></i> <span> Biometric Device </span>
                                </a>
                            </li>

                        </ul>
						<!-- Log on to codeastro.com for more projects! -->
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->
