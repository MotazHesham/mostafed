<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBeneficiaryUnCompletedRequest;
use App\Http\Requests\StoreBeneficiaryUnCompletedRequest;
use App\Http\Requests\UpdateBeneficiaryUnCompletedRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BeneficiaryUnCompletedController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('beneficiary_un_completed_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.beneficiaryUnCompleteds.index');
    }

    public function create()
    {
        abort_if(Gate::denies('beneficiary_un_completed_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.beneficiaryUnCompleteds.create');
    }

    public function store(StoreBeneficiaryUnCompletedRequest $request)
    {
        $beneficiaryUnCompleted = BeneficiaryUnCompleted::create($request->all());

        return redirect()->route('admin.beneficiary-un-completeds.index');
    }

    public function edit(BeneficiaryUnCompleted $beneficiaryUnCompleted)
    {
        abort_if(Gate::denies('beneficiary_un_completed_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.beneficiaryUnCompleteds.edit', compact('beneficiaryUnCompleted'));
    }

    public function update(UpdateBeneficiaryUnCompletedRequest $request, BeneficiaryUnCompleted $beneficiaryUnCompleted)
    {
        $beneficiaryUnCompleted->update($request->all());

        return redirect()->route('admin.beneficiary-un-completeds.index');
    }

    public function show(BeneficiaryUnCompleted $beneficiaryUnCompleted)
    {
        abort_if(Gate::denies('beneficiary_un_completed_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.beneficiaryUnCompleteds.show', compact('beneficiaryUnCompleted'));
    }

    public function destroy(BeneficiaryUnCompleted $beneficiaryUnCompleted)
    {
        abort_if(Gate::denies('beneficiary_un_completed_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiaryUnCompleted->delete();

        return back();
    }

    public function massDestroy(MassDestroyBeneficiaryUnCompletedRequest $request)
    {
        $beneficiaryUnCompleteds = BeneficiaryUnCompleted::find(request('ids'));

        foreach ($beneficiaryUnCompleteds as $beneficiaryUnCompleted) {
            $beneficiaryUnCompleted->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
