<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 18,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 21,
                'title' => 'general_setting_access',
            ],
            [
                'id'    => 22,
                'title' => 'country_managment_access',
            ],
            [
                'id'    => 23,
                'title' => 'region_create',
            ],
            [
                'id'    => 24,
                'title' => 'region_edit',
            ],
            [
                'id'    => 25,
                'title' => 'region_show',
            ],
            [
                'id'    => 26,
                'title' => 'region_delete',
            ],
            [
                'id'    => 27,
                'title' => 'region_access',
            ],
            [
                'id'    => 28,
                'title' => 'city_create',
            ],
            [
                'id'    => 29,
                'title' => 'city_edit',
            ],
            [
                'id'    => 30,
                'title' => 'city_show',
            ],
            [
                'id'    => 31,
                'title' => 'city_delete',
            ],
            [
                'id'    => 32,
                'title' => 'city_access',
            ],
            [
                'id'    => 33,
                'title' => 'district_create',
            ],
            [
                'id'    => 34,
                'title' => 'district_edit',
            ],
            [
                'id'    => 35,
                'title' => 'district_show',
            ],
            [
                'id'    => 36,
                'title' => 'district_delete',
            ],
            [
                'id'    => 37,
                'title' => 'district_access',
            ],
            [
                'id'    => 38,
                'title' => 'nationality_create',
            ],
            [
                'id'    => 39,
                'title' => 'nationality_edit',
            ],
            [
                'id'    => 40,
                'title' => 'nationality_show',
            ],
            [
                'id'    => 41,
                'title' => 'nationality_delete',
            ],
            [
                'id'    => 42,
                'title' => 'nationality_access',
            ],
            [
                'id'    => 43,
                'title' => 'marital_status_create',
            ],
            [
                'id'    => 44,
                'title' => 'marital_status_edit',
            ],
            [
                'id'    => 45,
                'title' => 'marital_status_show',
            ],
            [
                'id'    => 46,
                'title' => 'marital_status_delete',
            ],
            [
                'id'    => 47,
                'title' => 'marital_status_access',
            ],
            [
                'id'    => 48,
                'title' => 'family_relationship_create',
            ],
            [
                'id'    => 49,
                'title' => 'family_relationship_edit',
            ],
            [
                'id'    => 50,
                'title' => 'family_relationship_show',
            ],
            [
                'id'    => 51,
                'title' => 'family_relationship_delete',
            ],
            [
                'id'    => 52,
                'title' => 'family_relationship_access',
            ],
            [
                'id'    => 53,
                'title' => 'health_condition_create',
            ],
            [
                'id'    => 54,
                'title' => 'health_condition_edit',
            ],
            [
                'id'    => 55,
                'title' => 'health_condition_show',
            ],
            [
                'id'    => 56,
                'title' => 'health_condition_delete',
            ],
            [
                'id'    => 57,
                'title' => 'health_condition_access',
            ],
            [
                'id'    => 58,
                'title' => 'educational_qualification_create',
            ],
            [
                'id'    => 59,
                'title' => 'educational_qualification_edit',
            ],
            [
                'id'    => 60,
                'title' => 'educational_qualification_show',
            ],
            [
                'id'    => 61,
                'title' => 'educational_qualification_delete',
            ],
            [
                'id'    => 62,
                'title' => 'educational_qualification_access',
            ],
            [
                'id'    => 63,
                'title' => 'job_type_create',
            ],
            [
                'id'    => 64,
                'title' => 'job_type_edit',
            ],
            [
                'id'    => 65,
                'title' => 'job_type_show',
            ],
            [
                'id'    => 66,
                'title' => 'job_type_delete',
            ],
            [
                'id'    => 67,
                'title' => 'job_type_access',
            ],
            [
                'id'    => 68,
                'title' => 'required_document_create',
            ],
            [
                'id'    => 69,
                'title' => 'required_document_edit',
            ],
            [
                'id'    => 70,
                'title' => 'required_document_show',
            ],
            [
                'id'    => 71,
                'title' => 'required_document_delete',
            ],
            [
                'id'    => 72,
                'title' => 'required_document_access',
            ],
            [
                'id'    => 73,
                'title' => 'department_create',
            ],
            [
                'id'    => 74,
                'title' => 'department_edit',
            ],
            [
                'id'    => 75,
                'title' => 'department_show',
            ],
            [
                'id'    => 76,
                'title' => 'department_delete',
            ],
            [
                'id'    => 77,
                'title' => 'department_access',
            ],
            [
                'id'    => 78,
                'title' => 'section_create',
            ],
            [
                'id'    => 79,
                'title' => 'section_edit',
            ],
            [
                'id'    => 80,
                'title' => 'section_show',
            ],
            [
                'id'    => 81,
                'title' => 'section_delete',
            ],
            [
                'id'    => 82,
                'title' => 'section_access',
            ],
            [
                'id'    => 83,
                'title' => 'beneficiaries_managment_access',
            ],
            [
                'id'    => 84,
                'title' => 'beneficiary_create',
            ],
            [
                'id'    => 85,
                'title' => 'beneficiary_edit',
            ],
            [
                'id'    => 86,
                'title' => 'beneficiary_show',
            ],
            [
                'id'    => 87,
                'title' => 'beneficiary_delete',
            ],
            [
                'id'    => 88,
                'title' => 'beneficiary_access',
            ],
            [
                'id'    => 89,
                'title' => 'disability_type_create',
            ],
            [
                'id'    => 90,
                'title' => 'disability_type_edit',
            ],
            [
                'id'    => 91,
                'title' => 'disability_type_show',
            ],
            [
                'id'    => 92,
                'title' => 'disability_type_delete',
            ],
            [
                'id'    => 93,
                'title' => 'disability_type_access',
            ],
            [
                'id'    => 94,
                'title' => 'beneficiary_family_create',
            ],
            [
                'id'    => 95,
                'title' => 'beneficiary_family_edit',
            ],
            [
                'id'    => 96,
                'title' => 'beneficiary_family_show',
            ],
            [
                'id'    => 97,
                'title' => 'beneficiary_family_delete',
            ],
            [
                'id'    => 98,
                'title' => 'beneficiary_family_access',
            ],
            [
                'id'    => 99,
                'title' => 'economic_status_create',
            ],
            [
                'id'    => 100,
                'title' => 'economic_status_edit',
            ],
            [
                'id'    => 101,
                'title' => 'economic_status_show',
            ],
            [
                'id'    => 102,
                'title' => 'economic_status_delete',
            ],
            [
                'id'    => 103,
                'title' => 'economic_status_access',
            ],
            [
                'id'    => 104,
                'title' => 'beneficiary_file_create',
            ],
            [
                'id'    => 105,
                'title' => 'beneficiary_file_edit',
            ],
            [
                'id'    => 106,
                'title' => 'beneficiary_file_show',
            ],
            [
                'id'    => 107,
                'title' => 'beneficiary_file_delete',
            ],
            [
                'id'    => 108,
                'title' => 'beneficiary_file_access',
            ],
            [
                'id'    => 109,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 110,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 111,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 112,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 113,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 114,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 115,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 116,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 117,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 118,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 119,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 120,
                'title' => 'task_create',
            ],
            [
                'id'    => 121,
                'title' => 'task_edit',
            ],
            [
                'id'    => 122,
                'title' => 'task_show',
            ],
            [
                'id'    => 123,
                'title' => 'task_delete',
            ],
            [
                'id'    => 124,
                'title' => 'task_access',
            ],
            [
                'id'    => 125,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => 126,
                'title' => 'task_board_create',
            ],
            [
                'id'    => 127,
                'title' => 'task_board_edit',
            ],
            [
                'id'    => 128,
                'title' => 'task_board_show',
            ],
            [
                'id'    => 129,
                'title' => 'task_board_delete',
            ],
            [
                'id'    => 130,
                'title' => 'task_board_access',
            ],
            [
                'id'    => 131,
                'title' => 'task_priority_create',
            ],
            [
                'id'    => 132,
                'title' => 'task_priority_edit',
            ],
            [
                'id'    => 133,
                'title' => 'task_priority_show',
            ],
            [
                'id'    => 134,
                'title' => 'task_priority_delete',
            ],
            [
                'id'    => 135,
                'title' => 'task_priority_access',
            ],
            [
                'id'    => 136,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 137,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 138,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 139,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 140,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 141,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 142,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 143,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 144,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 145,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 146,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 147,
                'title' => 'user_query_edit',
            ],
            [
                'id'    => 148,
                'title' => 'user_query_access',
            ],
            [
                'id'    => 149,
                'title' => 'frontend_setting_access',
            ],
            [
                'id'    => 150,
                'title' => 'slider_create',
            ],
            [
                'id'    => 151,
                'title' => 'slider_edit',
            ],
            [
                'id'    => 152,
                'title' => 'slider_show',
            ],
            [
                'id'    => 153,
                'title' => 'slider_delete',
            ],
            [
                'id'    => 154,
                'title' => 'slider_access',
            ],
            [
                'id'    => 155,
                'title' => 'front_achievement_create',
            ],
            [
                'id'    => 156,
                'title' => 'front_achievement_edit',
            ],
            [
                'id'    => 157,
                'title' => 'front_achievement_show',
            ],
            [
                'id'    => 158,
                'title' => 'front_achievement_delete',
            ],
            [
                'id'    => 159,
                'title' => 'front_achievement_access',
            ],
            [
                'id'    => 160,
                'title' => 'front_project_create',
            ],
            [
                'id'    => 161,
                'title' => 'front_project_edit',
            ],
            [
                'id'    => 162,
                'title' => 'front_project_show',
            ],
            [
                'id'    => 163,
                'title' => 'front_project_delete',
            ],
            [
                'id'    => 164,
                'title' => 'front_project_access',
            ],
            [
                'id'    => 165,
                'title' => 'front_partner_create',
            ],
            [
                'id'    => 166,
                'title' => 'front_partner_edit',
            ],
            [
                'id'    => 167,
                'title' => 'front_partner_delete',
            ],
            [
                'id'    => 168,
                'title' => 'front_partner_access',
            ],
            [
                'id'    => 169,
                'title' => 'front_review_create',
            ],
            [
                'id'    => 170,
                'title' => 'front_review_edit',
            ],
            [
                'id'    => 171,
                'title' => 'front_review_show',
            ],
            [
                'id'    => 172,
                'title' => 'front_review_delete',
            ],
            [
                'id'    => 173,
                'title' => 'front_review_access',
            ],
            [
                'id'    => 174,
                'title' => 'setting_create',
            ],
            [
                'id'    => 175,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 176,
                'title' => 'setting_show',
            ],
            [
                'id'    => 177,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 178,
                'title' => 'setting_access',
            ],
            [
                'id'    => 179,
                'title' => 'front_link_create',
            ],
            [
                'id'    => 180,
                'title' => 'front_link_edit',
            ],
            [
                'id'    => 181,
                'title' => 'front_link_show',
            ],
            [
                'id'    => 182,
                'title' => 'front_link_delete',
            ],
            [
                'id'    => 183,
                'title' => 'front_link_access',
            ],
            [
                'id'    => 184,
                'title' => 'subscription_create',
            ],
            [
                'id'    => 185,
                'title' => 'subscription_edit',
            ],
            [
                'id'    => 186,
                'title' => 'subscription_show',
            ],
            [
                'id'    => 187,
                'title' => 'subscription_delete',
            ],
            [
                'id'    => 188,
                'title' => 'subscription_access',
            ],
            [
                'id'    => 189,
                'title' => 'service_create',
            ],
            [
                'id'    => 190,
                'title' => 'service_edit',
            ],
            [
                'id'    => 191,
                'title' => 'service_show',
            ],
            [
                'id'    => 192,
                'title' => 'service_delete',
            ],
            [
                'id'    => 193,
                'title' => 'service_access',
            ],
            [
                'id'    => 194,
                'title' => 'beneficiary_order_create',
            ],
            [
                'id'    => 195,
                'title' => 'beneficiary_order_edit',
            ],
            [
                'id'    => 196,
                'title' => 'beneficiary_order_show',
            ],
            [
                'id'    => 197,
                'title' => 'beneficiary_order_delete',
            ],
            [
                'id'    => 198,
                'title' => 'beneficiary_order_access',
            ],
            [
                'id'    => 199,
                'title' => 'service_status_create',
            ],
            [
                'id'    => 200,
                'title' => 'service_status_edit',
            ],
            [
                'id'    => 201,
                'title' => 'service_status_show',
            ],
            [
                'id'    => 202,
                'title' => 'service_status_delete',
            ],
            [
                'id'    => 203,
                'title' => 'service_status_access',
            ],
            [
                'id'    => 204,
                'title' => 'letters_managment_access',
            ],
            [
                'id'    => 205,
                'title' => 'incoming_letter_create',
            ],
            [
                'id'    => 206,
                'title' => 'incoming_letter_edit',
            ],
            [
                'id'    => 207,
                'title' => 'incoming_letter_show',
            ],
            [
                'id'    => 208,
                'title' => 'incoming_letter_delete',
            ],
            [
                'id'    => 209,
                'title' => 'incoming_letter_access',
            ],
            [
                'id'    => 210,
                'title' => 'letters_organization_create',
            ],
            [
                'id'    => 211,
                'title' => 'letters_organization_edit',
            ],
            [
                'id'    => 212,
                'title' => 'letters_organization_show',
            ],
            [
                'id'    => 213,
                'title' => 'letters_organization_delete',
            ],
            [
                'id'    => 214,
                'title' => 'letters_organization_access',
            ],
            [
                'id'    => 215,
                'title' => 'outgoing_letter_create',
            ],
            [
                'id'    => 216,
                'title' => 'outgoing_letter_edit',
            ],
            [
                'id'    => 217,
                'title' => 'outgoing_letter_show',
            ],
            [
                'id'    => 218,
                'title' => 'outgoing_letter_delete',
            ],
            [
                'id'    => 219,
                'title' => 'outgoing_letter_access',
            ],
            [
                'id'    => 220,
                'title' => 'services_managment_access',
            ],
            [
                'id'    => 221,
                'title' => 'course_create',
            ],
            [
                'id'    => 222,
                'title' => 'course_edit',
            ],
            [
                'id'    => 223,
                'title' => 'course_show',
            ],
            [
                'id'    => 224,
                'title' => 'course_delete',
            ],
            [
                'id'    => 225,
                'title' => 'course_access',
            ],
            [
                'id'    => 226,
                'title' => 'course_student_create',
            ],
            [
                'id'    => 227,
                'title' => 'course_student_edit',
            ],
            [
                'id'    => 228,
                'title' => 'course_student_show',
            ],
            [
                'id'    => 229,
                'title' => 'course_student_delete',
            ],
            [
                'id'    => 230,
                'title' => 'course_student_access',
            ],
            [
                'id'    => 231,
                'title' => 'building_create',
            ],
            [
                'id'    => 232,
                'title' => 'building_edit',
            ],
            [
                'id'    => 233,
                'title' => 'building_show',
            ],
            [
                'id'    => 234,
                'title' => 'building_delete',
            ],
            [
                'id'    => 235,
                'title' => 'building_access',
            ],
            [
                'id'    => 236,
                'title' => 'beneficiary_orders_management_access',
            ],
            [
                'id'    => 237,
                'title' => 'archive_create',
            ],
            [
                'id'    => 238,
                'title' => 'archive_edit',
            ],
            [
                'id'    => 239,
                'title' => 'archive_show',
            ],
            [
                'id'    => 240,
                'title' => 'archive_delete',
            ],
            [
                'id'    => 241,
                'title' => 'archive_access',
            ],
            [
                'id'    => 242,
                'title' => 'letter_archive_create',
            ],
            [
                'id'    => 243,
                'title' => 'letter_archive_edit',
            ],
            [
                'id'    => 244,
                'title' => 'letter_archive_show',
            ],
            [
                'id'    => 245,
                'title' => 'letter_archive_delete',
            ],
            [
                'id'    => 246,
                'title' => 'letter_archive_access',
            ],
            [
                'id'    => 247,
                'title' => 'beneficiary_archive_create',
            ],
            [
                'id'    => 248,
                'title' => 'beneficiary_archive_edit',
            ],
            [
                'id'    => 249,
                'title' => 'beneficiary_archive_show',
            ],
            [
                'id'    => 250,
                'title' => 'beneficiary_archive_delete',
            ],
            [
                'id'    => 251,
                'title' => 'beneficiary_archive_access',
            ],
            [
                'id'    => 252,
                'title' => 'beneficiary_orders_archive_create',
            ],
            [
                'id'    => 253,
                'title' => 'beneficiary_orders_archive_edit',
            ],
            [
                'id'    => 254,
                'title' => 'beneficiary_orders_archive_show',
            ],
            [
                'id'    => 255,
                'title' => 'beneficiary_orders_archive_delete',
            ],
            [
                'id'    => 256,
                'title' => 'beneficiary_orders_archive_access',
            ],
            [
                'id'    => 257,
                'title' => 'beneficiary_un_completed_create',
            ],
            [
                'id'    => 258,
                'title' => 'beneficiary_un_completed_edit',
            ],
            [
                'id'    => 259,
                'title' => 'beneficiary_un_completed_show',
            ],
            [
                'id'    => 260,
                'title' => 'beneficiary_un_completed_delete',
            ],
            [
                'id'    => 261,
                'title' => 'beneficiary_un_completed_access',
            ],
            [
                'id'    => 262,
                'title' => 'beneficiary_orders_done_create',
            ],
            [
                'id'    => 263,
                'title' => 'beneficiary_orders_done_edit',
            ],
            [
                'id'    => 264,
                'title' => 'beneficiary_orders_done_show',
            ],
            [
                'id'    => 265,
                'title' => 'beneficiary_orders_done_delete',
            ],
            [
                'id'    => 266,
                'title' => 'beneficiary_orders_done_access',
            ],
            [
                'id'    => 267,
                'title' => 'beneficiary_orders_rejected_create',
            ],
            [
                'id'    => 268,
                'title' => 'beneficiary_orders_rejected_edit',
            ],
            [
                'id'    => 269,
                'title' => 'beneficiary_orders_rejected_show',
            ],
            [
                'id'    => 270,
                'title' => 'beneficiary_orders_rejected_delete',
            ],
            [
                'id'    => 271,
                'title' => 'beneficiary_orders_rejected_access',
            ],
            [
                'id'    => 272,
                'title' => 'report_managment_access',
            ],
            [
                'id'    => 273,
                'title' => 'beneficiary_report_create',
            ],
            [
                'id'    => 274,
                'title' => 'beneficiary_report_edit',
            ],
            [
                'id'    => 275,
                'title' => 'beneficiary_report_show',
            ],
            [
                'id'    => 276,
                'title' => 'beneficiary_report_delete',
            ],
            [
                'id'    => 277,
                'title' => 'beneficiary_report_access',
            ],
            [
                'id'    => 278,
                'title' => 'beneficiary_orders_report_create',
            ],
            [
                'id'    => 279,
                'title' => 'beneficiary_orders_report_edit',
            ],
            [
                'id'    => 280,
                'title' => 'beneficiary_orders_report_show',
            ],
            [
                'id'    => 281,
                'title' => 'beneficiary_orders_report_delete',
            ],
            [
                'id'    => 282,
                'title' => 'beneficiary_orders_report_access',
            ],
            [
                'id'    => 283,
                'title' => 'task_report_create',
            ],
            [
                'id'    => 284,
                'title' => 'task_report_edit',
            ],
            [
                'id'    => 285,
                'title' => 'task_report_show',
            ],
            [
                'id'    => 286,
                'title' => 'task_report_delete',
            ],
            [
                'id'    => 287,
                'title' => 'task_report_access',
            ],
            [
                'id'    => 288,
                'title' => 'beneficiary_order_followup_create',
            ],
            [
                'id'    => 289,
                'title' => 'beneficiary_order_followup_edit',
            ],
            [
                'id'    => 290,
                'title' => 'beneficiary_order_followup_show',
            ],
            [
                'id'    => 291,
                'title' => 'beneficiary_order_followup_delete',
            ],
            [
                'id'    => 292,
                'title' => 'beneficiary_order_followup_access',
            ],
            [
                'id'    => 293,
                'title' => 'archive_management_access',
            ],
            [
                'id'    => 294,
                'title' => 'storage_location_create',
            ],
            [
                'id'    => 295,
                'title' => 'storage_location_edit',
            ],
            [
                'id'    => 296,
                'title' => 'storage_location_show',
            ],
            [
                'id'    => 297,
                'title' => 'storage_location_delete',
            ],
            [
                'id'    => 298,
                'title' => 'storage_location_access',
            ],
            [
                'id'    => 299,
                'title' => 'charity_create',
            ],
            [
                'id'    => 300,
                'title' => 'charity_edit',
            ],
            [
                'id'    => 301,
                'title' => 'charity_show',
            ],
            [
                'id'    => 302,
                'title' => 'charity_delete',
            ],
            [
                'id'    => 303,
                'title' => 'charity_access',
            ],
            [
                'id'    => 304,
                'title' => 'building_beneficiary_create',
            ],
            [
                'id'    => 305,
                'title' => 'building_beneficiary_edit',
            ],
            [
                'id'    => 306,
                'title' => 'building_beneficiary_show',
            ],
            [
                'id'    => 307,
                'title' => 'building_beneficiary_delete',
            ],
            [
                'id'    => 308,
                'title' => 'building_beneficiary_access',
            ],
            [
                'id'    => 309,
                'title' => 'beneficiary_refused_create',
            ],
            [
                'id'    => 310,
                'title' => 'beneficiary_refused_edit',
            ],
            [
                'id'    => 311,
                'title' => 'beneficiary_refused_show',
            ],
            [
                'id'    => 312,
                'title' => 'beneficiary_refused_delete',
            ],
            [
                'id'    => 313,
                'title' => 'beneficiary_refused_access',
            ],
            [
                'id'    => 314,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
