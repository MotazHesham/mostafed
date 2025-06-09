<?php

namespace App\Http\Controllers\Tenant\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\Tenant\Admin\MassDestroyTaskRequest;
use App\Http\Requests\Tenant\Admin\StoreTaskRequest;
use App\Http\Requests\Tenant\Admin\UpdateTaskRequest;
use App\Models\Task;
use App\Models\TaskBoard;
use App\Models\TaskPriority;
use App\Models\TaskStatus;
use App\Models\TaskTag;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    use MediaUploadingTrait;

    public function updateStatus(Request $request)
    { 
        try {
            DB::beginTransaction();
            
            // Update the main task's status
            $task = Task::findOrFail($request->task_id);
            $task->status_id = $request->status_id;
            $task->save();
            
            // Update order for all tasks in the status
            foreach ($request->order_data as $orderItem) {
                Task::where('id', $orderItem['id'])
                    ->update(['ordering' => $orderItem['order']]);
            }
            
            DB::commit();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function index()
    {
        abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tasks = Task::with(['status', 'task_priority', 'tags', 'assigned_tos', 'task_board', 'assigned_by', 'media'])->get();

        return view('tenant.admin.tasks.index', compact('tasks'));
    }

    public function create()
    {
        abort_if(Gate::denies('task_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statuses = TaskStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $task_priorities = TaskPriority::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tags = TaskTag::pluck('name', 'id');

        $assigned_tos = User::pluck('name', 'id');

        $task_boards = TaskBoard::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $assigned_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('tenant.admin.tasks.create', compact('assigned_bies', 'assigned_tos', 'statuses', 'tags', 'task_boards', 'task_priorities'));
    }

    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->all());
        $task->tags()->sync($request->input('tags', []));
        $task->assigned_tos()->sync($request->input('assigned_tos', []));
        foreach ($request->input('attachment', []) as $file) {
            $task->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('attachment');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $task->id]);
        }

        if($request->ajax()){
            return response()->json([
                'html' => view('tenant.admin.taskBoards.partials.task-card', ['task' => $task, 'taskStatus' => $task->status])->render(),
                'append' => '#task-status-' . $task->status_id . '-tasks-draggable',
                'message' => trans('global.flash.created', ['title' => trans('cruds.task.title_singular')])
            ]);
        }

        return redirect()->route('admin.tasks.index');
    }

    public function edit(Task $task)
    {
        abort_if(Gate::denies('task_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statuses = TaskStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $task_priorities = TaskPriority::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tags = TaskTag::pluck('name', 'id');

        $assigned_tos = User::pluck('name', 'id');

        $task_boards = TaskBoard::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $assigned_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $task->load('status', 'task_priority', 'tags', 'assigned_tos', 'task_board', 'assigned_by');

        return view('tenant.admin.tasks.edit', compact('assigned_bies', 'assigned_tos', 'statuses', 'tags', 'task', 'task_boards', 'task_priorities'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->all());
        $task->tags()->sync($request->input('tags', []));
        $task->assigned_tos()->sync($request->input('assigned_tos', []));
        if (count($task->attachment) > 0) {
            foreach ($task->attachment as $media) {
                if (! in_array($media->file_name, $request->input('attachment', []))) {
                    $media->delete();
                }
            }
        }
        $media = $task->attachment->pluck('file_name')->toArray();
        foreach ($request->input('attachment', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $task->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('attachment');
            }
        }

        if($request->ajax()){
            return response()->json([
                'html' => view('tenant.admin.taskBoards.partials.task-card', ['task' => $task, 'taskStatus' => $task->status])->render(),
                'replace' => '[data-task-id="' . $task->id . '"]',
                'message' => trans('global.flash.updated', ['title' => trans('cruds.task.title_singular')])
            ]);
        }

        return redirect()->route('admin.tasks.index');
    }

    public function show(Task $task)
    {
        abort_if(Gate::denies('task_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $task->load('status', 'task_priority', 'tags', 'assigned_tos', 'task_board', 'assigned_by');

        return view('tenant.admin.tasks.show', compact('task'));
    }

    public function destroy(Task $task)
    {
        abort_if(Gate::denies('task_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $task->delete();

        return back();
    }

    public function massDestroy(MassDestroyTaskRequest $request)
    {
        $tasks = Task::find(request('ids'));

        foreach ($tasks as $task) {
            $task->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('task_create') && Gate::denies('task_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Task();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
