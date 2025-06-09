<?php

namespace App\Http\Controllers\Tenant\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tenant\Admin\MassDestroyRequiredDocumentRequest;
use App\Http\Requests\Tenant\Admin\StoreRequiredDocumentRequest;
use App\Http\Requests\Tenant\Admin\UpdateRequiredDocumentRequest;
use App\Models\RequiredDocument;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RequiredDocumentsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('required_document_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = RequiredDocument::query()->select(sprintf('%s.*', (new RequiredDocument)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'required_document_show';
                $editGate      = 'required_document_edit';
                $deleteGate    = 'required_document_delete';
                $crudRoutePart = 'required-documents';

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

        return view('tenant.admin.requiredDocuments.index');
    }

    public function create()
    {
        abort_if(Gate::denies('required_document_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('tenant.admin.requiredDocuments.create');
    }

    public function store(StoreRequiredDocumentRequest $request)
    {
        $requiredDocument = RequiredDocument::create($request->all());

        return redirect()->route('admin.required-documents.index');
    }

    public function edit(RequiredDocument $requiredDocument)
    {
        abort_if(Gate::denies('required_document_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('tenant.admin.requiredDocuments.edit', compact('requiredDocument'));
    }

    public function update(UpdateRequiredDocumentRequest $request, RequiredDocument $requiredDocument)
    { 
        $requiredDocument->setTranslation('name', $request->lang, $request->name);
        $requiredDocument->save();

        return redirect()->route('admin.required-documents.index');
    }

    public function show(RequiredDocument $requiredDocument)
    {
        abort_if(Gate::denies('required_document_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('tenant.admin.requiredDocuments.show', compact('requiredDocument'));
    }

    public function destroy(RequiredDocument $requiredDocument)
    {
        abort_if(Gate::denies('required_document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requiredDocument->delete();

        return back();
    }

    public function massDestroy(MassDestroyRequiredDocumentRequest $request)
    {
        $requiredDocuments = RequiredDocument::find(request('ids'));

        foreach ($requiredDocuments as $requiredDocument) {
            $requiredDocument->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
