{!! Form::open(['url' => URL($url), 'method' => 'GET']) !!}
<div class="material-form-group-inline">
    {!! Form::text('keyword', Request::capture()->query("keyword"), ['id' => 'admin-search', 'class' => '', 'placeholder' => trans('ui.text.search')]) !!}
    <span class="bar"></span>
</div>
{!! Form::close() !!}
