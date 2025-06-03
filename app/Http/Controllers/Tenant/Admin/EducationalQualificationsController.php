<?php

namespace App\Http\Controllers\Tenant\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEducationalQualificationRequest;
use App\Http\Requests\StoreEducationalQualificationRequest;
use App\Http\Requests\UpdateEducationalQualificationRequest;
use App\Models\EducationalQualification;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class EducationalQualificationsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('educational_qualification_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = EducationalQualification::query()->select(sprintf('%s.*', (new EducationalQualification)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'educational_qualification_show';
                $editGate      = 'educational_qualification_edit';
                $deleteGate    = 'educational_qualification_delete';
                $crudRoutePart = 'educational-qualifications';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('tenant.admin.educationalQualifications.index');
    }

    public function create()
    {
        abort_if(Gate::denies('educational_qualification_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('tenant.admin.educationalQualifications.create');
    }

    public function store(StoreEducationalQualificationRequest $request)
    {
        $educationalQualification = EducationalQualification::create($request->all());

        return redirect()->route('admin.educational-qualifications.index');
    }

    public function edit(EducationalQualification $educationalQualification)
    {
        abort_if(Gate::denies('educational_qualification_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('tenant.admin.educationalQualifications.edit', compact('educationalQualification'));
    }

    public function update(UpdateEducationalQualificationRequest $request, EducationalQualification $educationalQualification)
    {
        $educationalQualification->update($request->all());

        return redirect()->route('admin.educational-qualifications.index');
    }

    public function show(EducationalQualification $educationalQualification)
    {
        abort_if(Gate::denies('educational_qualification_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('tenant.admin.educationalQualifications.show', compact('educationalQualification'));
    }

    public function destroy(EducationalQualification $educationalQualification)
    {
        abort_if(Gate::denies('educational_qualification_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $educationalQualification->delete();

        return back();
    }

    public function massDestroy(MassDestroyEducationalQualificationRequest $request)
    {
        $educationalQualifications = EducationalQualification::find(request('ids'));

        foreach ($educationalQualifications as $educationalQualification) {
            $educationalQualification->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
