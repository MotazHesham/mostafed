<?php

namespace App\Http\Controllers\Tenant\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBeneficiaryOrdersReportRequest;
use App\Http\Requests\StoreBeneficiaryOrdersReportRequest;
use App\Http\Requests\UpdateBeneficiaryOrdersReportRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BeneficiaryOrdersReportsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('beneficiary_orders_report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('tenant.admin.beneficiaryOrdersReports.index');
    }

    public function create()
    {
        abort_if(Gate::denies('beneficiary_orders_report_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('tenant.admin.beneficiaryOrdersReports.create');
    }

    public function store(StoreBeneficiaryOrdersReportRequest $request)
    {
        $beneficiaryOrdersReport = BeneficiaryOrdersReport::create($request->all());

        return redirect()->route('admin.beneficiary-orders-reports.index');
    }

    public function edit(BeneficiaryOrdersReport $beneficiaryOrdersReport)
    {
        abort_if(Gate::denies('beneficiary_orders_report_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('tenant.admin.beneficiaryOrdersReports.edit', compact('beneficiaryOrdersReport'));
    }

    public function update(UpdateBeneficiaryOrdersReportRequest $request, BeneficiaryOrdersReport $beneficiaryOrdersReport)
    {
        $beneficiaryOrdersReport->update($request->all());

        return redirect()->route('admin.beneficiary-orders-reports.index');
    }

    public function show(BeneficiaryOrdersReport $beneficiaryOrdersReport)
    {
        abort_if(Gate::denies('beneficiary_orders_report_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('tenant.admin.beneficiaryOrdersReports.show', compact('beneficiaryOrdersReport'));
    }

    public function destroy(BeneficiaryOrdersReport $beneficiaryOrdersReport)
    {
        abort_if(Gate::denies('beneficiary_orders_report_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiaryOrdersReport->delete();

        return back();
    }

    public function massDestroy(MassDestroyBeneficiaryOrdersReportRequest $request)
    {
        $beneficiaryOrdersReports = BeneficiaryOrdersReport::find(request('ids'));

        foreach ($beneficiaryOrdersReports as $beneficiaryOrdersReport) {
            $beneficiaryOrdersReport->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
