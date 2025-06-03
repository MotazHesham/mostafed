<?php

namespace App\Http\Controllers\Tenant\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBeneficiaryRequest;
use App\Http\Requests\StoreBeneficiaryRequest;
use App\Http\Requests\UpdateBeneficiaryRequest;
use App\Models\Beneficiary;
use App\Models\DisabilityType;
use App\Models\District;
use App\Models\EducationalQualification;
use App\Models\HealthCondition;
use App\Models\JobType;
use App\Models\MaritalStatus;
use App\Models\Nationality;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BeneficiariesController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('beneficiary_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Beneficiary::with(['user', 'nationality', 'marital_status', 'job_type', 'educational_qualification', 'district', 'health_condition', 'disability_type', 'specialist'])->select(sprintf('%s.*', (new Beneficiary)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'beneficiary_show';
                $editGate      = 'beneficiary_edit';
                $deleteGate    = 'beneficiary_delete';
                $crudRoutePart = 'beneficiaries';

                return view('tenant.partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->editColumn('user.approved', function ($row) {
                return $row->user ? (is_string($row->user) ? $row->user : $row->user->approved) : '';
            });
            $table->editColumn('user.phone', function ($row) {
                return $row->user ? (is_string($row->user) ? $row->user : $row->user->phone) : '';
            });
            $table->editColumn('user.identity_num', function ($row) {
                return $row->user ? (is_string($row->user) ? $row->user : $row->user->identity_num) : '';
            });
            $table->addColumn('specialist_name', function ($row) {
                return $row->specialist ? $row->specialist->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user', 'specialist']);

            return $table->make(true);
        }

        return view('tenant.admin.beneficiaries.index');
    }

    public function create()
    {
        abort_if(Gate::denies('beneficiary_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nationalities = Nationality::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $marital_statuses = MaritalStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $job_types = JobType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $educational_qualifications = EducationalQualification::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $districts = District::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $health_conditions = HealthCondition::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $disability_types = DisabilityType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $specialists = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('tenant.admin.beneficiaries.create', compact('disability_types', 'districts', 'educational_qualifications', 'health_conditions', 'job_types', 'marital_statuses', 'nationalities', 'specialists', 'users'));
    }

    public function store(StoreBeneficiaryRequest $request)
    {
        $beneficiary = Beneficiary::create($request->all());

        return redirect()->route('admin.beneficiaries.index');
    }

    public function edit(Beneficiary $beneficiary)
    {
        abort_if(Gate::denies('beneficiary_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nationalities = Nationality::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $marital_statuses = MaritalStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $job_types = JobType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $educational_qualifications = EducationalQualification::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $districts = District::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $health_conditions = HealthCondition::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $disability_types = DisabilityType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $specialists = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $beneficiary->load('user', 'nationality', 'marital_status', 'job_type', 'educational_qualification', 'district', 'health_condition', 'disability_type', 'specialist');

        return view('tenant.admin.beneficiaries.edit', compact('beneficiary', 'disability_types', 'districts', 'educational_qualifications', 'health_conditions', 'job_types', 'marital_statuses', 'nationalities', 'specialists', 'users'));
    }

    public function update(UpdateBeneficiaryRequest $request, Beneficiary $beneficiary)
    {
        $beneficiary->update($request->all());

        return redirect()->route('admin.beneficiaries.index');
    }

    public function show(Beneficiary $beneficiary)
    {
        abort_if(Gate::denies('beneficiary_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiary->load('user', 'nationality', 'marital_status', 'job_type', 'educational_qualification', 'district', 'health_condition', 'disability_type', 'specialist', 'beneficiaryBeneficiaryOrders');

        return view('tenant.admin.beneficiaries.show', compact('beneficiary'));
    }

    public function destroy(Beneficiary $beneficiary)
    {
        abort_if(Gate::denies('beneficiary_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiary->delete();

        return back();
    }

    public function massDestroy(MassDestroyBeneficiaryRequest $request)
    {
        $beneficiaries = Beneficiary::find(request('ids'));

        foreach ($beneficiaries as $beneficiary) {
            $beneficiary->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
