<?php

namespace App\Http\Controllers\Tenant\Beneficiary;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\Beneficiary;
use App\Http\Requests\Tenant\Beneficiary\UpdateProfileBeneficiaryRequest;
use App\Models\Nationality;
use App\Models\MaritalStatus;
use App\Models\JobType;
use App\Models\EducationalQualification;
use App\Models\District;
use App\Models\HealthCondition;
use App\Models\DisabilityType;
use App\Models\EconomicStatus;
use App\Models\RequiredDocument;
use Illuminate\Http\Request;
use App\Services\BeneficiaryService;

class ProfileController extends Controller
{
    use MediaUploadingTrait;
    public function __construct(
        protected BeneficiaryService $beneficiaryService
    ) {}
    public function show()
    {
        $user = auth()->user();
        $beneficiary = $user->beneficiary;

        $nationalities = Nationality::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $marital_statuses = MaritalStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $job_types = JobType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $educational_qualifications = EducationalQualification::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $districts = District::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $health_conditions = HealthCondition::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $disability_types = DisabilityType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        
        $requiredDocuments = RequiredDocument::all();

        $incomes = EconomicStatus::where('type', 'income')->orderBy('order_level', 'desc')->get();
        $expenses = EconomicStatus::where('type', 'expense')->orderBy('order_level', 'desc')->get();

        return view(
            $beneficiary->profile_status == 'uncompleted' ? 'tenant.beneficiary.profile.edit' : 'tenant.beneficiary.profile.show',
            compact(
                'beneficiary',
                'user',
                'nationalities',
                'marital_statuses',
                'job_types',
                'educational_qualifications',
                'districts',
                'health_conditions',
                'disability_types',
                'incomes',
                'expenses',
                'requiredDocuments'
            )
        );
    }
    public function update(UpdateProfileBeneficiaryRequest $request, $id)
    {
        $beneficiary = Beneficiary::findOrFail($id);
        $this->beneficiaryService->updateBeneficiary($beneficiary, $request);

        return redirect()->route('beneficiary.profile.show');
    }
}
