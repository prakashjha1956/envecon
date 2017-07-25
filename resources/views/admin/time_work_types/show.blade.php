@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.time-work-types.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.time-work-types.fields.name')</th>
                            <td field-key='name'>{{ $time_work_type->name }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#timeentries" aria-controls="timeentries" role="tab" data-toggle="tab">Time entries</a></li>
<li role="presentation" class=""><a href="#requesttotechnical" aria-controls="requesttotechnical" role="tab" data-toggle="tab">Request to technical</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="timeentries">
<table class="table table-bordered table-striped {{ count($time_entries) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.time-entries.fields.work-type')</th>
                        <th>@lang('quickadmin.time-entries.fields.project')</th>
                        <th>@lang('quickadmin.time-entries.fields.start-time')</th>
                        <th>@lang('quickadmin.time-entries.fields.end-time')</th>
                                                <th>&nbsp;</th>

        </tr>
    </thead>

    <tbody>
        @if (count($time_entries) > 0)
            @foreach ($time_entries as $time_entry)
                <tr data-entry-id="{{ $time_entry->id }}">
                    <td field-key='work_type'>{{ $time_entry->work_type->name or '' }}</td>
                                <td field-key='project'>{{ $time_entry->project->name or '' }}</td>
                                <td field-key='start_time'>{{ $time_entry->start_time }}</td>
                                <td field-key='end_time'>{{ $time_entry->end_time }}</td>
                                                                <td>
                                    @can('time_entry_view')
                                    <a href="{{ route('admin.time_entries.show',[$time_entry->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('time_entry_edit')
                                    <a href="{{ route('admin.time_entries.edit',[$time_entry->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('time_entry_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.time_entries.destroy', $time_entry->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="requesttotechnical">
<table class="table table-bordered table-striped {{ count($request_to_technicals) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.request-to-technical.fields.project')</th>
                        <th>@lang('quickadmin.request-to-technical.fields.work-type')</th>
                        <th>@lang('quickadmin.request-to-technical.fields.priority')</th>
                        <th>@lang('quickadmin.request-to-technical.fields.request-name')</th>
                        <th>@lang('quickadmin.request-to-technical.fields.small-description')</th>
                        <th>@lang('quickadmin.request-to-technical.fields.upload-customer-sign-off-files')</th>
                        <th>@lang('quickadmin.request-to-technical.fields.assigned-person')</th>
                        <th>@lang('quickadmin.request-to-technical.fields.name')</th>
                        <th>@lang('quickadmin.status.fields.name')</th>
                        <th>@lang('quickadmin.status.fields.description')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($request_to_technicals) > 0)
            @foreach ($request_to_technicals as $request_to_technical)
                <tr data-entry-id="{{ $request_to_technical->id }}">
                    <td field-key='project'>{{ $request_to_technical->project->name or '' }}</td>
                                <td field-key='work_type'>{{ $request_to_technical->work_type->name or '' }}</td>
                                <td field-key='priority'>{{ $request_to_technical->priority }}</td>
                                <td field-key='request_name'>{{ $request_to_technical->request_name }}</td>
                                <td field-key='small_description'>{!! $request_to_technical->small_description !!}</td>
                                <td field-key='upload_customer_sign_off_files'> @foreach($request_to_technical->getMedia('upload_customer_sign_off_files') as $media)
                                <p class="form-group">
                                    <a href="{{ $media->getUrl() }}" target="_blank">{{ $media->name }} ({{ $media->size }} KB)</a>
                                </p>
                            @endforeach</td>
                                <td field-key='assigned_person'>
                                    @foreach ($request_to_technical->assigned_person as $singleAssignedPerson)
                                        <span class="label label-info label-many">{{ $singleAssignedPerson->name }}</span>
                                    @endforeach
                                </td>
                                <td field-key='name'>{{ $request_to_technical->name->name or '' }}</td>
<td field-key='name'>{{ isset($request_to_technical->name) ? $request_to_technical->name->name : '' }}</td>
<td field-key='description'>{{ isset($request_to_technical->name) ? $request_to_technical->name->description : '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('request_to_technical_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.request_to_technicals.restore', $request_to_technical->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('request_to_technical_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.request_to_technicals.perma_del', $request_to_technical->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('request_to_technical_view')
                                    <a href="{{ route('admin.request_to_technicals.show',[$request_to_technical->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('request_to_technical_edit')
                                    <a href="{{ route('admin.request_to_technicals.edit',[$request_to_technical->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('request_to_technical_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.request_to_technicals.destroy', $request_to_technical->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="12">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.time_work_types.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop