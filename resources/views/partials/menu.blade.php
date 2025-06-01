<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('charity_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.charities.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/charities") || request()->is("admin/charities/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-gem c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.charity.title') }}
                </a>
            </li>
        @endcan
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/departments*") ? "c-show" : "" }} {{ request()->is("admin/sections*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('department_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.departments.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/departments") || request()->is("admin/departments/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-bezier-curve c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.department.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('section_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sections.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sections") || request()->is("admin/sections/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-align-left c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.section.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('services_managment_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/services*") ? "c-show" : "" }} {{ request()->is("admin/courses*") ? "c-show" : "" }} {{ request()->is("admin/course-students*") ? "c-show" : "" }} {{ request()->is("admin/buildings*") ? "c-show" : "" }} {{ request()->is("admin/building-beneficiaries*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-server c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.servicesManagment.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('service_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.services.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/services") || request()->is("admin/services/*") ? "c-active" : "" }}">
                                <i class="fa-fw fab fa-servicestack c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.service.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('course_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.courses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/courses") || request()->is("admin/courses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-graduation-cap c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.course.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('course_student_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.course-students.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/course-students") || request()->is("admin/course-students/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-graduate c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.courseStudent.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('building_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.buildings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/buildings") || request()->is("admin/buildings/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-building c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.building.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('building_beneficiary_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.building-beneficiaries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/building-beneficiaries") || request()->is("admin/building-beneficiaries/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.buildingBeneficiary.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('beneficiaries_managment_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/beneficiaries*") ? "c-show" : "" }} {{ request()->is("admin/beneficiary-families*") ? "c-show" : "" }} {{ request()->is("admin/beneficiary-files*") ? "c-show" : "" }} {{ request()->is("admin/beneficiary-un-completeds*") ? "c-show" : "" }} {{ request()->is("admin/beneficiary-refuseds*") ? "c-show" : "" }} {{ request()->is("admin/beneficiary-archives*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-user-plus c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.beneficiariesManagment.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('beneficiary_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.beneficiaries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/beneficiaries") || request()->is("admin/beneficiaries/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-check c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.beneficiary.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('beneficiary_family_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.beneficiary-families.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/beneficiary-families") || request()->is("admin/beneficiary-families/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-users-cog c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.beneficiaryFamily.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('beneficiary_file_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.beneficiary-files.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/beneficiary-files") || request()->is("admin/beneficiary-files/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-copy c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.beneficiaryFile.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('beneficiary_un_completed_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.beneficiary-un-completeds.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/beneficiary-un-completeds") || request()->is("admin/beneficiary-un-completeds/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-battery-half c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.beneficiaryUnCompleted.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('beneficiary_refused_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.beneficiary-refuseds.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/beneficiary-refuseds") || request()->is("admin/beneficiary-refuseds/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-times-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.beneficiaryRefused.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('beneficiary_archive_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.beneficiary-archives.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/beneficiary-archives") || request()->is("admin/beneficiary-archives/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-trash c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.beneficiaryArchive.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('beneficiary_orders_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/beneficiary-orders*") ? "c-show" : "" }} {{ request()->is("admin/beneficiary-order-followups*") ? "c-show" : "" }} {{ request()->is("admin/beneficiary-orders-dones*") ? "c-show" : "" }} {{ request()->is("admin/beneficiary-orders-rejecteds*") ? "c-show" : "" }} {{ request()->is("admin/beneficiary-orders-archives*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cubes c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.beneficiaryOrdersManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('beneficiary_order_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.beneficiary-orders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/beneficiary-orders") || request()->is("admin/beneficiary-orders/*") ? "c-active" : "" }}">
                                <i class="fa-fw fab fa-first-order c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.beneficiaryOrder.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('beneficiary_order_followup_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.beneficiary-order-followups.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/beneficiary-order-followups") || request()->is("admin/beneficiary-order-followups/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-comments c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.beneficiaryOrderFollowup.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('beneficiary_orders_done_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.beneficiary-orders-dones.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/beneficiary-orders-dones") || request()->is("admin/beneficiary-orders-dones/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-check c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.beneficiaryOrdersDone.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('beneficiary_orders_rejected_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.beneficiary-orders-rejecteds.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/beneficiary-orders-rejecteds") || request()->is("admin/beneficiary-orders-rejecteds/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-times-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.beneficiaryOrdersRejected.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('beneficiary_orders_archive_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.beneficiary-orders-archives.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/beneficiary-orders-archives") || request()->is("admin/beneficiary-orders-archives/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-trash c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.beneficiaryOrdersArchive.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('task_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/task-boards*") ? "c-show" : "" }} {{ request()->is("admin/tasks*") ? "c-show" : "" }} {{ request()->is("admin/task-statuses*") ? "c-show" : "" }} {{ request()->is("admin/task-tags*") ? "c-show" : "" }} {{ request()->is("admin/task-priorities*") ? "c-show" : "" }} {{ request()->is("admin/tasks-calendars*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-list c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.taskManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('task_board_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.task-boards.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/task-boards") || request()->is("admin/task-boards/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-table c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.taskBoard.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('task_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.tasks.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tasks") || request()->is("admin/tasks/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.task.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('task_status_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.task-statuses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/task-statuses") || request()->is("admin/task-statuses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-server c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.taskStatus.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('task_tag_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.task-tags.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/task-tags") || request()->is("admin/task-tags/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-server c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.taskTag.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('task_priority_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.task-priorities.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/task-priorities") || request()->is("admin/task-priorities/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-sort-numeric-up c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.taskPriority.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('tasks_calendar_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.tasks-calendars.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tasks-calendars") || request()->is("admin/tasks-calendars/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-calendar c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.tasksCalendar.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_alert_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userAlert.title') }}
                </a>
            </li>
        @endcan
        @can('letters_managment_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/letters-organizations*") ? "c-show" : "" }} {{ request()->is("admin/incoming-letters*") ? "c-show" : "" }} {{ request()->is("admin/outgoing-letters*") ? "c-show" : "" }} {{ request()->is("admin/letter-archives*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw far fa-envelope-open c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.lettersManagment.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('letters_organization_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.letters-organizations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/letters-organizations") || request()->is("admin/letters-organizations/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-align-center c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.lettersOrganization.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('incoming_letter_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.incoming-letters.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/incoming-letters") || request()->is("admin/incoming-letters/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-envelope c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.incomingLetter.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('outgoing_letter_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.outgoing-letters.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/outgoing-letters") || request()->is("admin/outgoing-letters/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-envelope c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.outgoingLetter.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('letter_archive_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.letter-archives.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/letter-archives") || request()->is("admin/letter-archives/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-trash c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.letterArchive.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('report_managment_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/beneficiary-reports*") ? "c-show" : "" }} {{ request()->is("admin/beneficiary-orders-reports*") ? "c-show" : "" }} {{ request()->is("admin/task-reports*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-file-signature c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.reportManagment.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('beneficiary_report_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.beneficiary-reports.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/beneficiary-reports") || request()->is("admin/beneficiary-reports/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.beneficiaryReport.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('beneficiary_orders_report_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.beneficiary-orders-reports.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/beneficiary-orders-reports") || request()->is("admin/beneficiary-orders-reports/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-boxes c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.beneficiaryOrdersReport.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('task_report_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.task-reports.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/task-reports") || request()->is("admin/task-reports/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-tasks c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.taskReport.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('archive_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/archives*") ? "c-show" : "" }} {{ request()->is("admin/storage-locations*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw far fa-hdd c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.archiveManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('archive_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.archives.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/archives") || request()->is("admin/archives/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-archive c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.archive.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('storage_location_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.storage-locations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/storage-locations") || request()->is("admin/storage-locations/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-hdd c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.storageLocation.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('frontend_setting_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/sliders*") ? "c-show" : "" }} {{ request()->is("admin/front-projects*") ? "c-show" : "" }} {{ request()->is("admin/front-achievements*") ? "c-show" : "" }} {{ request()->is("admin/front-partners*") ? "c-show" : "" }} {{ request()->is("admin/front-reviews*") ? "c-show" : "" }} {{ request()->is("admin/front-links*") ? "c-show" : "" }} {{ request()->is("admin/subscriptions*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-palette c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.frontendSetting.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('slider_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sliders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sliders") || request()->is("admin/sliders/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-image c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.slider.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('front_project_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.front-projects.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/front-projects") || request()->is("admin/front-projects/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-hotel c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.frontProject.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('front_achievement_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.front-achievements.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/front-achievements") || request()->is("admin/front-achievements/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-medal c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.frontAchievement.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('front_partner_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.front-partners.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/front-partners") || request()->is("admin/front-partners/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-handshake c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.frontPartner.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('front_review_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.front-reviews.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/front-reviews") || request()->is("admin/front-reviews/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-star-half-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.frontReview.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('front_link_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.front-links.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/front-links") || request()->is("admin/front-links/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-external-link-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.frontLink.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('subscription_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.subscriptions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/subscriptions") || request()->is("admin/subscriptions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-envelope c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.subscription.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('faq_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/faq-categories*") ? "c-show" : "" }} {{ request()->is("admin/faq-questions*") ? "c-show" : "" }} {{ request()->is("admin/user-queries*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-question c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.faqManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('faq_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.faq-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/faq-categories") || request()->is("admin/faq-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.faqCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('faq_question_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.faq-questions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/faq-questions") || request()->is("admin/faq-questions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-question c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.faqQuestion.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_query_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.user-queries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-queries") || request()->is("admin/user-queries/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-question-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.userQuery.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('country_managment_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/regions*") ? "c-show" : "" }} {{ request()->is("admin/cities*") ? "c-show" : "" }} {{ request()->is("admin/districts*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-globe-africa c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.countryManagment.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('region_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.regions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/regions") || request()->is("admin/regions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-map-marked-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.region.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('city_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.cities.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/cities") || request()->is("admin/cities/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-map-marker-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.city.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('district_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.districts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/districts") || request()->is("admin/districts/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-flag c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.district.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('general_setting_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/nationalities*") ? "c-show" : "" }} {{ request()->is("admin/marital-statuses*") ? "c-show" : "" }} {{ request()->is("admin/family-relationships*") ? "c-show" : "" }} {{ request()->is("admin/service-statuses*") ? "c-show" : "" }} {{ request()->is("admin/health-conditions*") ? "c-show" : "" }} {{ request()->is("admin/educational-qualifications*") ? "c-show" : "" }} {{ request()->is("admin/job-types*") ? "c-show" : "" }} {{ request()->is("admin/required-documents*") ? "c-show" : "" }} {{ request()->is("admin/disability-types*") ? "c-show" : "" }} {{ request()->is("admin/economic-statuses*") ? "c-show" : "" }} {{ request()->is("admin/settings*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cog c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.generalSetting.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('nationality_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.nationalities.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/nationalities") || request()->is("admin/nationalities/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-male c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.nationality.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('marital_status_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.marital-statuses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/marital-statuses") || request()->is("admin/marital-statuses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-friends c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.maritalStatus.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('family_relationship_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.family-relationships.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/family-relationships") || request()->is("admin/family-relationships/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.familyRelationship.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('service_status_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.service-statuses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/service-statuses") || request()->is("admin/service-statuses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-battery-three-quarters c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.serviceStatus.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('health_condition_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.health-conditions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/health-conditions") || request()->is("admin/health-conditions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase-medical c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.healthCondition.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('educational_qualification_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.educational-qualifications.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/educational-qualifications") || request()->is("admin/educational-qualifications/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-graduate c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.educationalQualification.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('job_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.job-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/job-types") || request()->is("admin/job-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-shopping-bag c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.jobType.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('required_document_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.required-documents.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/required-documents") || request()->is("admin/required-documents/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-signature c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.requiredDocument.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('disability_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.disability-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/disability-types") || request()->is("admin/disability-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw fab fa-accessible-icon c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.disabilityType.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('economic_status_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.economic-statuses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/economic-statuses") || request()->is("admin/economic-statuses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-money-bill-wave-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.economicStatus.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('setting_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.settings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/settings") || request()->is("admin/settings/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cog c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.setting.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>