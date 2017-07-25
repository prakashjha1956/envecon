@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.users.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.users.fields.name')</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.email')</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.role')</th>
                            <td>{{ $user->role->title or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#useractions" aria-controls="useractions" role="tab" data-toggle="tab">User actions</a></li>
<li role="presentation" class=""><a href="#requesttotechnical" aria-controls="requesttotechnical" role="tab" data-toggle="tab">Request to technical</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="useractions">
<table class="table table-bordered table-striped {{ count($user_actions) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.user-actions.created_at')</th>
                        <th>@lang('quickadmin.user-actions.fields.user')</th>
                        <th>@lang('quickadmin.user-actions.fields.action')</th>
                        <th>@lang('quickadmin.user-actions.fields.action-model')</th>
                        <th>@lang('quickadmin.user-actions.fields.action-id')</th>
                        
        </tr>
    </thead>

    <tbody>
        @if (count($user_actions) > 0)
            @foreach ($user_actions as $user_action)
                <tr data-entry-id="{{ $user_action->id }}">
                    <td>{{ $user_action->created_at or '' }}</td>
                                <td>{{ $user_action->user->name or '' }}</td>
                                <td>{{ $user_action->action }}</td>
                                <td>{{ $user_action->action_model }}</td>
                                <td>{{ $user_action->action_id }}</td>
                                
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6">@lang('quickadmin.qa_no_entries_in_table')</td>
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
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($request_to_technicals) > 0)
            @foreach ($request_to_technicals as $request_to_technical)
                <tr data-entry-id="{{ $request_to_technical->id }}">
                    <td>{{ $request_to_technical->project->name or '' }}</td>
                                <td>{{ $request_to_technical->work_type->name or '' }}</td>
                                <td>{{ $request_to_technical->priority }}</td>
                                <td>{{ $request_to_technical->request_name }}</td>
                                <td>{!! $request_to_technical->small_description !!}</td>
                                <td> @foreach($request_to_technical->getMedia('upload_customer_sign_off_files') as $media)
                                <p class="form-group">
                                    <a href="{{ $media->getUrl() }}" target="_blank">{{ $media->name }} ({{ $media->size }} KB)</a>
                                </p>
                            @endforeach</td>
                                <td>
                                    @foreach ($request_to_technical->assigned_person as $singleAssignedPerson)
                                        <span class="label label-info label-many">{{ $singleAssignedPerson->name }}</span>
                                    @endforeach
                                </td>
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
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="11">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.users.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop