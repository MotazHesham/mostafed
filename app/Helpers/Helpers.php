<?php

use App\Models\GenerativeNumber;
use App\Models\User;
use Illuminate\Support\Facades\DB;

if (!function_exists('formatFileSize')) {
    function formatFileSize($bytes)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= pow(1024, $pow);
        return round($bytes, 2) . ' ' . $units[$pow];
    }
}

if (!function_exists('currentEditingLang')) {
    function currentEditingLang()
    {
        return request('lang', app()->getLocale());
    }
}


if (!function_exists('getEnglishEquivalent')) {
    function getEnglishEquivalent($name)
    {
        $arabicToEnglish = [
            'ا' => 'A',
            'أ' => 'A',
            'إ' => 'E',
            'آ' => 'A',
            'ب' => 'B',
            'ت' => 'T',
            'ث' => 'TH',
            'ج' => 'J',
            'ح' => 'H',
            'خ' => 'KH',
            'د' => 'D',
            'ذ' => 'TH',
            'ر' => 'R',
            'ز' => 'Z',
            'س' => 'S',
            'ش' => 'SH',
            'ص' => 'S',
            'ض' => 'D',
            'ط' => 'T',
            'ظ' => 'Z',
            'ع' => 'A',
            'غ' => 'GH',
            'ف' => 'F',
            'ق' => 'Q',
            'ك' => 'K',
            'ل' => 'L',
            'م' => 'M',
            'ن' => 'N',
            'ه' => 'H',
            'و' => 'W',
            'ي' => 'Y',
            'ى' => 'A',
            'ئ' => 'Y'
        ];

        $name = explode(' ', $name);
        $firstName = $name[0];
        $lastName = count($name) > 1 ? $name[count($name) - 1] : null;

        $firstChar = mb_substr($firstName, 0, 1, 'UTF-8');
        $lastChar = $lastName ? mb_substr($lastName, 0, 1, 'UTF-8') : null;
        return ($arabicToEnglish[$firstChar] ?? strtoupper($firstChar)) . ($lastChar ? $arabicToEnglish[$lastChar] ?? strtoupper($lastChar) : '');
    }
}

if (!function_exists("generativeNumber")) {
    function generativeNumber($model, $type = null)
    {
        return DB::transaction(function () use ($model, $type) {
            $generativeNumber = GenerativeNumber::where('model', $model)
                ->where('type', $type)
                ->lockForUpdate()
                ->first();

            $newNumber = $generativeNumber->number + 1;

            $generativeNumber->number = $newNumber;
            $generativeNumber->save();

            return $generativeNumber->prefix . '-' . $newNumber;
        });
    }
}

if (!function_exists('getRandomColor')) {
    function getRandomColor($name)
    {
        $colors = [
            'bg-primary-transparent',
            'bg-success-transparent',
            'bg-info-transparent',
            'bg-warning-transparent',
            'bg-danger-transparent',
            'bg-purple-transparent',
            'bg-pink-transparent',
            'bg-indigo-transparent',
            'bg-teal-transparent',
            'bg-orange-transparent'
        ];
        $hash = crc32($name);
        return $colors[abs($hash) % count($colors)];
    }
}

if (!function_exists('compareJsonValues')) {
    function compareJsonValues($oldJson, $newJson)
    {
        $old = json_decode($oldJson, true) ?? [];
        $new = json_decode($newJson, true) ?? [];

        $added = array_diff_assoc($new, $old);
        $removed = array_diff_assoc($old, $new);
        $unchanged = array_intersect_assoc($old, $new);

        return [
            'added' => $added,
            'removed' => $removed,
            'unchanged' => $unchanged,
            'changed' => findValueChanges($old, $new)
        ];
    }
}

if (!function_exists('findValueChanges')) {
    function findValueChanges($old, $new)
    {
        $changed = [];

        foreach ($new as $key => $value) {
            if (isset($old[$key]) && $old[$key] != $value) {
                $changed[$key] = [
                    'old' => $old[$key],
                    'new' => $value
                ];
            }
        }

        return $changed;
    }
}

if (!function_exists('randomBadgeClass')) {
    function randomBadgeClass($name)
    {
        $badgeClass = [
            'primary',
            'success',
            'warning',
            'danger',
            'info',
            'dark', 
            'secondary',
        ];
        $hash = crc32($name);
        return $badgeClass[abs($hash) % count($badgeClass)];
    }
}

if (!function_exists('getStaffUsers')) {
    function getStaffUsers()
    {
        return User::where('user_type', 'staff')->get();
    }
}

if (!function_exists('getBeneficiaryUsers')) {
    function getBeneficiaryUsers()
    {
        return User::where('user_type', 'beneficiary')->get();
    }
}

