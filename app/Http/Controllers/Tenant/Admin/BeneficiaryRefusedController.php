<?php

namespace App\Http\Controllers\Tenant\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBeneficiaryRefusedRequest;
use App\Http\Requests\StoreBeneficiaryRefusedRequest;
use App\Http\Requests\UpdateBeneficiaryRefusedRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BeneficiaryRefusedController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('beneficiary_refused_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('tenant.admin.beneficiaryRefuseds.index');
    }

    public function create()
    {
        abort_if(Gate::denies('beneficiary_refused_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('tenant.admin.beneficiaryRefuseds.create');
    }

    public function store(StoreBeneficiaryRefusedRequest $request)
    {
        $beneficiaryRefused = BeneficiaryRefused::create($request->all());

        return redirect()->route('admin.beneficiary-refuseds.index');
    }

    public function edit(BeneficiaryRefused $beneficiaryRefused)
    {
        abort_if(Gate::denies('beneficiary_refused_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('tenant.admin.beneficiaryRefuseds.edit', compact('beneficiaryRefused'));
    }

    public function update(UpdateBeneficiaryRefusedRequest $request, BeneficiaryRefused $beneficiaryRefused)
    {
        $beneficiaryRefused->update($request->all());

        return redirect()->route('admin.beneficiary-refuseds.index');
    }

    public function show(BeneficiaryRefused $beneficiaryRefused)
    {
        abort_if(Gate::denies('beneficiary_refused_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('tenant.admin.beneficiaryRefuseds.show', compact('beneficiaryRefused'));
    }

    public function destroy(BeneficiaryRefused $beneficiaryRefused)
    {
        abort_if(Gate::denies('beneficiary_refused_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiaryRefused->delete();

        return back();
    }

    public function massDestroy(MassDestroyBeneficiaryRefusedRequest $request)
    {
        $beneficiaryRefuseds = BeneficiaryRefused::find(request('ids'));

        foreach ($beneficiaryRefuseds as $beneficiaryRefused) {
            $beneficiaryRefused->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
