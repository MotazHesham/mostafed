<?php

namespace Database\Seeders\Tenant;

use App\Models\EconomicStatus;
use Illuminate\Database\Seeder;

class EconomicStatusSeeder extends Seeder
{
    public function run()
    {
        $economicStatuses = [
            // Income sources
            [
                'name' => ['ar' => 'راتب شهري', 'en' => 'Monthly Salary'],
                'type' => 'income',
            ],
            [
                'name' => ['ar' => 'أجر يومي', 'en' => 'Daily Wage'],
                'type' => 'income',
            ],
            [
                'name' => ['ar' => 'معاش تقاعدي', 'en' => 'Pension'],
                'type' => 'income',
            ],
            [
                'name' => ['ar' => 'دعم حكومي', 'en' => 'Government Support'],
                'type' => 'income',
            ],
            [
                'name' => ['ar' => 'إيجار عقار', 'en' => 'Property Rental'],
                'type' => 'income',
            ],
            [
                'name' => ['ar' => 'أرباح تجارية', 'en' => 'Business Profits'],
                'type' => 'income',
            ],
            [
                'name' => ['ar' => 'استثمارات', 'en' => 'Investments'],
                'type' => 'income',
            ],
            [
                'name' => ['ar' => 'مساعدات أسرية', 'en' => 'Family Support'],
                'type' => 'income',
            ],
            [
                'name' => ['ar' => 'عمل حر', 'en' => 'Freelance Work'],
                'type' => 'income',
            ],
            // Expenses
            [
                'name' => ['ar' => 'إيجار السكن', 'en' => 'Housing Rent'],
                'type' => 'expense',
            ],
            [
                'name' => ['ar' => 'فواتير الكهرباء والماء', 'en' => 'Utilities'],
                'type' => 'expense',
            ],
            [
                'name' => ['ar' => 'الطعام والشراب', 'en' => 'Food and Beverages'],
                'type' => 'expense',
            ],
            [
                'name' => ['ar' => 'النقل والمواصلات', 'en' => 'Transportation'],
                'type' => 'expense',
            ],
            [
                'name' => ['ar' => 'الرعاية الصحية', 'en' => 'Healthcare'],
                'type' => 'expense',
            ],
            [
                'name' => ['ar' => 'التعليم', 'en' => 'Education'],
                'type' => 'expense',
            ],
            [
                'name' => ['ar' => 'الملابس', 'en' => 'Clothing'],
                'type' => 'expense',
            ],
            [
                'name' => ['ar' => 'قروض وديون', 'en' => 'Loans and Debts'],
                'type' => 'expense',
            ],
            [
                'name' => ['ar' => 'أقساط السيارة', 'en' => 'Car Payments'],
                'type' => 'expense',
            ],
            [
                'name' => ['ar' => 'ترفيه', 'en' => 'Entertainment'],
                'type' => 'expense',
            ],
        ];

        foreach ($economicStatuses as $economicStatus) {
            EconomicStatus::create($economicStatus);
        }
    }
} 