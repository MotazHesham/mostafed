@extends('tenant.layouts.master')
@section('content')
    @php
        $breadcrumbs = [
            ['title' => trans('cruds.generalSetting.title'), 'url' => '#'],
            [
                'title' => trans('global.list') . ' ' . trans('cruds.requiredDocument.title'),
                'url' => route('admin.required-documents.index'),
            ],
            ['title' => trans('global.edit') . ' ' . trans('cruds.requiredDocument.title_singular'), 'url' => '#'],
        ];
    @endphp
    @include('tenant.partials.breadcrumb')
    <div class="card">
        <div class="card-header p-3">
            @include('utilities.switchlang')
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.required-documents.update', [$requiredDocument->id]) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <input type="hidden" name="lang" value="{{ currentEditingLang() }}" id="">
                @include('utilities.form.text', [
                    'name' => 'name',
                    'label' => 'cruds.requiredDocument.fields.name',
                    'isRequired' => true,
                    'value' => $requiredDocument->getTranslation('name', currentEditingLang()),
                ])
                <div class="form-group">
                    <button class="btn btn-primary-light rounded-pill btn-wave" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
