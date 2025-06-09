<?php

namespace App\Services;

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

    public function updateBeneficiary($beneficiary, $request, $profile_status = 'pending')
    {
        
        $user = $beneficiary->user;

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'phone_2' => $request->phone_2,
            'identity_num' => $request->identity_num,
        ]); 

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


        $data = [
            'nationality_id' => $request->nationality_id,
            'marital_status_id' => $request->marital_status_id,
            'job_type_id' => $request->job_type_id,
            'educational_qualification_id' => $request->educational_qualification_id,
            'dob' => $request->dob,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'district_id' => $request->district_id,
            'street' => $request->street,
            'building_number' => $request->building_number,
            'floor_number' => $request->floor_number,
            'health_condition_id' => $request->health_condition_id,
            'custom_health_condition' => $request->custom_health_condition,
            'disability_type_id' => $request->disability_type_id,
            'custom_disability_type' => $request->custom_disability_type,
            'can_work' => $request->can_work,
            'profile_status' => $profile_status,
        ];
        
        if($request->has('incomes') && !empty($request->incomes)){
            $data['incomes'] = json_encode($request->incomes);
            $data['total_incomes'] = array_sum($request->incomes);
        }
        if($request->has('expenses') && !empty($request->expenses)){
            $data['expenses'] = json_encode($request->expenses);
            $data['total_expenses'] = array_sum($request->expenses);
        }

        $beneficiary->update($data);

        if($request->has('documents')){
            $updatedFilesIds = [];
            foreach($request->documents as $id => $file){
                $requiredDocument = RequiredDocument::find($id);
                $beneficiaryFile = BeneficiaryFile::updateOrCreate([
                    'beneficiary_id' => $beneficiary->id, 
                    'required_document_id' => $id,
                ], [
                    'name' => ['ar' => $requiredDocument->getTranslation('name', 'ar'), 'en' => $requiredDocument->getTranslation('name', 'en')],
                ]);
                $updatedFilesIds[] = $beneficiaryFile->id;

                if($file){ 
                    if (! $beneficiaryFile->file || $file !== $beneficiaryFile->file->file_name) {
                        if ($beneficiaryFile->file) {
                            $beneficiaryFile->file->delete();
                        }
                        $beneficiaryFile->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('file');
                    } 
                }
            }
            if (!empty($updatedFilesIds)) {
                $beneficiary->beneficiaryFiles()->whereNotIn('id', $updatedFilesIds)->forceDelete();
            }
        }
        
        return $beneficiary;
    }
}