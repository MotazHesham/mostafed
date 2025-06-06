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
    public function create(Request $request)
    {
        abort_if(Gate::denies('beneficiary_family_create'), Response::HTTP_FORBIDDEN, '403 Forbidden'); 

        $beneficiary = Beneficiary::find($request->beneficiary_id);

        $family_relationships = FamilyRelationship::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $marital_statuses = MaritalStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $health_conditions = HealthCondition::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $disability_types = DisabilityType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $html = view('tenant.admin.beneficiaryFamilies.create', compact('beneficiary', 'disability_types', 'family_relationships', 'health_conditions', 'marital_statuses'))->render();

        return response()->json([
            'html' => $html,  
        ]);
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
        $beneficiaryFamilies = BeneficiaryFamily::where('beneficiary_id', $request->beneficiary_id)->orderBy('id', 'desc')->get();
        $html = view('tenant.admin.beneficiaryFamilies.index', compact('beneficiaryFamilies'))->render();

        return response()->json([
            'html' => $html,
            'message' => trans('global.flash.created', ['title' => trans('cruds.beneficiaryFamily.title_singular')])
        ]);
    }

    public function edit(BeneficiaryFamily $beneficiaryFamily)
    {
        abort_if(Gate::denies('beneficiary_family_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden'); 

        $family_relationships = FamilyRelationship::pluck('gender', 'id')->prepend(trans('global.pleaseSelect'), '');

        $marital_statuses = MaritalStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $health_conditions = HealthCondition::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $disability_types = DisabilityType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $beneficiaryFamily->load('beneficiary', 'family_relationship', 'marital_status', 'health_condition', 'disability_type');

        return view('tenant.admin.beneficiaryFamilies.edit', compact( 'beneficiaryFamily', 'disability_types', 'family_relationships', 'health_conditions', 'marital_statuses'));
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

        $beneficiaryFamilies = BeneficiaryFamily::where('beneficiary_id', $request->beneficiary_id)->orderBy('id', 'desc')->get();
        $html = view('tenant.admin.beneficiaryFamilies.index', compact('beneficiaryFamilies'))->render();

        return response()->json([
            'html' => $html,  
        ]);
    } 

    public function destroy(BeneficiaryFamily $beneficiaryFamily)
    {
        abort_if(Gate::denies('beneficiary_family_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiaryFamily->delete();

        return back();
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
