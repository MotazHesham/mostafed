@extends('tenant.layouts.master')
@section('content')
    @php
        $breadcrumbs = [
            ['title' => trans('cruds.generalSetting.title'), 'url' => '#'],
            [
                'title' => trans('global.list') . ' ' . trans('cruds.nationality.title'),
                'url' => route('admin.nationalities.index'),
            ],
            ['title' => trans('global.show') . ' ' . trans('cruds.nationality.title_singular'), 'url' => '#'],
        ];
    @endphp
    @include('tenant.partials.breadcrumb')
    <div class="card">
        <div class="card-header p-3"> 
            <h6 class="cart-title">
                {{ trans('global.show') }} {{ trans('cruds.nationality.title') }}
            </h6>
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-light mt-3 mb-3" href="{{ route('admin.nationalities.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.nationality.fields.id') }}
                            </th>
                            <td>
                                {{ $nationality->id }}
                            </td>
                        </tr>
                        @foreach (config('panel.available_languages') as $langLocale => $langName)
                            <tr>
                                <th>
                                    {{ trans('cruds.nationality.fields.name') }}
                                    ({{ $langName }})
                                </th>
                                <td>
                                    {{ $nationality->getTranslation('name', $langLocale) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-light mt-3 mb-3" href="{{ route('admin.nationalities.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
