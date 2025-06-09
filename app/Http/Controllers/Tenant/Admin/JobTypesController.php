<?php

namespace App\Http\Controllers\Tenant\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tenant\Admin\MassDestroyJobTypeRequest;
use App\Http\Requests\Tenant\Admin\StoreJobTypeRequest;
use App\Http\Requests\Tenant\Admin\UpdateJobTypeRequest;
use App\Models\JobType;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class JobTypesController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('job_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = JobType::query()->select(sprintf('%s.*', (new JobType)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'job_type_show';
                $editGate      = 'job_type_edit';
                $deleteGate    = 'job_type_delete';
                $crudRoutePart = 'job-types';

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

        return view('tenant.admin.jobTypes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('job_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('tenant.admin.jobTypes.create');
    }

    public function store(StoreJobTypeRequest $request)
    {
        $jobType = JobType::create($request->all());

        return redirect()->route('admin.job-types.index');
    }

    public function edit(JobType $jobType)
    {
        abort_if(Gate::denies('job_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('tenant.admin.jobTypes.edit', compact('jobType'));
    }

    public function update(UpdateJobTypeRequest $request, JobType $jobType)
    {
        $jobType->update($request->all());

        return redirect()->route('admin.job-types.index');
    }

    public function show(JobType $jobType)
    {
        abort_if(Gate::denies('job_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('tenant.admin.jobTypes.show', compact('jobType'));
    }

    public function destroy(JobType $jobType)
    {
        abort_if(Gate::denies('job_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobType->delete();

        return back();
    }

    public function massDestroy(MassDestroyJobTypeRequest $request)
    {
        $jobTypes = JobType::find(request('ids'));

        foreach ($jobTypes as $jobType) {
            $jobType->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
