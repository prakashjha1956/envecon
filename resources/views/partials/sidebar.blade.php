@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>

            
            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('role_access')
                <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('quickadmin.roles.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('user_access')
                <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('quickadmin.users.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('user_action_access')
                <li class="{{ $request->segment(2) == 'user_actions' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.user_actions.index') }}">
                            <i class="fa fa-th-list"></i>
                            <span class="title">
                                @lang('quickadmin.user-actions.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('requirement_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-align-justify"></i>
                    <span class="title">@lang('quickadmin.requirements.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('time_work_type_access')
                <li class="{{ $request->segment(2) == 'time_work_types' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.time_work_types.index') }}">
                            <i class="fa fa-th"></i>
                            <span class="title">
                                @lang('quickadmin.time-work-types.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('time_project_access')
                <li class="{{ $request->segment(2) == 'time_projects' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.time_projects.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('quickadmin.time-projects.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('time_entry_access')
                <li class="{{ $request->segment(2) == 'time_entries' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.time_entries.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('quickadmin.time-entries.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('time_report_access')
                <li class="{{ $request->segment(2) == 'time_reports' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.time_reports.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('quickadmin.time-reports.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('request_to_technical_access')
                <li class="{{ $request->segment(2) == 'request_to_technicals' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.request_to_technicals.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                @lang('quickadmin.request-to-technical.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('status_access')
                <li class="{{ $request->segment(2) == 'statuses' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.statuses.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                @lang('quickadmin.status.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan

            

            

            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">Change password</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('quickadmin.logout')</button>
{!! Form::close() !!}
