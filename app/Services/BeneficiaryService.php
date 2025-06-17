<?php

namespace App\Services;

use App\Helpers\ActivityLogHelper;
use App\Models\Beneficiary;
use App\Models\BeneficiaryFile;
use App\Models\RequiredDocument;
use App\Models\User;

class BeneficiaryService
{
    public function createBeneficiary($request)
    { 
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'identity_num' => $request->identity_num,
            'approved' => 1,
            'user_type' => 'beneficiary',
        ]);

        $beneficiary = Beneficiary::create([
            'user_id' => $user->id,
        ]);
        return $beneficiary;
    }

    public function updateBeneficiary($beneficiary, $request)
    {
        
        $user = $beneficiary->user;
        $userData = [];
        $beneficiaryData = [];

        if($request->step == 'login_information'){
            $userData = [
                'email' => $request->email,
                'password' => $request->password,
                'phone' => $request->phone,
                'phone_2' => $request->phone_2,
                'identity_num' => $request->identity_num,
            ];

            if ($request->input('photo', false)) {
                if (! $user->photo || $request->input('photo') !== $user->photo->file_name) {
                    if ($user->photo) {
                        $user->photo->delete();
                    }
                    $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
                }
            } elseif ($user->photo) {
                $user->photo->delete();
            }
            $beneficiaryData['form_step'] = $beneficiary->form_step != 'login_information' ? $beneficiary->form_step : 'basic_information';
        }

        if($request->step == 'basic_information'){
            $userData = $request->only(['name']);
            $beneficiaryData = $request->only([
                'nationality_id',
                'dob',
                'marital_status_id', 
                'address',
                'latitude',
                'longitude',
                'district_id',
                'street',
                'building_number',
                'floor_number'
            ]);
            $beneficiaryData['form_step'] = $beneficiary->form_step != 'basic_information' ? $beneficiary->form_step : 'work_information';
        }

        if($request->step == 'work_information'){
            $beneficiaryData = $request->only([
                'educational_qualification_id',
                'job_type_id',
                'can_work',
                'health_condition_id',
                'custom_health_condition',
                'disability_type_id',
                'custom_disability_type'
            ]);
            $beneficiaryData['form_step'] = $beneficiary->form_step != 'work_information' ? $beneficiary->form_step : 'family_information';
        }

        if($request->step == 'economic_information'){ 
            if($request->has('incomes') && !empty($request->incomes)){
                $beneficiaryData['incomes'] = json_encode($request->incomes);
                if($beneficiary->total_incomes != array_sum($request->incomes)){
                    $beneficiaryData['total_incomes'] = array_sum($request->incomes);
                }
            }
            if($request->has('expenses') && !empty($request->expenses)){
                $beneficiaryData['expenses'] = json_encode($request->expenses);
                if($beneficiary->total_expenses != array_sum($request->expenses)){
                    $beneficiaryData['total_expenses'] = array_sum($request->expenses);
                }
            }
            $beneficiaryData['form_step'] = $beneficiary->form_step != 'economic_information' ? $beneficiary->form_step : 'documents';
        }

        $beneficiary->update($beneficiaryData);
        $user->update($userData); 

        if($request->step == 'documents'){
            $eventType = null;
            $description = null;
            $enableLogging = false;
            $deletedFiles = [];
            if($request->has('documents')){
                $updatedFilesIds = [];
                foreach($request->documents as $id => $file){
                    $requiredDocument = RequiredDocument::find($id);
                    $beneficiaryFile = BeneficiaryFile::updateOrCreate(
                        [
                            'beneficiary_id' => $beneficiary->id,
                            'required_document_id' => $id,
                        ],
                        [
                            'name' => [
                                'ar' => $requiredDocument->getTranslation('name', 'ar'),
                                'en' => $requiredDocument->getTranslation('name', 'en')
                            ],
                        ]
                    );
                    
                    $wasRecentlyCreated = $beneficiaryFile->wasRecentlyCreated;
                    $updatedFilesIds[] = $beneficiaryFile->id;

                    if($file){ 
                        if (! $beneficiaryFile->file || $file !== $beneficiaryFile->file->file_name) {
                            if ($beneficiaryFile->file) {
                                $beneficiaryFile->file->delete();
                            }
                            $beneficiaryFile->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('file');
                            $enableLogging = true;
                        } 
                    }
                    if($wasRecentlyCreated){
                        $eventType = 'created';
                        $description = "تم إضافة مستند ";
                        $enableLogging = true;
                    }else{
                        $eventType = 'updated';
                        $description = "تم تحديث مستند "; 
                    }
                    if($enableLogging){
                        $description .= "<span class='badge bg-warning-transparent mb-3'>" . $requiredDocument->getTranslation('name', 'ar') . "</span>";
                        ActivityLogHelper::logModelActivity( $beneficiaryFile, $description, [],
                            'beneficiary_activity-'.$beneficiary->id, $eventType, 
                        );
                    }
                }
                if (!empty($updatedFilesIds)) {
                    $deletedFiles = $beneficiary->beneficiaryFiles()->whereNotIn('id', $updatedFilesIds)->get(); 
                }
            }else{
                $deletedFiles = $beneficiary->beneficiaryFiles()->get();
            }
            if(!empty($deletedFiles)){
                foreach($deletedFiles as $deletedFile){
                    $name = $deletedFile->getTranslation('name', 'ar');
                    $deletedFile->delete();
                    $eventType = 'deleted';
                    $description = "تم حذف مستند "; 
                    $description .= "<span class='badge bg-warning-transparent mb-3'>" . $name . "</span>";
                    ActivityLogHelper::logModelActivity( $deletedFile, $description, [],
                        'beneficiary_activity-'.$beneficiary->id, $eventType, 
                    );
                }
            }
        }
        

        return $beneficiary;
    }
}