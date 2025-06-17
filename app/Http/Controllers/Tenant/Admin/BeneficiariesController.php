<?php

namespace App\Http\Controllers\Tenant\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tenant\Admin\MassDestroyBeneficiaryRequest;
use App\Http\Requests\Tenant\Admin\StoreBeneficiaryRequest;
use App\Http\Requests\Tenant\Admin\UpdateBeneficiaryRequest;
use App\Models\Beneficiary; 
use App\Models\CustomActivityLog;
use App\Models\DisabilityType;
use App\Models\District;
use App\Models\EconomicStatus;
use App\Models\EducationalQualification;
use App\Models\HealthCondition;
use App\Models\JobType;
use App\Models\MaritalStatus;
use App\Models\Nationality;
use App\Models\RequiredDocument;
use App\Models\User;
use App\Services\BeneficiaryService;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BeneficiariesController extends Controller
{

    public function __construct(
        protected BeneficiaryService $beneficiaryService
    ) {}

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

        return view('tenant.admin.beneficiaries.create');
    }

    public function store(StoreBeneficiaryRequest $request)
    {
        $beneficiary = $this->beneficiaryService->createBeneficiary($request);

        if ($request->has('next')) {
            return redirect()->route('admin.beneficiaries.edit', $beneficiary->id);
        }

        return redirect()->route('admin.beneficiaries.index');
    }

    public function edit(Beneficiary $beneficiary)
    {
        abort_if(Gate::denies('beneficiary_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nationalities = Nationality::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $marital_statuses = MaritalStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $job_types = JobType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $educational_qualifications = EducationalQualification::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $districts = District::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $health_conditions = HealthCondition::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $disability_types = DisabilityType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $specialists = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $incomes = EconomicStatus::where('type', 'income')->orderBy('order_level','desc')->get();
        $expenses = EconomicStatus::where('type', 'expense')->orderBy('order_level','desc')->get();

        $requiredDocuments = RequiredDocument::all();

        $beneficiary->load('user', 'nationality', 'marital_status', 'job_type', 'educational_qualification', 'district', 'health_condition', 'disability_type', 'specialist');

        $user = $beneficiary->user;
        return view(
            'tenant.admin.beneficiaries.edit',
            compact(
                'beneficiary',
                'requiredDocuments',
                'disability_types',
                'districts',
                'educational_qualifications',
                'health_conditions',
                'job_types',
                'marital_statuses',
                'nationalities',
                'specialists',
                'user',
                'incomes',
                'expenses'
            )
        );
    }

    public function update(UpdateBeneficiaryRequest $request, Beneficiary $beneficiary)
    { 
        $this->beneficiaryService->updateBeneficiary($beneficiary, $request);

        return redirect()->route('admin.beneficiaries.edit', $beneficiary->id);
    }

    public function show(Beneficiary $beneficiary)
    {
        abort_if(Gate::denies('beneficiary_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiary->load('user', 'nationality', 'marital_status', 'job_type', 'educational_qualification', 'district', 'health_condition', 'disability_type', 'specialist', 'beneficiaryBeneficiaryOrders');

        $user = $beneficiary->user;

        $nationalities = Nationality::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $marital_statuses = MaritalStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $job_types = JobType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $educational_qualifications = EducationalQualification::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $districts = District::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $health_conditions = HealthCondition::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $disability_types = DisabilityType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $incomes = EconomicStatus::where('type', 'income')->orderBy('order_level','desc')->get();
        $expenses = EconomicStatus::where('type', 'expense')->orderBy('order_level','desc')->get();
        
        $activityLogs = CustomActivityLog::inLog('beneficiary_activity')->orderBy('id', 'desc')->paginate(10);
        
        if (request()->ajax()) { 
            return response()->json([
                'html' => view('tenant.partials.activity', compact('activityLogs'))->render(),
                'hasMorePages' => $activityLogs->hasMorePages()
            ]);
        }
        
        return view('tenant.admin.beneficiaries.show', compact(
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
            'activityLogs'
        ));
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
