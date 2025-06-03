<?php

namespace App\Http\Controllers\Tenant\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBeneficiaryReportRequest;
use App\Http\Requests\StoreBeneficiaryReportRequest;
use App\Http\Requests\UpdateBeneficiaryReportRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BeneficiaryReportController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('beneficiary_report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('tenant.admin.beneficiaryReports.index');
    }

    public function create()
    {
        abort_if(Gate::denies('beneficiary_report_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('tenant.admin.beneficiaryReports.create');
    }

    public function store(StoreBeneficiaryReportRequest $request)
    {
        $beneficiaryReport = BeneficiaryReport::create($request->all());

        return redirect()->route('admin.beneficiary-reports.index');
    }

    public function edit(BeneficiaryReport $beneficiaryReport)
    {
        abort_if(Gate::denies('beneficiary_report_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('tenant.admin.beneficiaryReports.edit', compact('beneficiaryReport'));
    }

    public function update(UpdateBeneficiaryReportRequest $request, BeneficiaryReport $beneficiaryReport)
    {
        $beneficiaryReport->update($request->all());

        return redirect()->route('admin.beneficiary-reports.index');
    }

    public function show(BeneficiaryReport $beneficiaryReport)
    {
        abort_if(Gate::denies('beneficiary_report_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('tenant.admin.beneficiaryReports.show', compact('beneficiaryReport'));
    }

    public function destroy(BeneficiaryReport $beneficiaryReport)
    {
        abort_if(Gate::denies('beneficiary_report_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiaryReport->delete();

        return back();
    }

    public function massDestroy(MassDestroyBeneficiaryReportRequest $request)
    {
        $beneficiaryReports = BeneficiaryReport::find(request('ids'));

        foreach ($beneficiaryReports as $beneficiaryReport) {
            $beneficiaryReport->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
