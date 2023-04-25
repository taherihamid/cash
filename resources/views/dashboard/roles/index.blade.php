@extends('layouts.dashboard.layout')
@section('title', 'تعریف نقش کاربری')

@section('content')

    <div class="line">
        <div class="alert alert-info">
            <span>@yield('title')  {{trans('ui.text.new')}}</span>
        </div>
        {!! Form::open(['route' => 'admin.roles.store', 'method' => 'POST', 'class' => 'needs-validation validate']) !!}

        <div class="col-md-5 col-xs-12">
            <div class="form-group">
                <label class="form-label" for="name">{{ trans('ui.text.name') }}</label>
                <span class="help">{{ trans('ui.text.example') }}: «{{ trans('ui.example.role-name') }} »</span>

                <div class="controls">
                    {!! Form::text("name", null, ['class' => 'form form-control', 'id' => 'name', 'required']) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <br>
            <div class="col-xs-12">
                <table class="table no-more-tables table-striped">
                    <thead class="thead border-radius-8-px">
                    <tr>
                        <th class="pb-4">{{ trans('ui.text.roles.permission') }}</th>

                        <th class="pb-4">
                            <div class="d-inline-block checkbox bug-fix check-info">
                                {{ Form::checkbox('all_reads', 1, null, ['id' => 'all-reads']) }}
                                <label for="all-reads"></label>
                            </div>

                            <label class="d-inline-block m-0 no-select"
                                   for="all-reads">{{ trans('ui.text.roles.read') }}</label>
                        </th>

                        <th class="pb-4">
                            <div class="d-inline-block checkbox bug-fix check-info">
                                {{ Form::checkbox('all_writes', 1, null, ['id' => 'all-writes']) }}
                                <label for="all-writes"></label>
                            </div>

                            <label class="d-inline-block m-0 no-select"
                                   for="all-writes">{{ trans('ui.text.roles.write') }}</label>
                        </th>

                        <th class="pb-4">
                            <div class="d-inline-block checkbox bug-fix check-info">
                                {{ Form::checkbox('all_updates', 1, null, ['id' => 'all-updates']) }}
                                <label for="all-updates"></label>
                            </div>

                            <label class="d-inline-block m-0 no-select"
                                   for="all-updates">{{ trans('ui.text.roles.update') }}</label>
                        </th>

                        <th class="pb-4">
                            <div class="d-inline-block checkbox bug-fix check-info">
                                {{ Form::checkbox('all_deletes', 1, null, ['id' => 'all-deletes']) }}
                                <label for="all-deletes"></label>
                            </div>

                            <label class="d-inline-block m-0 no-select"
                                   for="all-deletes">{{ trans('ui.text.roles.delete') }}</label>
                        </th>

                        <th class="pb-4">
                            <div class="d-inline-block checkbox bug-fix check-info">
                                {{ Form::checkbox('all_publishes', 1, null, ['id' => 'all-publishes']) }}
                                <label for="all-publishes"></label>
                            </div>

                            <label class="d-inline-block m-0 no-select"
                                   for="all-publishes">{{ trans('ui.text.roles.publish') }}</label>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach(config('acl.sections') as $key => $value)
                        <tr class="role-row">
                            <td class="v-align-middle">
                                <span>{{ trans("ui.sidebar.{$value['id']}") }}</span>
                                {!! Form::hidden("controller[$key]", $value['controller']) !!}
                            </td>

                            <td class="v-align-middle">
                                {!! Form::hidden("read[$key]", 0) !!}

                                <div class="d-inline-block checkbox check-info">
                                    {!! Form::checkbox("read[$key]", 1, false, ['id' => "{$value['id']}-read", 'class' => 'read-checkbox']) !!}
                                    <label
                                        for="{{ $value['id'] }}-read">{{ trans('ui.text.roles.read') }}</label>
                                </div>
                            </td>

                            <td class="v-align-middle">
                                {!! Form::hidden("write[$key]", 0) !!}

                                <div class="d-inline-block checkbox check-info">
                                    {!! Form::checkbox("write[$key]", 1, false, ['id' => "{$value['id']}-write", 'class' => 'write-checkbox']) !!}
                                    <label
                                        for="{{ $value['id'] }}-write">{{ trans('ui.text.roles.write') }}</label>
                                </div>
                            </td>

                            <td class="v-align-middle">
                                {!! Form::hidden("update[$key]", 0) !!}

                                <div class="d-inline-block checkbox check-info">
                                    {!! Form::checkbox("update[$key]", 1, false, ['id' => "{$value['id']}-update", 'class' => 'update-checkbox']) !!}
                                    <label
                                        for="{{ $value['id'] }}-update">{{ trans('ui.text.roles.update') }}</label>
                                </div>
                            </td>

                            <td class="v-align-middle">
                                {!! Form::hidden("delete[$key]", 0) !!}

                                <div class="d-inline-block checkbox check-info">
                                    {!! Form::checkbox("delete[$key]", 1, false, ['id' => "{$value['id']}-delete", 'class' => 'delete-checkbox']) !!}
                                    <label
                                        for="{{ $value['id'] }}-delete">{{ trans('ui.text.roles.delete') }}</label>
                                </div>
                            </td>

                            <td class="v-align-middle{{ !$value['has_publish']? ' disabled' : '' }}">
                                {!! Form::hidden("publish[$key]", 0) !!}

                                <div class="d-inline-block checkbox check-info">
                                    @if($value['has_publish'])
                                        {!! Form::checkbox("publish[$key]", 1, false, ['id' => "{$value['id']}-publish", 'class' => 'publish-role publish-checkbox']) !!}
                                    @else
                                        {!! Form::checkbox("publish[$key]", 1, false, ['id' => "{$value['id']}-publish", 'class' => 'publish-role publish-checkbox', 'disabled']) !!}
                                    @endif

                                    <label
                                        for="{{ $value['id'] }}-publish">{{ trans('ui.text.roles.publish') }}</label>
                                </div>

                            </td>
                        </tr>
                    @endforeach

                    @foreach(config('acl.dynamic.toggle') as $key => $value)
                        <tr>
                            <td class="v-align-middle pt-5">
                                <span>{{ trans("ui.sidebar.{$value['class']}") }}</span>
                                {!! Form::hidden("dynamic[toggle][$key][slug]", $value['slug']) !!}
                            </td>

                            <td class="v-align-middle pt-5" colspan="5">
                                @foreach(DynamicToggleAcl($value['driver'], $value['provider'], $value['type_slug'], $value['type_value']) as $index => $row)
                                    <div class="d-inline-block checkbox check-info">
                                        {!! Form::checkbox("dynamic[toggle][$key][fields][id-" . $row[$value['id']] . "]", $row[$value['id']], false, ['id' => "dynamic-toggle-{$row[$value['id']]}"]) !!}
                                        <label for="dynamic-toggle-{{ $row[$value['id']] }}"></label>
                                    </div>

                                    <label class="d-inline-block m-0 ml-4 no-select"
                                           for="dynamic-toggle-{{ $row[$value['id']] }}">{{ $row[$value['label']] }}</label>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 text-left margin-top-20">
                <button type="submit"class="m-r-20 special-green-button col-lg-2 pull-right">{{ trans('ui.btn.submit') }}</button>
                <a href="{{ route('admin.roles.index') }}" class="text-center p-t-5 col-lg-1 pull-right special-white-button">{{ trans('ui.btn.cancel') }}</a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

    <div class=" line options">

        @if(isset($roles) and $roles->count())
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="thead text-right">{{ trans('ui.text.name') }}</th>
                        <th class="thead text-center">{{ trans('ui.text.created-at') }}</th>
                        <th class="thead text-center">{{ trans('ui.text.updated-at') }}</th>
                        <th class="thead text-center"></th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach($roles as $role)
                        <tr class="@if($loop->odd) active @endif">
                            <td class="text-right">{{ $role->name }}</td>
                            <td class="text-center">
                            <span class="ltr d-block text-center">{{ toPersianNum(jdate($role->created_at, 'date')->format('Y-m-d')) }}</span>
                            </td>

                            <td class="text-center">
                            <span
                                class="ltr d-block text-center">{{ toPersianNum(jdate($role->updated_at, 'date')->format('Y-m-d')) }}</span>
                            </td>

                            <td class="text-center list-tools">

                                @if($update)
                                    <a href="{{ route('admin.roles.edit', $role->id) }}" class="show-on-hover-visible"
                                       data-toggle="tooltip" data-placement="top" title="{{ trans('ui.text.edit') }}">
                                        <i class="fa fa-pencil color-dark-gray"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <nav aria-label="Page navigation" class="text-left pagination-container">
                {{ $roles->links() }}
            </nav>
        @endif
    </div>
@endsection
