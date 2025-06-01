<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFrontAchievementRequest;
use App\Http\Requests\StoreFrontAchievementRequest;
use App\Http\Requests\UpdateFrontAchievementRequest;
use App\Models\FrontAchievement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class FrontAchievementController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('front_achievement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = FrontAchievement::query()->select(sprintf('%s.*', (new FrontAchievement)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'front_achievement_show';
                $editGate      = 'front_achievement_edit';
                $deleteGate    = 'front_achievement_delete';
                $crudRoutePart = 'front-achievements';

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
            $table->editColumn('icon', function ($row) {
                return $row->icon ? $row->icon : '';
            });
            $table->editColumn('icon_color', function ($row) {
                return $row->icon_color ? $row->icon_color : '';
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('achievement', function ($row) {
                return $row->achievement ? $row->achievement : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.frontAchievements.index');
    }

    public function create()
    {
        abort_if(Gate::denies('front_achievement_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.frontAchievements.create');
    }

    public function store(StoreFrontAchievementRequest $request)
    {
        $frontAchievement = FrontAchievement::create($request->all());

        return redirect()->route('admin.front-achievements.index');
    }

    public function edit(FrontAchievement $frontAchievement)
    {
        abort_if(Gate::denies('front_achievement_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.frontAchievements.edit', compact('frontAchievement'));
    }

    public function update(UpdateFrontAchievementRequest $request, FrontAchievement $frontAchievement)
    {
        $frontAchievement->update($request->all());

        return redirect()->route('admin.front-achievements.index');
    }

    public function show(FrontAchievement $frontAchievement)
    {
        abort_if(Gate::denies('front_achievement_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.frontAchievements.show', compact('frontAchievement'));
    }

    public function destroy(FrontAchievement $frontAchievement)
    {
        abort_if(Gate::denies('front_achievement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $frontAchievement->delete();

        return back();
    }

    public function massDestroy(MassDestroyFrontAchievementRequest $request)
    {
        $frontAchievements = FrontAchievement::find(request('ids'));

        foreach ($frontAchievements as $frontAchievement) {
            $frontAchievement->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
