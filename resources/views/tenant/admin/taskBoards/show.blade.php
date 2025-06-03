@extends('tenant.layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.taskBoard.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-light mt-3 mb-3" href="{{ route('admin.task-boards.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.taskBoard.fields.id') }}
                        </th>
                        <td>
                            {{ $taskBoard->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taskBoard.fields.name') }}
                        </th>
                        <td>
                            {{ $taskBoard->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-light mt-3 mb-3" href="{{ route('admin.task-boards.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#task_board_tasks" role="tab" data-toggle="tab">
                {{ trans('cruds.task.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="task_board_tasks">
            @includeIf('admin.taskBoards.relationships.taskBoardTasks', ['tasks' => $taskBoard->taskBoardTasks])
        </div>
    </div>
</div>

@endsection