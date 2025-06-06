<?php

namespace Database\Seeders;

use Database\Seeders\Tenant\NationalitiesSeeder;
use Database\Seeders\Tenant\PermissionRoleTableSeeder;
use Database\Seeders\Tenant\PermissionsTableSeeder;
use Database\Seeders\Tenant\RolesTableSeeder;
use Database\Seeders\Tenant\RoleUserTableSeeder;
use Database\Seeders\Tenant\RegionSeeder;
use Database\Seeders\Tenant\CitiesSeeder;
use Database\Seeders\Tenant\MaritalStatusSeeder;
use Database\Seeders\Tenant\FamilyRelationshipSeeder;
use Database\Seeders\Tenant\EducationalQualificationSeeder;
use Database\Seeders\Tenant\DisabilityTypeSeeder;
use Database\Seeders\Tenant\HealthConditionSeeder;
use Database\Seeders\Tenant\EconomicStatusSeeder;
use Database\Seeders\Tenant\ServiceStatusSeeder;
use Database\Seeders\Tenant\RequiredDocumentSeeder;
use Database\Seeders\Tenant\TaskStatusTableSeeder;
use Database\Seeders\Tenant\UsersTableSeeder;
use Database\Seeders\Tenant\JobTypeSeeder;
use Illuminate\Database\Seeder;

class DatabaseTenantSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            TaskStatusTableSeeder::class,
            RegionSeeder::class,
            CitiesSeeder::class, 
            NationalitiesSeeder::class,
            MaritalStatusSeeder::class,
            FamilyRelationshipSeeder::class,
            EducationalQualificationSeeder::class,
            DisabilityTypeSeeder::class,
            HealthConditionSeeder::class,
            EconomicStatusSeeder::class,
            ServiceStatusSeeder::class, 
            RequiredDocumentSeeder::class,
            JobTypeSeeder::class,
        ]);
    }
}
