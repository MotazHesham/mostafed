<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBeneficiaryOrdersRejectedRequest;
use App\Http\Requests\StoreBeneficiaryOrdersRejectedRequest;
use App\Http\Requests\UpdateBeneficiaryOrdersRejectedRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BeneficiaryOrdersRejectedController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('beneficiary_orders_rejected_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.beneficiaryOrdersRejecteds.index');
    }

    public function create()
    {
        abort_if(Gate::denies('beneficiary_orders_rejected_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.beneficiaryOrdersRejecteds.create');
    }

    public function store(StoreBeneficiaryOrdersRejectedRequest $request)
    {
        $beneficiaryOrdersRejected = BeneficiaryOrdersRejected::create($request->all());

        return redirect()->route('admin.beneficiary-orders-rejecteds.index');
    }

    public function edit(BeneficiaryOrdersRejected $beneficiaryOrdersRejected)
    {
        abort_if(Gate::denies('beneficiary_orders_rejected_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.beneficiaryOrdersRejecteds.edit', compact('beneficiaryOrdersRejected'));
    }

    public function update(UpdateBeneficiaryOrdersRejectedRequest $request, BeneficiaryOrdersRejected $beneficiaryOrdersRejected)
    {
        $beneficiaryOrdersRejected->update($request->all());

        return redirect()->route('admin.beneficiary-orders-rejecteds.index');
    }

    public function show(BeneficiaryOrdersRejected $beneficiaryOrdersRejected)
    {
        abort_if(Gate::denies('beneficiary_orders_rejected_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.beneficiaryOrdersRejecteds.show', compact('beneficiaryOrdersRejected'));
    }

    public function destroy(BeneficiaryOrdersRejected $beneficiaryOrdersRejected)
    {
        abort_if(Gate::denies('beneficiary_orders_rejected_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiaryOrdersRejected->delete();

        return back();
    }

    public function massDestroy(MassDestroyBeneficiaryOrdersRejectedRequest $request)
    {
        $beneficiaryOrdersRejecteds = BeneficiaryOrdersRejected::find(request('ids'));

        foreach ($beneficiaryOrdersRejecteds as $beneficiaryOrdersRejected) {
            $beneficiaryOrdersRejected->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
