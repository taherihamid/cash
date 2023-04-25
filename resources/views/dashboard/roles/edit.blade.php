@extends('layouts.dashboard.layout')

@section('content')
    @include('layouts.dashboard.elements.breadcrumb', ['items' => array(['route' => 'dashboard.roles.index', 'label' => 'ui.sidebar.roles.label'], ['route' => 'dashboard.roles.add', 'label' => 'ui.text.add'])])

    <div class="row">
        <div class="col-xs-12">
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple">
                        <div class="grid-title no-border">
                            <h3 class="d-inline-block"><span
                                    class="semi-bold">{{ trans('ui.text.add') }}</span> {{ trans('ui.sidebar.roles.name') }}
                            </h3>
                        </div>

                        <div class="grid-body no-border display-block">
                            <div class="row-fluid">
                                {!! Form::model($role, ['route' => ['admin.roles.update', $role->id], 'method' => 'PUT', 'class' => 'needs-validation validate']) !!}

                                <div class="row">
                                    <br>

                                    <div class="col-md-5 col-xs-12">
                                        <div class="form-group">
                                            <label class="form-label" for="name">{{ trans('ui.text.name') }}</label>
                                            <span class="help">{{ trans('ui.text.example') }}
                                                : «{{ trans('ui.example.role-name') }}»</span>

                                            <div class="controls">
                                                {!! Form::text("name", null, ['class' => 'form-control', 'id' => 'name', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <br>

                                    <div class="col-xs-12">
                                        <table class="table no-more-tables table-striped">
                                            <thead>
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

                                                    <label class="d-inline-block m-0 no-select" for="all-publishes">{{ trans('ui.text.roles.publish') }}</label>
                                                </th>
                                            </tr>
                                            </thead>

                                            <tbody>

                                            @foreach($role->permissions['sections'] as $key => $value)
                                                <tr class="role-row">
                                                    <td class="v-align-middle">
                                                        <span> {{ trans("ui.sidebar.{$value['id']}") }}</span>
                                                        {!! Form::hidden("controller[$key]", $value['controller']) !!}
                                                    </td>
                                                    <td class="v-align-middle">
                                                        {!! Form::hidden("read[$key]", 0) !!}

                                                        <div class="d-inline-block checkbox check-info">
                                                            {!! Form::checkbox("read[$key]", 1, ($value['read'] == 1) ? true : false, ['id' => "{$value['id']}-read", 'class' => 'read-checkbox']) !!}
                                                            <label
                                                                for="{{ $value['id'] }}-read">{{ trans('ui.text.roles.read') }}</label>
                                                        </div>
                                                    </td>

                                                    <td class="v-align-middle">
                                                        {!! Form::hidden("write[$key]", 0) !!}

                                                        <div class="d-inline-block checkbox check-info">
                                                            {!! Form::checkbox("write[$key]", 1, ($value['write'] == 1) ? true : false, ['id' => "{$value['id']}-write", 'class' => 'write-checkbox']) !!}
                                                            <label
                                                                for="{{ $value['id'] }}-write">{{ trans('ui.text.roles.write') }}</label>
                                                        </div>
                                                    </td>

                                                    <td class="v-align-middle">
                                                        {!! Form::hidden("update[$key]", 0) !!}

                                                        <div class="d-inline-block checkbox check-info">
                                                            {!! Form::checkbox("update[$key]", 1, ($value['update'] == 1) ? true : false, ['id' => "{$value['id']}-update", 'class' => 'update-checkbox']) !!}
                                                            <label
                                                                for="{{ $value['id'] }}-update">{{ trans('ui.text.roles.update') }}</label>
                                                        </div>
                                                    </td>

                                                    <td class="v-align-middle">
                                                        {!! Form::hidden("delete[$key]", 0) !!}

                                                        <div class="d-inline-block checkbox check-info">
                                                            {!! Form::checkbox("delete[$key]", 1, ($value['delete'] == 1) ? true : false, ['id' => "{$value['id']}-delete", 'class' => 'delete-checkbox']) !!}
                                                            <label
                                                                for="{{ $value['id'] }}-delete">{{ trans('ui.text.roles.delete') }}</label>
                                                        </div>
                                                    </td>

                                                    <td class="v-align-middle{{ !$value['has_publish']? ' disabled' : '' }}">
                                                        {!! Form::hidden("publish[$key]", 0) !!}

                                                        <div class="d-inline-block checkbox check-info">

                                                            @if($value['has_publish'])
                                                                {!! Form::checkbox("publish[$key]", 1, ($value['publish'] == 1) ? true : false, ['id' => "{$value['id']}-publish", 'class' => 'publish-role publish-checkbox']) !!}
                                                            @else
                                                                {!! Form::checkbox("publish[$key]", 1, false, ['id' => "{$value['id']}-publish", 'class' => 'publish-role publish-checkbox', 'disabled']) !!}
                                                            @endif
                                                            <label for="{{ $value['id'] }}-publish">{{ trans('ui.text.roles.publish') }}</label>
                                                        </div>

                                                    </td>
                                                </tr>

                                            @endforeach

                                            @foreach($role->permissions['dynamic']['toggle'] as $key => $value)
                                                <tr>
                                                    <td class="v-align-middle pt-5">
                                                        <span>{{ trans("ui.sidebar.{$value['class']}") }}</span>
                                                        {!! Form::hidden("dynamic[toggle][$key][slug]", $value['slug']) !!}
                                                    </td>
                                                    <td class="v-align-middle pt-5" colspan="5">
                                                        @if(!empty($value['fields']))
                                                            @foreach($value['fields']['value'] as $index => $field)
                                                                <div class="d-inline-block checkbox check-info">
                                                                    {!! Form::checkbox("dynamic[toggle][$key][fields][$index]", $field['id'], $field['status'], ['id' => "dynamic-toggle-$index"]) !!}
                                                                    <label for="dynamic-toggle-{{ $index }}"></label>
                                                                </div>

                                                                <label class="d-inline-block m-0 ml-4 no-select"
                                                                       for="dynamic-toggle-{{ $index }}">{{ $value['fields']['label'][$index] }}</label>
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 text-left margin-top-20">
                                        <a href="{{ route('admin.roles.index') }}"
                                           class="btn btn-white btn-cons">{{ trans('ui.btn.cancel') }}</a>
                                        <button type="submit" class="btn btn-success btn-cons">{{ trans('ui.btn.submit') }}</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
