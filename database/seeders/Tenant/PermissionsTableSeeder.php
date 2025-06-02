<?php

namespace Database\Seeders\Tenant;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $i = 1;
        $permissions = [
            [
                'id'    => $i++,
                'title' => 'user_management_access',
            ], 
            [
                'id'    => $i++,
                'title' => 'role_create',
            ],
            [
                'id'    => $i++,
                'title' => 'role_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'role_show',
            ],
            [
                'id'    => $i++,
                'title' => 'role_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'role_access',
            ],
            [
                'id'    => $i++,
                'title' => 'user_create',
            ],
            [
                'id'    => $i++,
                'title' => 'user_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'user_show',
            ],
            [
                'id'    => $i++,
                'title' => 'user_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'user_access',
            ],
            [
                'id'    => $i++,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => $i++,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => $i++,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => $i++,
                'title' => 'general_setting_access',
            ],
            [
                'id'    => $i++,
                'title' => 'country_managment_access',
            ],
            [
                'id'    => $i++,
                'title' => 'region_create',
            ],
            [
                'id'    => $i++,
                'title' => 'region_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'region_show',
            ],
            [
                'id'    => $i++,
                'title' => 'region_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'region_access',
            ],
            [
                'id'    => $i++,
                'title' => 'city_create',
            ],
            [
                'id'    => $i++,
                'title' => 'city_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'city_show',
            ],
            [
                'id'    => $i++,
                'title' => 'city_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'city_access',
            ],
            [
                'id'    => $i++,
                'title' => 'district_create',
            ],
            [
                'id'    => $i++,
                'title' => 'district_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'district_show',
            ],
            [
                'id'    => $i++,
                'title' => 'district_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'district_access',
            ],
            [
                'id'    => $i++,
                'title' => 'nationality_create',
            ],
            [
                'id'    => $i++,
                'title' => 'nationality_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'nationality_show',
            ],
            [
                'id'    => $i++,
                'title' => 'nationality_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'nationality_access',
            ],
            [
                'id'    => $i++,
                'title' => 'marital_status_create',
            ],
            [
                'id'    => $i++,
                'title' => 'marital_status_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'marital_status_show',
            ],
            [
                'id'    => $i++,
                'title' => 'marital_status_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'marital_status_access',
            ],
            [
                'id'    => $i++,
                'title' => 'family_relationship_create',
            ],
            [
                'id'    => $i++,
                'title' => 'family_relationship_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'family_relationship_show',
            ],
            [
                'id'    => $i++,
                'title' => 'family_relationship_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'family_relationship_access',
            ],
            [
                'id'    => $i++,
                'title' => 'health_condition_create',
            ],
            [
                'id'    => $i++,
                'title' => 'health_condition_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'health_condition_show',
            ],
            [
                'id'    => $i++,
                'title' => 'health_condition_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'health_condition_access',
            ],
            [
                'id'    => $i++,
                'title' => 'educational_qualification_create',
            ],
            [
                'id'    => $i++,
                'title' => 'educational_qualification_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'educational_qualification_show',
            ],
            [
                'id'    => $i++,
                'title' => 'educational_qualification_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'educational_qualification_access',
            ],
            [
                'id'    => $i++,
                'title' => 'job_type_create',
            ],
            [
                'id'    => $i++,
                'title' => 'job_type_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'job_type_show',
            ],
            [
                'id'    => $i++,
                'title' => 'job_type_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'job_type_access',
            ],
            [
                'id'    => $i++,
                'title' => 'required_document_create',
            ],
            [
                'id'    => $i++,
                'title' => 'required_document_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'required_document_show',
            ],
            [
                'id'    => $i++,
                'title' => 'required_document_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'required_document_access',
            ],
            [
                'id'    => $i++,
                'title' => 'department_create',
            ],
            [
                'id'    => $i++,
                'title' => 'department_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'department_show',
            ],
            [
                'id'    => $i++,
                'title' => 'department_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'department_access',
            ],
            [
                'id'    => $i++,
                'title' => 'section_create',
            ],
            [
                'id'    => $i++,
                'title' => 'section_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'section_show',
            ],
            [
                'id'    => $i++,
                'title' => 'section_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'section_access',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiaries_managment_access',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_create',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_show',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_access',
            ],
            [
                'id'    => $i++,
                'title' => 'disability_type_create',
            ],
            [
                'id'    => $i++,
                'title' => 'disability_type_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'disability_type_show',
            ],
            [
                'id'    => $i++,
                'title' => 'disability_type_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'disability_type_access',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_family_create',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_family_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_family_show',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_family_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_family_access',
            ],
            [
                'id'    => $i++,
                'title' => 'economic_status_create',
            ],
            [
                'id'    => $i++,
                'title' => 'economic_status_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'economic_status_show',
            ],
            [
                'id'    => $i++,
                'title' => 'economic_status_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'economic_status_access',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_file_create',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_file_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_file_show',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_file_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_file_access',
            ],
            [
                'id'    => $i++,
                'title' => 'task_management_access',
            ],
            [
                'id'    => $i++,
                'title' => 'task_status_create',
            ],
            [
                'id'    => $i++,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'task_status_show',
            ],
            [
                'id'    => $i++,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'task_status_access',
            ],
            [
                'id'    => $i++,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => $i++,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => $i++,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => $i++,
                'title' => 'task_create',
            ],
            [
                'id'    => $i++,
                'title' => 'task_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'task_show',
            ],
            [
                'id'    => $i++,
                'title' => 'task_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'task_access',
            ],
            [
                'id'    => $i++,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => $i++,
                'title' => 'task_board_create',
            ],
            [
                'id'    => $i++,
                'title' => 'task_board_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'task_board_show',
            ],
            [
                'id'    => $i++,
                'title' => 'task_board_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'task_board_access',
            ],
            [
                'id'    => $i++,
                'title' => 'task_priority_create',
            ],
            [
                'id'    => $i++,
                'title' => 'task_priority_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'task_priority_show',
            ],
            [
                'id'    => $i++,
                'title' => 'task_priority_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'task_priority_access',
            ],
            [
                'id'    => $i++,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => $i++,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => $i++,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => $i++,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => $i++,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => $i++,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => $i++,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => $i++,
                'title' => 'user_query_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'user_query_access',
            ],
            [
                'id'    => $i++,
                'title' => 'frontend_setting_access',
            ],
            [
                'id'    => $i++,
                'title' => 'slider_create',
            ],
            [
                'id'    => $i++,
                'title' => 'slider_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'slider_show',
            ],
            [
                'id'    => $i++,
                'title' => 'slider_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'slider_access',
            ],
            [
                'id'    => $i++,
                'title' => 'front_achievement_create',
            ],
            [
                'id'    => $i++,
                'title' => 'front_achievement_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'front_achievement_show',
            ],
            [
                'id'    => $i++,
                'title' => 'front_achievement_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'front_achievement_access',
            ],
            [
                'id'    => $i++,
                'title' => 'front_project_create',
            ],
            [
                'id'    => $i++,
                'title' => 'front_project_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'front_project_show',
            ],
            [
                'id'    => $i++,
                'title' => 'front_project_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'front_project_access',
            ],
            [
                'id'    => $i++,
                'title' => 'front_partner_create',
            ],
            [
                'id'    => $i++,
                'title' => 'front_partner_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'front_partner_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'front_partner_access',
            ],
            [
                'id'    => $i++,
                'title' => 'front_review_create',
            ],
            [
                'id'    => $i++,
                'title' => 'front_review_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'front_review_show',
            ],
            [
                'id'    => $i++,
                'title' => 'front_review_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'front_review_access',
            ],
            [
                'id'    => $i++,
                'title' => 'setting_create',
            ],
            [
                'id'    => $i++,
                'title' => 'setting_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'setting_show',
            ],
            [
                'id'    => $i++,
                'title' => 'setting_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'setting_access',
            ],
            [
                'id'    => $i++,
                'title' => 'front_link_create',
            ],
            [
                'id'    => $i++,
                'title' => 'front_link_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'front_link_show',
            ],
            [
                'id'    => $i++,
                'title' => 'front_link_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'front_link_access',
            ],
            [
                'id'    => $i++,
                'title' => 'subscription_create',
            ],
            [
                'id'    => $i++,
                'title' => 'subscription_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'subscription_show',
            ],
            [
                'id'    => $i++,
                'title' => 'subscription_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'subscription_access',
            ],
            [
                'id'    => $i++,
                'title' => 'service_create',
            ],
            [
                'id'    => $i++,
                'title' => 'service_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'service_show',
            ],
            [
                'id'    => $i++,
                'title' => 'service_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'service_access',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_order_create',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_order_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_order_show',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_order_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_order_access',
            ],
            [
                'id'    => $i++,
                'title' => 'service_status_create',
            ],
            [
                'id'    => $i++,
                'title' => 'service_status_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'service_status_show',
            ],
            [
                'id'    => $i++,
                'title' => 'service_status_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'service_status_access',
            ],
            [
                'id'    => $i++,
                'title' => 'letters_managment_access',
            ],
            [
                'id'    => $i++,
                'title' => 'incoming_letter_create',
            ],
            [
                'id'    => $i++,
                'title' => 'incoming_letter_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'incoming_letter_show',
            ],
            [
                'id'    => $i++,
                'title' => 'incoming_letter_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'incoming_letter_access',
            ],
            [
                'id'    => $i++,
                'title' => 'letters_organization_create',
            ],
            [
                'id'    => $i++,
                'title' => 'letters_organization_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'letters_organization_show',
            ],
            [
                'id'    => $i++,
                'title' => 'letters_organization_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'letters_organization_access',
            ],
            [
                'id'    => $i++,
                'title' => 'outgoing_letter_create',
            ],
            [
                'id'    => $i++,
                'title' => 'outgoing_letter_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'outgoing_letter_show',
            ],
            [
                'id'    => $i++,
                'title' => 'outgoing_letter_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'outgoing_letter_access',
            ],
            [
                'id'    => $i++,
                'title' => 'services_managment_access',
            ],
            [
                'id'    => $i++,
                'title' => 'course_create',
            ],
            [
                'id'    => $i++,
                'title' => 'course_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'course_show',
            ],
            [
                'id'    => $i++,
                'title' => 'course_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'course_access',
            ],
            [
                'id'    => $i++,
                'title' => 'course_student_create',
            ],
            [
                'id'    => $i++,
                'title' => 'course_student_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'course_student_show',
            ],
            [
                'id'    => $i++,
                'title' => 'course_student_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'course_student_access',
            ],
            [
                'id'    => $i++,
                'title' => 'building_create',
            ],
            [
                'id'    => $i++,
                'title' => 'building_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'building_show',
            ],
            [
                'id'    => $i++,
                'title' => 'building_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'building_access',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_orders_management_access',
            ],
            [
                'id'    => $i++,
                'title' => 'archive_create',
            ],
            [
                'id'    => $i++,
                'title' => 'archive_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'archive_show',
            ],
            [
                'id'    => $i++,
                'title' => 'archive_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'archive_access',
            ],
            [
                'id'    => $i++,
                'title' => 'letter_archive_create',
            ],
            [
                'id'    => $i++,
                'title' => 'letter_archive_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'letter_archive_show',
            ],
            [
                'id'    => $i++,
                'title' => 'letter_archive_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'letter_archive_access',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_archive_create',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_archive_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_archive_show',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_archive_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_archive_access',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_orders_archive_create',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_orders_archive_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_orders_archive_show',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_orders_archive_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_orders_archive_access',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_un_completed_create',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_un_completed_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_un_completed_show',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_un_completed_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_un_completed_access',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_orders_done_create',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_orders_done_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_orders_done_show',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_orders_done_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_orders_done_access',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_orders_rejected_create',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_orders_rejected_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_orders_rejected_show',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_orders_rejected_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_orders_rejected_access',
            ],
            [
                'id'    => $i++,
                'title' => 'report_managment_access',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_report_create',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_report_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_report_show',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_report_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_report_access',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_orders_report_create',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_orders_report_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_orders_report_show',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_orders_report_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_orders_report_access',
            ],
            [
                'id'    => $i++,
                'title' => 'task_report_create',
            ],
            [
                'id'    => $i++,
                'title' => 'task_report_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'task_report_show',
            ],
            [
                'id'    => $i++,
                'title' => 'task_report_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'task_report_access',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_order_followup_create',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_order_followup_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_order_followup_show',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_order_followup_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_order_followup_access',
            ],
            [
                'id'    => $i++,
                'title' => 'archive_management_access',
            ],
            [
                'id'    => $i++,
                'title' => 'storage_location_create',
            ],
            [
                'id'    => $i++,
                'title' => 'storage_location_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'storage_location_show',
            ],
            [
                'id'    => $i++,
                'title' => 'storage_location_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'storage_location_access',
            ], 
            [
                'id'    => $i++,
                'title' => 'building_beneficiary_create',
            ],
            [
                'id'    => $i++,
                'title' => 'building_beneficiary_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'building_beneficiary_show',
            ],
            [
                'id'    => $i++,
                'title' => 'building_beneficiary_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'building_beneficiary_access',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_refused_create',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_refused_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_refused_show',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_refused_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'beneficiary_refused_access',
            ],
            [
                'id'    => $i++,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
