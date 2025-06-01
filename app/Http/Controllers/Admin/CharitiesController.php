<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCharityRequest;
use App\Http\Requests\StoreCharityRequest;
use App\Http\Requests\UpdateCharityRequest;
use App\Models\Charity;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CharitiesController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('charity_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Charity::query()->select(sprintf('%s.*', (new Charity)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'charity_show';
                $editGate      = 'charity_edit';
                $deleteGate    = 'charity_delete';
                $crudRoutePart = 'charities';

                return view('partials.datatablesActions', compact(
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
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });
            $table->editColumn('logo', function ($row) {
                if ($photo = $row->logo) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('domain', function ($row) {
                return $row->domain ? $row->domain : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'logo']);

            return $table->make(true);
        }

        return view('admin.charities.index');
    }

    public function create()
    {
        abort_if(Gate::denies('charity_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.charities.create');
    }

    public function store(StoreCharityRequest $request)
    {
        $charity = Charity::create($request->all());

        if ($request->input('logo', false)) {
            $charity->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $charity->id]);
        }

        return redirect()->route('admin.charities.index');
    }

    public function edit(Charity $charity)
    {
        abort_if(Gate::denies('charity_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.charities.edit', compact('charity'));
    }

    public function update(UpdateCharityRequest $request, Charity $charity)
    {
        $charity->update($request->all());

        if ($request->input('logo', false)) {
            if (! $charity->logo || $request->input('logo') !== $charity->logo->file_name) {
                if ($charity->logo) {
                    $charity->logo->delete();
                }
                $charity->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($charity->logo) {
            $charity->logo->delete();
        }

        return redirect()->route('admin.charities.index');
    }

    public function show(Charity $charity)
    {
        abort_if(Gate::denies('charity_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.charities.show', compact('charity'));
    }

    public function destroy(Charity $charity)
    {
        abort_if(Gate::denies('charity_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $charity->delete();

        return back();
    }

    public function massDestroy(MassDestroyCharityRequest $request)
    {
        $charities = Charity::find(request('ids'));

        foreach ($charities as $charity) {
            $charity->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('charity_create') && Gate::denies('charity_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Charity();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
