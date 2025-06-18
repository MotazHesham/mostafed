<?php

namespace App\Http\Controllers\Tenant\Beneficiary;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait; 
use App\Http\Requests\Tenant\Beneficiary\StoreBeneficiaryOrderRequest;
use App\Http\Requests\Tenant\Beneficiary\UpdateBeneficiaryOrderRequest;
use App\Models\Beneficiary;
use App\Models\BeneficiaryOrder;
use App\Models\CustomActivityLog;
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
        $beneficiary = auth()->user()->beneficiary;
        if ($request->ajax()) {
            $status = $request->status;
            $query = BeneficiaryOrder::with(['service', 'status', 'specialist'])->where('beneficiary_id', $beneficiary->id); 
            $query->select(sprintf('%s.*', (new BeneficiaryOrder)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) use ($status) {
                $viewGate      = true;
                $editGate      = true;
                $deleteGate    = true;
                $crudRoutePart = 'beneficiary.beneficiary-orders'; 
                return view('tenant.partials.datatablesActions-nopermission', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row', 
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            }); 

            $table->editColumn('service_type', function ($row) {
                return $row->service_type ? Service::TYPE_SELECT[$row->service_type] : '';
            });
            $table->addColumn('service_type', function ($row) {
                return $row->service ? $row->service->type : '';
            });

            $table->editColumn('service.title', function ($row) {
                return $row->service ? (is_string($row->service) ? $row->service : $row->service->title) : '';
            });
            $table->editColumn('attachment', function ($row) {
                return $row->attachment ? '<a href="' . $row->attachment->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->addColumn('status_name', function ($row) {
                return $row->status ? '<span class="badge bg-'. $row->status->badge_class . '-transparent">' . $row->status->name . '</span>' : '';
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

            $table->rawColumns(['actions', 'placeholder',  'service', 'attachment', 'status', 'status_name', 'specialist']);

            return $table->make(true);
        }

        return view('tenant.beneficiary.orders.index');
    }

    public function create()
    {    
        return view('tenant.beneficiary.orders.create');
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

        return redirect()->route('beneficiary.beneficiary-orders.index');
    }

    public function edit(BeneficiaryOrder $beneficiaryOrder)
    {  

        $beneficiaryOrder->load('beneficiary', 'service', 'status', 'specialist');

        return view('tenant.beneficiary.orders.edit', compact('beneficiaryOrder'));
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

        return redirect()->route('beneficiary.beneficiary-orders.index');
    }

    public function show(BeneficiaryOrder $beneficiaryOrder)
    { 
        $beneficiaryOrder->load('beneficiary', 'service', 'status', 'specialist', 'beneficiaryOrderFollowups.user');
        return view('tenant.beneficiary.orders.show', compact('beneficiaryOrder'));
    }

    public function destroy(BeneficiaryOrder $beneficiaryOrder)
    { 
        $beneficiaryOrder->delete();

        return back();
    } 

    public function storeCKEditorImages(Request $request)
    { 
        $model         = new BeneficiaryOrder();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
