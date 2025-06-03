<?php

namespace App\Http\Controllers\Tenant\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLetterArchiveRequest;
use App\Http\Requests\StoreLetterArchiveRequest;
use App\Http\Requests\UpdateLetterArchiveRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LetterArchivesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('letter_archive_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('tenant.admin.letterArchives.index');
    }

    public function create()
    {
        abort_if(Gate::denies('letter_archive_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('tenant.admin.letterArchives.create');
    }

    public function store(StoreLetterArchiveRequest $request)
    {
        $letterArchive = LetterArchive::create($request->all());

        return redirect()->route('admin.letter-archives.index');
    }

    public function edit(LetterArchive $letterArchive)
    {
        abort_if(Gate::denies('letter_archive_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('tenant.admin.letterArchives.edit', compact('letterArchive'));
    }

    public function update(UpdateLetterArchiveRequest $request, LetterArchive $letterArchive)
    {
        $letterArchive->update($request->all());

        return redirect()->route('admin.letter-archives.index');
    }

    public function show(LetterArchive $letterArchive)
    {
        abort_if(Gate::denies('letter_archive_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('tenant.admin.letterArchives.show', compact('letterArchive'));
    }

    public function destroy(LetterArchive $letterArchive)
    {
        abort_if(Gate::denies('letter_archive_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $letterArchive->delete();

        return back();
    }

    public function massDestroy(MassDestroyLetterArchiveRequest $request)
    {
        $letterArchives = LetterArchive::find(request('ids'));

        foreach ($letterArchives as $letterArchive) {
            $letterArchive->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
