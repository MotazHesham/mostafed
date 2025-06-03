@extends('tenant.layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.courseStudent.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-light mt-3 mb-3" href="{{ route('admin.course-students.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.id') }}
                        </th>
                        <td>
                            {{ $courseStudent->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.course') }}
                        </th>
                        <td>
                            {{ $courseStudent->course->trainer ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.beneficiary') }}
                        </th>
                        <td>
                            {{ $courseStudent->beneficiary->dob ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.beneficiary_family') }}
                        </th>
                        <td>
                            {{ $courseStudent->beneficiary_family->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.note') }}
                        </th>
                        <td>
                            {{ $courseStudent->note }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.certificate') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $courseStudent->certificate ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.transportation') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $courseStudent->transportation ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.prev_experience') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $courseStudent->prev_experience ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.prev_courses') }}
                        </th>
                        <td>
                            {{ $courseStudent->prev_courses }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.attend_same_course_before') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $courseStudent->attend_same_course_before ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-light mt-3 mb-3" href="{{ route('admin.course-students.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection