<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTaskBoardRequest;
use App\Http\Requests\StoreTaskBoardRequest;
use App\Http\Requests\UpdateTaskBoardRequest;
use App\Models\TaskBoard;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaskBoardsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('task_board_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $taskBoards = TaskBoard::all();

        return view('admin.taskBoards.index', compact('taskBoards'));
    }

    public function create()
    {
        abort_if(Gate::denies('task_board_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.taskBoards.create');
    }

    public function store(StoreTaskBoardRequest $request)
    {
        $taskBoard = TaskBoard::create($request->all());

        return redirect()->route('admin.task-boards.index');
    }

    public function edit(TaskBoard $taskBoard)
    {
        abort_if(Gate::denies('task_board_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.taskBoards.edit', compact('taskBoard'));
    }

    public function update(UpdateTaskBoardRequest $request, TaskBoard $taskBoard)
    {
        $taskBoard->update($request->all());

        return redirect()->route('admin.task-boards.index');
    }

    public function show(TaskBoard $taskBoard)
    {
        abort_if(Gate::denies('task_board_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $taskBoard->load('taskBoardTasks');

        return view('admin.taskBoards.show', compact('taskBoard'));
    }

    public function destroy(TaskBoard $taskBoard)
    {
        abort_if(Gate::denies('task_board_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $taskBoard->delete();

        return back();
    }

    public function massDestroy(MassDestroyTaskBoardRequest $request)
    {
        $taskBoards = TaskBoard::find(request('ids'));

        foreach ($taskBoards as $taskBoard) {
            $taskBoard->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
