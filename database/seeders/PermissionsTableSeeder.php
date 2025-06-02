<?php

namespace Database\Seeders;

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
                'title' => 'permission_create',
            ],
            [
                'id'    => $i++,
                'title' => 'permission_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'permission_show',
            ],
            [
                'id'    => $i++,
                'title' => 'permission_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'permission_access',
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
                'title' => 'charity_create',
            ],
            [
                'id'    => $i++,
                'title' => 'charity_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'charity_show',
            ],
            [
                'id'    => $i++,
                'title' => 'charity_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'charity_access',
            ], 
            [
                'id'    => $i++,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
