<?php

namespace App\Http\Controllers\Tenant\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBeneficiaryFamilyRequest;
use App\Http\Requests\StoreBeneficiaryFamilyRequest;
use App\Http\Requests\UpdateBeneficiaryFamilyRequest;
use App\Models\Beneficiary;
use App\Models\BeneficiaryFamily;
use App\Models\DisabilityType;
use App\Models\FamilyRelationship;
use App\Models\HealthCondition;
use App\Models\MaritalStatus;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BeneficiaryFamilyController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('beneficiary_family_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = BeneficiaryFamily::with(['beneficiary', 'family_relationship', 'marital_status', 'health_condition', 'disability_type'])->select(sprintf('%s.*', (new BeneficiaryFamily)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'beneficiary_family_show';
                $editGate      = 'beneficiary_family_edit';
                $deleteGate    = 'beneficiary_family_delete';
                $crudRoutePart = 'beneficiary-families';

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
            $table->addColumn('beneficiary_dob', function ($row) {
                return $row->beneficiary ? $row->beneficiary->dob : '';
            });

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('gender', function ($row) {
                return $row->gender ? BeneficiaryFamily::GENDER_SELECT[$row->gender] : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('photo', function ($row) {
                if ($photo = $row->photo) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });

            $table->rawColumns(['actions', 'placeholder', 'beneficiary', 'photo']);

            return $table->make(true);
        }

        return view('tenant.admin.beneficiaryFamilies.index');
    }

    public function create()
    {
        abort_if(Gate::denies('beneficiary_family_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiaries = Beneficiary::pluck('dob', 'id')->prepend(trans('global.pleaseSelect'), '');

        $family_relationships = FamilyRelationship::pluck('gender', 'id')->prepend(trans('global.pleaseSelect'), '');

        $marital_statuses = MaritalStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $health_conditions = HealthCondition::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $disability_types = DisabilityType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('tenant.admin.beneficiaryFamilies.create', compact('beneficiaries', 'disability_types', 'family_relationships', 'health_conditions', 'marital_statuses'));
    }

    public function store(StoreBeneficiaryFamilyRequest $request)
    {
        $beneficiaryFamily = BeneficiaryFamily::create($request->all());

        if ($request->input('photo', false)) {
            $beneficiaryFamily->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $beneficiaryFamily->id]);
        }

        return redirect()->route('admin.beneficiary-families.index');
    }

    public function edit(BeneficiaryFamily $beneficiaryFamily)
    {
        abort_if(Gate::denies('beneficiary_family_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiaries = Beneficiary::pluck('dob', 'id')->prepend(trans('global.pleaseSelect'), '');

        $family_relationships = FamilyRelationship::pluck('gender', 'id')->prepend(trans('global.pleaseSelect'), '');

        $marital_statuses = MaritalStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $health_conditions = HealthCondition::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $disability_types = DisabilityType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $beneficiaryFamily->load('beneficiary', 'family_relationship', 'marital_status', 'health_condition', 'disability_type');

        return view('tenant.admin.beneficiaryFamilies.edit', compact('beneficiaries', 'beneficiaryFamily', 'disability_types', 'family_relationships', 'health_conditions', 'marital_statuses'));
    }

    public function update(UpdateBeneficiaryFamilyRequest $request, BeneficiaryFamily $beneficiaryFamily)
    {
        $beneficiaryFamily->update($request->all());

        if ($request->input('photo', false)) {
            if (! $beneficiaryFamily->photo || $request->input('photo') !== $beneficiaryFamily->photo->file_name) {
                if ($beneficiaryFamily->photo) {
                    $beneficiaryFamily->photo->delete();
                }
                $beneficiaryFamily->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($beneficiaryFamily->photo) {
            $beneficiaryFamily->photo->delete();
        }

        return redirect()->route('admin.beneficiary-families.index');
    }

    public function show(BeneficiaryFamily $beneficiaryFamily)
    {
        abort_if(Gate::denies('beneficiary_family_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiaryFamily->load('beneficiary', 'family_relationship', 'marital_status', 'health_condition', 'disability_type');

        return view('tenant.admin.beneficiaryFamilies.show', compact('beneficiaryFamily'));
    }

    public function destroy(BeneficiaryFamily $beneficiaryFamily)
    {
        abort_if(Gate::denies('beneficiary_family_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiaryFamily->delete();

        return back();
    }

    public function massDestroy(MassDestroyBeneficiaryFamilyRequest $request)
    {
        $beneficiaryFamilies = BeneficiaryFamily::find(request('ids'));

        foreach ($beneficiaryFamilies as $beneficiaryFamily) {
            $beneficiaryFamily->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('beneficiary_family_create') && Gate::denies('beneficiary_family_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new BeneficiaryFamily();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
