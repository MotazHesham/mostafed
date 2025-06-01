<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBeneficiaryOrdersArchiveRequest;
use App\Http\Requests\StoreBeneficiaryOrdersArchiveRequest;
use App\Http\Requests\UpdateBeneficiaryOrdersArchiveRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BeneficiaryOrdersArchivesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('beneficiary_orders_archive_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.beneficiaryOrdersArchives.index');
    }

    public function create()
    {
        abort_if(Gate::denies('beneficiary_orders_archive_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.beneficiaryOrdersArchives.create');
    }

    public function store(StoreBeneficiaryOrdersArchiveRequest $request)
    {
        $beneficiaryOrdersArchive = BeneficiaryOrdersArchive::create($request->all());

        return redirect()->route('admin.beneficiary-orders-archives.index');
    }

    public function edit(BeneficiaryOrdersArchive $beneficiaryOrdersArchive)
    {
        abort_if(Gate::denies('beneficiary_orders_archive_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.beneficiaryOrdersArchives.edit', compact('beneficiaryOrdersArchive'));
    }

    public function update(UpdateBeneficiaryOrdersArchiveRequest $request, BeneficiaryOrdersArchive $beneficiaryOrdersArchive)
    {
        $beneficiaryOrdersArchive->update($request->all());

        return redirect()->route('admin.beneficiary-orders-archives.index');
    }

    public function show(BeneficiaryOrdersArchive $beneficiaryOrdersArchive)
    {
        abort_if(Gate::denies('beneficiary_orders_archive_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.beneficiaryOrdersArchives.show', compact('beneficiaryOrdersArchive'));
    }

    public function destroy(BeneficiaryOrdersArchive $beneficiaryOrdersArchive)
    {
        abort_if(Gate::denies('beneficiary_orders_archive_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiaryOrdersArchive->delete();

        return back();
    }

    public function massDestroy(MassDestroyBeneficiaryOrdersArchiveRequest $request)
    {
        $beneficiaryOrdersArchives = BeneficiaryOrdersArchive::find(request('ids'));

        foreach ($beneficiaryOrdersArchives as $beneficiaryOrdersArchive) {
            $beneficiaryOrdersArchive->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
