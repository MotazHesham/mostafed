<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBeneficiaryOrdersDoneRequest;
use App\Http\Requests\StoreBeneficiaryOrdersDoneRequest;
use App\Http\Requests\UpdateBeneficiaryOrdersDoneRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BeneficiaryOrdersDoneController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('beneficiary_orders_done_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.beneficiaryOrdersDones.index');
    }

    public function create()
    {
        abort_if(Gate::denies('beneficiary_orders_done_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.beneficiaryOrdersDones.create');
    }

    public function store(StoreBeneficiaryOrdersDoneRequest $request)
    {
        $beneficiaryOrdersDone = BeneficiaryOrdersDone::create($request->all());

        return redirect()->route('admin.beneficiary-orders-dones.index');
    }

    public function edit(BeneficiaryOrdersDone $beneficiaryOrdersDone)
    {
        abort_if(Gate::denies('beneficiary_orders_done_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.beneficiaryOrdersDones.edit', compact('beneficiaryOrdersDone'));
    }

    public function update(UpdateBeneficiaryOrdersDoneRequest $request, BeneficiaryOrdersDone $beneficiaryOrdersDone)
    {
        $beneficiaryOrdersDone->update($request->all());

        return redirect()->route('admin.beneficiary-orders-dones.index');
    }

    public function show(BeneficiaryOrdersDone $beneficiaryOrdersDone)
    {
        abort_if(Gate::denies('beneficiary_orders_done_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.beneficiaryOrdersDones.show', compact('beneficiaryOrdersDone'));
    }

    public function destroy(BeneficiaryOrdersDone $beneficiaryOrdersDone)
    {
        abort_if(Gate::denies('beneficiary_orders_done_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiaryOrdersDone->delete();

        return back();
    }

    public function massDestroy(MassDestroyBeneficiaryOrdersDoneRequest $request)
    {
        $beneficiaryOrdersDones = BeneficiaryOrdersDone::find(request('ids'));

        foreach ($beneficiaryOrdersDones as $beneficiaryOrdersDone) {
            $beneficiaryOrdersDone->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
