@extends('tenant.layouts.master')
@section('content')

    <div class="row">
        <div class="col-xl-6">
            <div class="card custom-card">
                <div class="card-header justify-content-between align-items-center">
                    <div class="card-title">{{ trans('global.show') }} {{ trans('cruds.task.title_singular') }} #
                        {{ $task->id }}</div>
                </div>
                <div class="card-body">
                    <div class="d-flex gap-2 mb-4 align-items-center">
                        <div class="fs-15 fw-medium">{{ trans('cruds.task.fields.name') }} :</div>
                        <h5 class="fw-medium mb-0">
                            {{ $task->name }} <span class="badge bg-success-transparent fs-10 fw-medium">
                                {{ trans('cruds.task.fields.created_at') }} :
                                {{ $task->created_at->format('d-m-Y h:i A') }} </span>
                        </h5>
                    </div>
                    <div class="fs-15 fw-medium mb-2">{{ trans('cruds.task.fields.short_description') }} :</div>
                    <p class="text-muted mb-4">{{ $task->short_description }}</p>
                    <div class="row gy-3 mb-4">
                        <div class="col-xl-12">
                            <div class="fs-15 fw-medium mb-2">{{ trans('cruds.task.fields.description') }} :</div>
                            {!! $task->description !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card custom-card overflow-hidden">
                <div class="card-header">
                    <div class="card-title">
                        {{ trans('cruds.task.fields.attachment') }}
                    </div>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @if ($task->attachment)
                            @foreach ($task->attachment as $attachment)
                                <li class="list-group-item">
                                    <div class="d-flex align-items-center flex-wrap gap-2">
                                        <div class="lh-1">
                                            <span class="avatar avatar-rounded p-2 bg-light">
                                                @if ($attachment->type == 'image')
                                                    <img src="{{ $attachment->getUrl('thumb') }}" alt="">
                                                @else
                                                    <div class="avatar avatar-sm text-primary">
                                                        <i class="ti ti-file-description fs-24"></i>
                                                    </div>
                                                @endif
                                            </span>
                                        </div>
                                        <div class="flex-fill">
                                            <a href="{{ $attachment->getUrl() }}" target="_blank"><span
                                                    class="d-block fw-medium">{{ $attachment->name }}</span></a>
                                            <span
                                                class="d-block text-muted fs-12 fw-normal">{{ formatFileSize($attachment->size) }}</span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <li class="list-group-item">
                                <div class="d-flex align-items-center flex-wrap gap-2">
                                    <div class="flex-fill">
                                        <span
                                            class="d-block text-muted fs-12 fw-normal">{{ trans('global.no_data_found') }}</span>
                                    </div>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <ul class="nav nav-tabs tab-style-7 scaleX profile-settings-tab" id="myTab4" role="tablist">
                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link border border-dashed rounded-bottom-0 px-3 active" id="task-activity"
                                data-bs-toggle="tab" data-bs-target="#task-activity-pane" type="button" role="tab"
                                aria-controls="task-activity-pane" aria-selected="true">Task Activity</button>
                        </li> 
                    </ul>
                </div>
                <div class="card-body tab-content">
                    <div class="tab-pane show active overflow-hidden p-0 border-0" id="task-activity-pane" role="tabpanel"
                        aria-labelledby="task-activity" tabindex="0">
                        <ul class="list-unstyled profile-timeline mb-3">
                            <li>
                                <div>
                                    <span class="avatar avatar-sm avatar-rounded profile-timeline-avatar">
                                        <img src="{{ global_asset('assets/images/faces/7.jpg') }}" alt="Oliver">
                                    </span>
                                    <p class="text-muted mb-2">
                                        <span class="text-default">
                                            <span class="fw-medium">Oliver</span> shared a document with
                                            <span class="fw-medium">you</span>.
                                        </span>
                                        <span class="float-end fs-11 badge bg-light text-muted">14, June 2024 -
                                            10:45</span>
                                    </p>
                                    <p class="text-muted mb-2 fs-12">
                                        "We've finalized the project specifications and the client has approved the initial
                                        designs. Moving forward with the development phase."
                                    </p>
                                    <p class="profile-activity-media mb-0">
                                        <a aria-label="anchor" href="javascript:void(0);">
                                            <img src="{{ global_asset('assets/images/media/file-manager/3.png') }}"
                                                alt="Document">
                                        </a>
                                        <span class="fs-11 text-muted">512.34KB</span>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <span class="avatar avatar-sm bg-info avatar-rounded profile-timeline-avatar">
                                        S
                                    </span>
                                    <p class="text-muted mb-2">
                                        <span class="text-default">
                                            <span class="fw-medium">You</span> shared a post with 6 people, including
                                            <span class="fw-medium">Ava, Sophia, Mia, Lucas</span>.
                                        </span>
                                        <span class="float-end fs-11 badge bg-light text-muted">10, June 2024 -
                                            14:23</span>
                                    </p>
                                    <p class="profile-activity-media mb-2">
                                        <a aria-label="anchor" href="javascript:void(0);">
                                            <img src="{{ global_asset('assets/images/media/media-19.jpg') }}"
                                                alt="Post Image">
                                        </a>
                                    </p>
                                    <div>
                                        <div class="avatar-list-stacked">
                                            <span class="avatar avatar-xs avatar-rounded">
                                                <img src="{{ global_asset('assets/images/faces/3.jpg') }}" alt="User 1">
                                            </span>
                                            <span class="avatar avatar-xs avatar-rounded">
                                                <img src="{{ global_asset('assets/images/faces/9.jpg') }}"
                                                    alt="User 2">
                                            </span>
                                            <span class="avatar avatar-xs avatar-rounded">
                                                <img src="{{ global_asset('assets/images/faces/12.jpg') }}"
                                                    alt="User 3">
                                            </span>
                                            <span class="avatar avatar-xs avatar-rounded">
                                                <img src="{{ global_asset('assets/images/faces/14.jpg') }}"
                                                    alt="User 4">
                                            </span>
                                            4 People reacted
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <span class="avatar avatar-sm avatar-rounded profile-timeline-avatar">
                                        <img src="{{ global_asset('assets/images/faces/5.jpg') }}" alt="Liam">
                                    </span>
                                    <p class="text-muted mb-2">
                                        <span class="text-default">
                                            <span class="fw-medium">Liam</span> commented on your post.
                                        </span>
                                        <span class="float-end fs-11 badge bg-light text-muted">12, June 2024 -
                                            09:15</span>
                                    </p>
                                    <p class="text-muted mb-0 fs-12">
                                        "The updates to the project plan look great. I'll review the milestones and get back
                                        to you by end of day."
                                    </p>
                                </div>
                            </li>
                        </ul>
                        <div class="p-3 mt-2 bg-light rounded">
                            <div class="d-sm-flex align-items-center lh-1">
                                <div class="me-sm-3 mb-2 mb-sm-0">
                                    <span class="avatar avatar-md avatar-rounded">
                                        <img src="{{ global_asset('assets/images/faces/9.jpg') }}" alt="">
                                    </span>
                                </div>
                                <div class="flex-fill me-sm-2">
                                    <div class="input-group">
                                        <input type="text" class="form-control shadow-none border"
                                            placeholder="Post Anything"
                                            aria-label="Recipient's username with two button addons">
                                        <button type="button" aria-label="button"
                                            class="btn btn-outline-light border btn-wave"><i
                                                class="bi bi-emoji-smile"></i></button>
                                        <button type="button" aria-label="button"
                                            class="btn btn-outline-light border btn-wave"><i
                                                class="bi bi-paperclip"></i></button>
                                        <button type="button" aria-label="button"
                                            class="btn btn-outline-light border btn-wave"><i
                                                class="bi bi-camera"></i></button>
                                        <button class="btn btn-primary btn-wave" type="button">Post</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="card custom-card overflow-hidden">
                <div class="card-header">
                    <div class="card-title">
                        {{ trans('cruds.task.show.information') }}
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <tbody>
                                <tr>
                                    <td><span class="fw-medium">{{ trans('cruds.task.fields.id') }} :</span></td>
                                    <td># {{ $task->id }}</td>
                                </tr>
                                <tr>
                                    <td><span class="fw-medium">{{ trans('cruds.task.fields.tag') }} :</span></td>
                                    <td>
                                        @foreach ($task->tags as $tag)
                                            <span class="{{ $tag->badge_class }}">{{ $tag->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="fw-medium">{{ trans('cruds.task.fields.task_board') }} :</span></td>
                                    <td>
                                        {{ $task->task_board->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="fw-medium">{{ trans('cruds.task.fields.assigned_by') }} :</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="me-2 lh-1">
                                                @include('utilities.user-avatar', [
                                                    'user' => $task->assigned_by,
                                                ])
                                            </div>
                                            <span class="d-block fs-14 fw-medium">{{ $task->assigned_by->name }}</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="fw-medium">{{ trans('cruds.task.fields.status') }} :</span></td>
                                    <td>
                                        <span
                                            class="fw-medium text-{{ $task->status->badge_class ?? '' }}">{{ $task->status->name ?? '' }}</span>
                                    </td>
                                </tr>
                                @if ($task->task_priority)
                                    <tr>
                                        <td><span class="fw-medium">{{ trans('cruds.task.fields.task_priority') }}
                                                :</span></td>
                                        <td>
                                            <span
                                                class="{{ $task->task_priority->badge_class }}">{{ $task->task_priority->name }}</span>
                                        </td>
                                    </tr>
                                @endif
                                <tr>
                                    <td><span class="fw-medium">{{ trans('cruds.task.fields.due_date') }} :</span></td>
                                    <td>
                                        {{ $task->due_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="fw-medium">{{ trans('cruds.task.fields.assigned_to') }} :</span></td>
                                    <td>
                                        <div class="avatar-list-stacked">
                                            @foreach ($task->assigned_tos as $assigned_to)
                                                @include('utilities.user-avatar', ['user' => $assigned_to])
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="fw-medium">{{ trans('cruds.task.fields.updated_at') }} :</span></td>
                                    <td>
                                        <span class="text-success fw-medium">{{ $task->updated_at->format('d-m-Y h:i A') }}</span> 
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
