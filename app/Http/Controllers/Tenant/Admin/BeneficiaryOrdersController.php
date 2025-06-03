<?php

namespace App\Http\Controllers\Tenant\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBeneficiaryOrderRequest;
use App\Http\Requests\StoreBeneficiaryOrderRequest;
use App\Http\Requests\UpdateBeneficiaryOrderRequest;
use App\Models\Beneficiary;
use App\Models\BeneficiaryOrder;
use App\Models\Service;
use App\Models\ServiceStatus;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BeneficiaryOrdersController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('beneficiary_order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = BeneficiaryOrder::with(['beneficiary', 'service', 'status', 'specialist'])->select(sprintf('%s.*', (new BeneficiaryOrder)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'beneficiary_order_show';
                $editGate      = 'beneficiary_order_edit';
                $deleteGate    = 'beneficiary_order_delete';
                $crudRoutePart = 'beneficiary-orders';

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

            $table->editColumn('service_type', function ($row) {
                return $row->service_type ? BeneficiaryOrder::SERVICE_TYPE_SELECT[$row->service_type] : '';
            });
            $table->addColumn('service_type', function ($row) {
                return $row->service ? $row->service->type : '';
            });

            $table->editColumn('service.title', function ($row) {
                return $row->service ? (is_string($row->service) ? $row->service : $row->service->title) : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });
            $table->editColumn('attachment', function ($row) {
                return $row->attachment ? '<a href="' . $row->attachment->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->addColumn('status_name', function ($row) {
                return $row->status ? $row->status->name : '';
            });

            $table->editColumn('accept_status', function ($row) {
                return $row->accept_status ? BeneficiaryOrder::ACCEPT_STATUS_RADIO[$row->accept_status] : '';
            });
            $table->editColumn('done', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->done ? 'checked' : null) . '>';
            });
            $table->addColumn('specialist_name', function ($row) {
                return $row->specialist ? $row->specialist->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'beneficiary', 'service', 'attachment', 'status', 'done', 'specialist']);

            return $table->make(true);
        }

        return view('tenant.admin.beneficiaryOrders.index');
    }

    public function create()
    {
        abort_if(Gate::denies('beneficiary_order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiaries = Beneficiary::pluck('dob', 'id')->prepend(trans('global.pleaseSelect'), '');

        $services = Service::pluck('type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = ServiceStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $specialists = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('tenant.admin.beneficiaryOrders.create', compact('beneficiaries', 'services', 'specialists', 'statuses'));
    }

    public function store(StoreBeneficiaryOrderRequest $request)
    {
        $beneficiaryOrder = BeneficiaryOrder::create($request->all());

        if ($request->input('attachment', false)) {
            $beneficiaryOrder->addMedia(storage_path('tmp/uploads/' . basename($request->input('attachment'))))->toMediaCollection('attachment');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $beneficiaryOrder->id]);
        }

        return redirect()->route('admin.beneficiary-orders.index');
    }

    public function edit(BeneficiaryOrder $beneficiaryOrder)
    {
        abort_if(Gate::denies('beneficiary_order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiaries = Beneficiary::pluck('dob', 'id')->prepend(trans('global.pleaseSelect'), '');

        $services = Service::pluck('type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = ServiceStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $specialists = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $beneficiaryOrder->load('beneficiary', 'service', 'status', 'specialist');

        return view('tenant.admin.beneficiaryOrders.edit', compact('beneficiaries', 'beneficiaryOrder', 'services', 'specialists', 'statuses'));
    }

    public function update(UpdateBeneficiaryOrderRequest $request, BeneficiaryOrder $beneficiaryOrder)
    {
        $beneficiaryOrder->update($request->all());

        if ($request->input('attachment', false)) {
            if (! $beneficiaryOrder->attachment || $request->input('attachment') !== $beneficiaryOrder->attachment->file_name) {
                if ($beneficiaryOrder->attachment) {
                    $beneficiaryOrder->attachment->delete();
                }
                $beneficiaryOrder->addMedia(storage_path('tmp/uploads/' . basename($request->input('attachment'))))->toMediaCollection('attachment');
            }
        } elseif ($beneficiaryOrder->attachment) {
            $beneficiaryOrder->attachment->delete();
        }

        return redirect()->route('admin.beneficiary-orders.index');
    }

    public function show(BeneficiaryOrder $beneficiaryOrder)
    {
        abort_if(Gate::denies('beneficiary_order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiaryOrder->load('beneficiary', 'service', 'status', 'specialist', 'beneficiaryFollowupBeneficiaryOrderFollowups');

        return view('tenant.admin.beneficiaryOrders.show', compact('beneficiaryOrder'));
    }

    public function destroy(BeneficiaryOrder $beneficiaryOrder)
    {
        abort_if(Gate::denies('beneficiary_order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiaryOrder->delete();

        return back();
    }

    public function massDestroy(MassDestroyBeneficiaryOrderRequest $request)
    {
        $beneficiaryOrders = BeneficiaryOrder::find(request('ids'));

        foreach ($beneficiaryOrders as $beneficiaryOrder) {
            $beneficiaryOrder->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('beneficiary_order_create') && Gate::denies('beneficiary_order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new BeneficiaryOrder();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
