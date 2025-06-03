<aside class="app-sidebar sticky" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="{{ url('index') }}" class="header-logo">
            <img src="{{ global_asset('assets/logo-white.png') }}" alt="logo" class="desktop-logo">
            <img src="{{ global_asset('assets/logo-dark.png') }}" alt="logo" class="toggle-dark">
            <img src="{{ global_asset('assets/logo-dark.png') }}" alt="logo" class="desktop-dark">
            <img src="{{ global_asset('assets/logo-white.png') }}" alt="logo" class="toggle-logo">
            <img src="{{ global_asset('assets/logo-white.png') }}" alt="logo" class="toggle-white">
            <img src="{{ global_asset('assets/logo-white.png') }}" alt="logo" class="desktop-white">
        </a>
    </div>
    <!-- End::main-sidebar-header -->

    <!-- Start::main-sidebar -->
    <div class="main-sidebar" id="sidebar-scroll">

        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
            </div>
            <ul class="main-menu">
                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">{{ trans('global.main') }}</span></li>
                <!-- End::slide__category -->

                <!-- Start::slide -->
                <li class="slide">
                    <a href="{{ route('admin.home') }}" class="side-menu__item">
                        <i class="bi bi-house-door"></i>
                        <span class="side-menu__label">{{ trans('global.dashboard') }}</span>
                    </a>
                </li>
                <!-- End::slide -->

                @can('user_management_access')
                    <li class="slide has-sub">
                        <a href="javascript:void(0);" class="side-menu__item">
                            <i class="ri-arrow-right-s-line side-menu__angle"></i>
                            <i class="bi bi-people"></i>
                            <span class="side-menu__label">{{ trans('cruds.userManagement.title') }}</span>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">{{ trans('cruds.userManagement.title') }}</a>
                            </li>
                            @can('department_access')
                                <li class="slide">
                                    <a href="{{ route('admin.departments.index') }}"
                                        class="side-menu__item">{{ trans('cruds.department.title') }}</a>
                                </li>
                            @endcan
                            @can('section_access')
                                <li class="slide">
                                    <a href="{{ route('admin.sections.index') }}"
                                        class="side-menu__item">{{ trans('cruds.section.title') }}</a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="slide">
                                    <a href="{{ route('admin.roles.index') }}"
                                        class="side-menu__item">{{ trans('cruds.role.title') }}</a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="slide">
                                    <a href="{{ route('admin.users.index') }}"
                                        class="side-menu__item">{{ trans('cruds.user.title') }}</a>
                                </li>
                            @endcan
                        </ul>
                    </li>

                @endcan

                @can('task_management_access')
                    <li class="slide has-sub">
                        <a href="javascript:void(0);" class="side-menu__item">
                            <i class="ri-arrow-right-s-line side-menu__angle"></i>
                            <i class="bi bi-list-task"></i>
                            <span class="side-menu__label">{{ trans('cruds.taskManagement.title') }}</span>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">{{ trans('cruds.taskManagement.title') }}</a>
                            </li>
                            @can('task_board_access')
                                <li class="slide">
                                    <a href="{{ route('admin.task-boards.index') }}" class="side-menu__item">
                                        {{ trans('cruds.taskBoard.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('task_access')
                                <li class="slide">
                                    <a href="{{ route('admin.tasks.index') }}" class="side-menu__item">
                                        {{ trans('cruds.task.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('task_status_access')
                                <li class="slide">
                                    <a href="{{ route('admin.task-statuses.index') }}" class="side-menu__item">
                                        {{ trans('cruds.taskStatus.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('task_tag_access')
                                <li class="slide">
                                    <a href="{{ route('admin.task-tags.index') }}" class="side-menu__item">
                                        {{ trans('cruds.taskTag.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('task_priority_access')
                                <li class="slide">
                                    <a href="{{ route('admin.task-priorities.index') }}" class="side-menu__item">
                                        {{ trans('cruds.taskPriority.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('tasks_calendar_access')
                                <li class="slide">
                                    <a href="{{ route('admin.tasks-calendars.index') }}" class="side-menu__item">
                                        {{ trans('cruds.tasksCalendar.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('letters_managment_access')
                    <li class="slide has-sub">
                        <a href="javascript:void(0);" class="side-menu__item">
                            <i class="ri-arrow-right-s-line side-menu__angle"></i>
                            <i class="bi bi-chat-left-text"></i>
                            <span class="side-menu__label">{{ trans('cruds.lettersManagment.title') }}</span>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">{{ trans('cruds.lettersManagment.title') }}</a>
                            </li>
                            @can('letters_organization_access')
                                <li class="slide">
                                    <a href="{{ route('admin.letters-organizations.index') }}" class="side-menu__item">
                                        {{ trans('cruds.lettersOrganization.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('incoming_letter_access')
                                <li class="slide">
                                    <a href="{{ route('admin.incoming-letters.index') }}" class="side-menu__item">
                                        {{ trans('cruds.incomingLetter.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('outgoing_letter_access')
                                <li class="slide">
                                    <a href="{{ route('admin.outgoing-letters.index') }}" class="side-menu__item">
                                        {{ trans('cruds.outgoingLetter.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('letter_archive_access')
                                <li class="slide">
                                    <a href="{{ route('admin.letter-archives.index') }}" class="side-menu__item">
                                        {{ trans('cruds.letterArchive.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                
                @can('user_alert_access')
                    <!-- Start::slide -->
                        <li class="slide">
                            <a href="{{ route('admin.user-alerts.index') }}" class="side-menu__item">
                                <i class="bi bi-bell"></i>
                                <span class="side-menu__label">{{ trans('cruds.userAlert.title') }}</span>
                            </a>
                        </li>
                    <!-- End::slide -->
                @endcan

                <!-- Start::slide__category -->
                <li class="slide__category"><span
                        class="category-name">{{ trans('cruds.beneficiariesManagment.title') }}</span></li>
                <!-- End::slide__category -->

                @can('beneficiaries_managment_access')
                    <li class="slide has-sub">
                        <a href="javascript:void(0);" class="side-menu__item">
                            <i class="ri-arrow-right-s-line side-menu__angle"></i>
                            <i class="bi bi-person-hearts"></i>
                            <span class="side-menu__label">{{ trans('cruds.beneficiariesManagment.title') }}</span>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">{{ trans('cruds.beneficiariesManagment.title') }}</a>
                            </li>
                            @can('beneficiary_access')
                                <li class="slide">
                                    <a href="{{ route('admin.beneficiaries.index') }}" class="side-menu__item">
                                        {{ trans('cruds.beneficiary.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('beneficiary_un_completed_access')
                                <li class="slide">
                                    <a href="{{ route('admin.beneficiary-un-completeds.index') }}" class="side-menu__item">
                                        {{ trans('cruds.beneficiaryUnCompleted.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('beneficiary_refused_access')
                                <li class="slide">
                                    <a href="{{ route('admin.beneficiary-refuseds.index') }}" class="side-menu__item">
                                        {{ trans('cruds.beneficiaryRefused.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('beneficiary_archive_access')
                                <li class="slide">
                                    <a href="{{ route('admin.beneficiary-archives.index') }}" class="side-menu__item">
                                        {{ trans('cruds.beneficiaryArchive.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>

                @endcan

                @can('beneficiary_orders_management_access')
                    <li class="slide has-sub">
                        <a href="javascript:void(0);" class="side-menu__item">
                            <i class="ri-arrow-right-s-line side-menu__angle"></i>
                            <i class="bi bi-file-earmark-text"></i>
                            <span class="side-menu__label">{{ trans('cruds.beneficiaryOrder.title') }}</span>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">{{ trans('cruds.beneficiaryOrder.title') }}</a>
                            </li>
                            @can('beneficiary_order_access')
                                <li class="slide">
                                    <a href="{{ route('admin.beneficiary-orders.index') }}" class="side-menu__item">
                                        {{ trans('cruds.beneficiaryOrder.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('beneficiary_orders_done_access')
                                <li class="slide">
                                    <a href="{{ route('admin.beneficiary-orders-dones.index') }}" class="side-menu__item">
                                        {{ trans('cruds.beneficiaryOrdersDone.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('beneficiary_orders_rejected_access')
                                <li class="slide">
                                    <a href="{{ route('admin.beneficiary-orders-rejecteds.index') }}"
                                        class="side-menu__item">
                                        {{ trans('cruds.beneficiaryOrdersRejected.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('beneficiary_orders_archive_access')
                                <li class="slide">
                                    <a href="{{ route('admin.beneficiary-orders-archives.index') }}" class="side-menu__item">
                                        {{ trans('cruds.beneficiaryOrdersArchive.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>

                @endcan


                @can('services_managment_access')
                    <li class="slide has-sub">
                        <a href="javascript:void(0);" class="side-menu__item">
                            <i class="ri-arrow-right-s-line side-menu__angle"></i>
                            <i class="bi bi-hdd-stack"></i>
                            <span class="side-menu__label">{{ trans('cruds.servicesManagment.title') }}</span>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">{{ trans('cruds.servicesManagment.title') }}</a>
                            </li>
                            @can('service_access')
                                <li class="slide">
                                    <a href="{{ route('admin.services.index') }}"
                                        class="side-menu__item">{{ trans('cruds.service.title') }}</a>
                                </li>
                            @endcan
                            @can('course_access')
                                <li class="slide">
                                    <a href="{{ route('admin.courses.index') }}"
                                        class="side-menu__item">{{ trans('cruds.course.title') }}</a>
                                </li>
                            @endcan
                            @can('building_access')
                                <li class="slide">
                                    <a href="{{ route('admin.buildings.index') }}"
                                        class="side-menu__item">{{ trans('cruds.building.title') }}</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan


                @can('report_managment_access')
                    <!-- Start::slide__category -->
                    <li class="slide__category"><span
                            class="category-name">{{ trans('cruds.reportManagment.title') }}</span></li>
                    <!-- End::slide__category -->

                    <li class="slide has-sub">
                        <a href="javascript:void(0);" class="side-menu__item">
                            <i class="ri-arrow-right-s-line side-menu__angle"></i>
                            <i class="bi bi-clipboard2-data"></i>
                            <span class="side-menu__label">{{ trans('cruds.reportManagment.title') }}</span>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">{{ trans('cruds.reportManagment.title') }}</a>
                            </li>
                            @can('beneficiary_report_access')
                                <li class="slide">
                                    <a href="{{ route('admin.beneficiary-reports.index') }}" class="side-menu__item">
                                        {{ trans('cruds.beneficiaryReport.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('beneficiary_orders_report_access')
                                <li class="slide">
                                    <a href="{{ route('admin.beneficiary-orders-reports.index') }}" class="side-menu__item">
                                        {{ trans('cruds.beneficiaryOrdersReport.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('task_report_access')
                                <li class="slide">
                                    <a href="{{ route('admin.task-reports.index') }}" class="side-menu__item">
                                        {{ trans('cruds.taskReport.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('archive_management_access')
                    @can('archive_access')
                        <!-- Start::slide -->
                        <li class="slide">
                            <a href="{{ route('admin.archives.index') }}" class="side-menu__item">
                                <i class="bi bi-archive"></i>
                                <span class="side-menu__label">{{ trans('cruds.archive.title') }}</span>
                            </a>
                        </li>
                        <!-- End::slide -->
                    @endcan
                    @can('storage_location_access')
                        <!-- Start::slide -->
                        <li class="slide">
                            <a href="{{ route('admin.storage-locations.index') }}" class="side-menu__item">
                                <i class="bi bi-hdd"></i>
                                <span class="side-menu__label">{{ trans('cruds.storageLocation.title') }}</span>
                            </a>
                        </li>
                    @endcan
                    <!-- End::slide -->
                @endcan

                <!-- Start::slide__category -->
                <li class="slide__category"><span
                        class="category-name">{{ trans('cruds.generalSetting.title') }}</span></li>
                <!-- End::slide__category -->

                @can('frontend_setting_access')
                    <li class="slide has-sub">
                        <a href="javascript:void(0);" class="side-menu__item">
                            <i class="ri-arrow-right-s-line side-menu__angle"></i>
                            <i class="bi bi-easel"></i>
                            <span class="side-menu__label">{{ trans('cruds.frontendSetting.title') }}</span>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">{{ trans('cruds.frontendSetting.title') }}</a>
                            </li>
                            @can('slider_access')
                                <li class="slide">
                                    <a href="{{ route('admin.sliders.index') }}" class="side-menu__item">
                                        {{ trans('cruds.slider.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('front_project_access')
                                <li class="slide">
                                    <a href="{{ route('admin.front-projects.index') }}" class="side-menu__item">
                                        {{ trans('cruds.frontProject.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('front_achievement_access')
                                <li class="slide">
                                    <a href="{{ route('admin.front-achievements.index') }}" class="side-menu__item">
                                        {{ trans('cruds.frontAchievement.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('front_partner_access')
                                <li class="slide">
                                    <a href="{{ route('admin.front-partners.index') }}" class="side-menu__item">
                                        {{ trans('cruds.frontPartner.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('front_review_access')
                                <li class="slide">
                                    <a href="{{ route('admin.front-reviews.index') }}" class="side-menu__item">
                                        {{ trans('cruds.frontReview.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('front_link_access')
                                <li class="slide">
                                    <a href="{{ route('admin.front-links.index') }}" class="side-menu__item">
                                        {{ trans('cruds.frontLink.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('subscription_access')
                                <li class="slide">
                                    <a href="{{ route('admin.subscriptions.index') }}" class="side-menu__item">
                                        {{ trans('cruds.subscription.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('faq_management_access')
                    <li class="slide has-sub">
                        <a href="javascript:void(0);" class="side-menu__item">
                            <i class="ri-arrow-right-s-line side-menu__angle"></i>
                            <i class="bi bi-question-circle"></i>
                            <span class="side-menu__label">{{ trans('cruds.faqManagement.title') }}</span>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">{{ trans('cruds.faqManagement.title') }}</a>
                            </li>
                            @can('faq_category_access')
                                <li class="slide">
                                    <a href="{{ route('admin.faq-categories.index') }}" class="side-menu__item">
                                        {{ trans('cruds.faqCategory.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('faq_question_access')
                                <li class="slide">
                                    <a href="{{ route('admin.faq-questions.index') }}" class="side-menu__item">
                                        {{ trans('cruds.faqQuestion.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('user_query_access')
                                <li class="slide">
                                    <a href="{{ route('admin.user-queries.index') }}" class="side-menu__item">
                                        {{ trans('cruds.userQuery.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('country_managment_access')
                    <li class="slide has-sub">
                        <a href="javascript:void(0);" class="side-menu__item">
                            <i class="ri-arrow-right-s-line side-menu__angle"></i>
                            <i class="bi bi-globe-americas"></i>
                            <span class="side-menu__label">{{ trans('cruds.countryManagment.title') }}</span>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">{{ trans('cruds.countryManagment.title') }}</a>
                            </li>
                            @can('region_access')
                                <li class="slide">
                                    <a href="{{ route('admin.regions.index') }}" class="side-menu__item">
                                        {{ trans('cruds.region.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('city_access')
                                <li class="slide">
                                    <a href="{{ route('admin.cities.index') }}" class="side-menu__item">
                                        {{ trans('cruds.city.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('district_access')
                                <li class="slide">
                                    <a href="{{ route('admin.districts.index') }}" class="side-menu__item">
                                        {{ trans('cruds.district.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('general_setting_access')
                    <li class="slide has-sub">
                        <a href="javascript:void(0);" class="side-menu__item">
                            <i class="ri-arrow-right-s-line side-menu__angle"></i>
                            <i class="bi bi-gear"></i>
                            <span class="side-menu__label">{{ trans('cruds.generalSetting.title') }}</span>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">{{ trans('cruds.generalSetting.title') }}</a>
                            </li>
                            @can('nationality_access')
                                <li class="slide">
                                    <a href="{{ route('admin.nationalities.index') }}" class="side-menu__item">
                                        {{ trans('cruds.nationality.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('marital_status_access')
                                <li class="slide">
                                    <a href="{{ route('admin.marital-statuses.index') }}" class="side-menu__item">
                                        {{ trans('cruds.maritalStatus.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('family_relationship_access')
                                <li class="slide">
                                    <a href="{{ route('admin.family-relationships.index') }}" class="side-menu__item">
                                        {{ trans('cruds.familyRelationship.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('service_status_access')
                                <li class="slide">
                                    <a href="{{ route('admin.service-statuses.index') }}" class="side-menu__item">
                                        {{ trans('cruds.serviceStatus.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('health_condition_access')
                                <li class="slide">
                                    <a href="{{ route('admin.health-conditions.index') }}" class="side-menu__item">
                                        {{ trans('cruds.healthCondition.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('educational_qualification_access')
                                <li class="slide">
                                    <a href="{{ route('admin.educational-qualifications.index') }}" class="side-menu__item">
                                        {{ trans('cruds.educationalQualification.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('job_type_access')
                                <li class="slide">
                                    <a href="{{ route('admin.job-types.index') }}" class="side-menu__item">
                                        {{ trans('cruds.jobType.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('required_document_access')
                                <li class="slide">
                                    <a href="{{ route('admin.required-documents.index') }}" class="side-menu__item">
                                        {{ trans('cruds.requiredDocument.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('disability_type_access')
                                <li class="slide">
                                    <a href="{{ route('admin.disability-types.index') }}" class="side-menu__item">
                                        {{ trans('cruds.disabilityType.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('economic_status_access')
                                <li class="slide">
                                    <a href="{{ route('admin.economic-statuses.index') }}" class="side-menu__item">
                                        {{ trans('cruds.economicStatus.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('setting_access')
                                <li class="slide">
                                    <a href="{{ route('admin.settings.index') }}" class="side-menu__item">
                                        {{ trans('cruds.setting.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg></div>
        </nav>
        <!-- End::nav -->

    </div>
    <!-- End::main-sidebar -->

</aside>
