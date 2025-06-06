<?php

namespace Database\Seeders\Tenant;

use App\Models\RequiredDocument;
use Illuminate\Database\Seeder;

class RequiredDocumentSeeder extends Seeder
{
    public function run()
    {
        $requiredDocuments = [
            [
                'name' => ['ar' => 'الهوية الوطنية', 'en' => 'National ID'],
            ],
            [
                'name' => ['ar' => 'جواز السفر', 'en' => 'Passport'],
            ],
            [
                'name' => ['ar' => 'شهادة الميلاد', 'en' => 'Birth Certificate'],
            ],
            [
                'name' => ['ar' => 'شهادة الزواج', 'en' => 'Marriage Certificate'],
            ],
            [
                'name' => ['ar' => 'شهادة الطلاق', 'en' => 'Divorce Certificate'],
            ],
            [
                'name' => ['ar' => 'شهادة الوفاة', 'en' => 'Death Certificate'],
            ],
            [
                'name' => ['ar' => 'الشهادة الدراسية', 'en' => 'Educational Certificate'],
            ],
            [
                'name' => ['ar' => 'شهادة الخبرة', 'en' => 'Experience Certificate'],
            ],
            [
                'name' => ['ar' => 'السجل التجاري', 'en' => 'Commercial Registry'],
            ],
            [
                'name' => ['ar' => 'شهادة السكن', 'en' => 'Residency Certificate'],
            ],
            [
                'name' => ['ar' => 'كشف حساب بنكي', 'en' => 'Bank Statement'],
            ],
            [
                'name' => ['ar' => 'تقرير طبي', 'en' => 'Medical Report'],
            ],
            [
                'name' => ['ar' => 'صورة شخصية', 'en' => 'Personal Photo'],
            ],
            [
                'name' => ['ar' => 'إقامة', 'en' => 'Residence Permit'],
            ],
            [
                'name' => ['ar' => 'تأشيرة', 'en' => 'Visa'],
            ],
            [
                'name' => ['ar' => 'رخصة قيادة', 'en' => 'Driver\'s License'],
            ],
            [
                'name' => ['ar' => 'شهادة التأمين', 'en' => 'Insurance Certificate'],
            ],
            [
                'name' => ['ar' => 'كشف درجات', 'en' => 'Academic Transcript'],
            ],
        ];

        foreach ($requiredDocuments as $requiredDocument) {
            RequiredDocument::create($requiredDocument);
        }
    }
} 