@extends('tenant.layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.course.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-light mt-3 mb-3" href="{{ route('admin.courses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.id') }}
                        </th>
                        <td>
                            {{ $course->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.title') }}
                        </th>
                        <td>
                            {{ $course->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.short_description') }}
                        </th>
                        <td>
                            {{ $course->short_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.description') }}
                        </th>
                        <td>
                            {!! $course->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.attend_type') }}
                        </th>
                        <td>
                            {{ App\Models\Course::ATTEND_TYPE_SELECT[$course->attend_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.certificate') }}
                        </th>
                        <td>
                            {{ App\Models\Course::CERTIFICATE_SELECT[$course->certificate] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.trainer') }}
                        </th>
                        <td>
                            {{ $course->trainer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.start_at') }}
                        </th>
                        <td>
                            {{ $course->start_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.end_at') }}
                        </th>
                        <td>
                            {{ $course->end_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $course->published ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.photo') }}
                        </th>
                        <td>
                            @if($course->photo)
                                <a href="{{ $course->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $course->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-light mt-3 mb-3" href="{{ route('admin.courses.index') }}">
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
            <a class="nav-link" href="#course_course_students" role="tab" data-toggle="tab">
                {{ trans('cruds.courseStudent.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="course_course_students">
            @includeIf('admin.courses.relationships.courseCourseStudents', ['courseStudents' => $course->courseCourseStudents])
        </div>
    </div>
</div>

@endsection