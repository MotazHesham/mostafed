<?php

namespace App\Http\Controllers\Tenant\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tenant\Admin\MassDestroyBeneficiaryArchiveRequest;
use App\Http\Requests\Tenant\Admin\StoreBeneficiaryArchiveRequest;
use App\Http\Requests\Tenant\Admin\UpdateBeneficiaryArchiveRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BeneficiaryArchivesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('beneficiary_archive_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('tenant.admin.beneficiaryArchives.index');
    }

    public function create()
    {
        abort_if(Gate::denies('beneficiary_archive_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('tenant.admin.beneficiaryArchives.create');
    }

    public function store(StoreBeneficiaryArchiveRequest $request)
    {
        $beneficiaryArchive = BeneficiaryArchive::create($request->all());

        return redirect()->route('admin.beneficiary-archives.index');
    }

    public function edit(BeneficiaryArchive $beneficiaryArchive)
    {
        abort_if(Gate::denies('beneficiary_archive_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('tenant.admin.beneficiaryArchives.edit', compact('beneficiaryArchive'));
    }

    public function update(UpdateBeneficiaryArchiveRequest $request, BeneficiaryArchive $beneficiaryArchive)
    {
        $beneficiaryArchive->update($request->all());

        return redirect()->route('admin.beneficiary-archives.index');
    }

    public function show(BeneficiaryArchive $beneficiaryArchive)
    {
        abort_if(Gate::denies('beneficiary_archive_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('tenant.admin.beneficiaryArchives.show', compact('beneficiaryArchive'));
    }

    public function destroy(BeneficiaryArchive $beneficiaryArchive)
    {
        abort_if(Gate::denies('beneficiary_archive_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiaryArchive->delete();

        return back();
    }

    public function massDestroy(MassDestroyBeneficiaryArchiveRequest $request)
    {
        $beneficiaryArchives = BeneficiaryArchive::find(request('ids'));

        foreach ($beneficiaryArchives as $beneficiaryArchive) {
            $beneficiaryArchive->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
