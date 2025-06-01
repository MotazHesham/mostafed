<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBeneficiaryOrderFollowupRequest;
use App\Http\Requests\StoreBeneficiaryOrderFollowupRequest;
use App\Http\Requests\UpdateBeneficiaryOrderFollowupRequest;
use App\Models\BeneficiaryOrder;
use App\Models\BeneficiaryOrderFollowup;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BeneficiaryOrderFollowupsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('beneficiary_order_followup_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = BeneficiaryOrderFollowup::with(['beneficiary_followup', 'user'])->select(sprintf('%s.*', (new BeneficiaryOrderFollowup)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'beneficiary_order_followup_show';
                $editGate      = 'beneficiary_order_followup_edit';
                $deleteGate    = 'beneficiary_order_followup_delete';
                $crudRoutePart = 'beneficiary-order-followups';

                return view('partials.datatablesActions', compact(
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
            $table->addColumn('beneficiary_followup_service_type', function ($row) {
                return $row->beneficiary_followup ? $row->beneficiary_followup->service_type : '';
            });

            $table->editColumn('attachments', function ($row) {
                if (! $row->attachments) {
                    return '';
                }
                $links = [];
                foreach ($row->attachments as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>';
                }

                return implode(', ', $links);
            });
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'beneficiary_followup', 'attachments', 'user']);

            return $table->make(true);
        }

        return view('admin.beneficiaryOrderFollowups.index');
    }

    public function create()
    {
        abort_if(Gate::denies('beneficiary_order_followup_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiary_followups = BeneficiaryOrder::pluck('service_type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.beneficiaryOrderFollowups.create', compact('beneficiary_followups', 'users'));
    }

    public function store(StoreBeneficiaryOrderFollowupRequest $request)
    {
        $beneficiaryOrderFollowup = BeneficiaryOrderFollowup::create($request->all());

        foreach ($request->input('attachments', []) as $file) {
            $beneficiaryOrderFollowup->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('attachments');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $beneficiaryOrderFollowup->id]);
        }

        return redirect()->route('admin.beneficiary-order-followups.index');
    }

    public function edit(BeneficiaryOrderFollowup $beneficiaryOrderFollowup)
    {
        abort_if(Gate::denies('beneficiary_order_followup_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiary_followups = BeneficiaryOrder::pluck('service_type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $beneficiaryOrderFollowup->load('beneficiary_followup', 'user');

        return view('admin.beneficiaryOrderFollowups.edit', compact('beneficiaryOrderFollowup', 'beneficiary_followups', 'users'));
    }

    public function update(UpdateBeneficiaryOrderFollowupRequest $request, BeneficiaryOrderFollowup $beneficiaryOrderFollowup)
    {
        $beneficiaryOrderFollowup->update($request->all());

        if (count($beneficiaryOrderFollowup->attachments) > 0) {
            foreach ($beneficiaryOrderFollowup->attachments as $media) {
                if (! in_array($media->file_name, $request->input('attachments', []))) {
                    $media->delete();
                }
            }
        }
        $media = $beneficiaryOrderFollowup->attachments->pluck('file_name')->toArray();
        foreach ($request->input('attachments', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $beneficiaryOrderFollowup->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('attachments');
            }
        }

        return redirect()->route('admin.beneficiary-order-followups.index');
    }

    public function show(BeneficiaryOrderFollowup $beneficiaryOrderFollowup)
    {
        abort_if(Gate::denies('beneficiary_order_followup_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiaryOrderFollowup->load('beneficiary_followup', 'user');

        return view('admin.beneficiaryOrderFollowups.show', compact('beneficiaryOrderFollowup'));
    }

    public function destroy(BeneficiaryOrderFollowup $beneficiaryOrderFollowup)
    {
        abort_if(Gate::denies('beneficiary_order_followup_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiaryOrderFollowup->delete();

        return back();
    }

    public function massDestroy(MassDestroyBeneficiaryOrderFollowupRequest $request)
    {
        $beneficiaryOrderFollowups = BeneficiaryOrderFollowup::find(request('ids'));

        foreach ($beneficiaryOrderFollowups as $beneficiaryOrderFollowup) {
            $beneficiaryOrderFollowup->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('beneficiary_order_followup_create') && Gate::denies('beneficiary_order_followup_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new BeneficiaryOrderFollowup();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
