@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.request-to-technical.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.request-to-technical.fields.project')</th>
                            <td field-key='project'>{{ $request_to_technical->project->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.request-to-technical.fields.work-type')</th>
                            <td field-key='work_type'>{{ $request_to_technical->work_type->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.request-to-technical.fields.priority')</th>
                            <td field-key='priority'>{{ $request_to_technical->priority }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.request-to-technical.fields.request-name')</th>
                            <td field-key='request_name'>{{ $request_to_technical->request_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.request-to-technical.fields.small-description')</th>
                            <td field-key='small_description'>{!! $request_to_technical->small_description !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.request-to-technical.fields.upload-customer-sign-off-files')</th>
                            <td field-key='upload_customer_sign_off_files's> @foreach($request_to_technical->getMedia('upload_customer_sign_off_files') as $media)
                                <p class="form-group">
                                    <a href="{{ $media->getUrl() }}" target="_blank">{{ $media->name }} ({{ $media->size }} KB)</a>
                                </p>
                            @endforeach</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.request-to-technical.fields.assigned-person')</th>
                            <td field-key='assigned_person'>
                                @foreach ($request_to_technical->assigned_person as $singleAssignedPerson)
                                    <span class="label label-info label-many">{{ $singleAssignedPerson->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.request-to-technical.fields.name')</th>
                            <td field-key='name'>{{ $request_to_technical->name->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.status.fields.name')</th>
                            <td field-key='name'>{{ isset($request_to_technical->name) ? $request_to_technical->name->name : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.status.fields.description')</th>
                            <td field-key='description'>{{ isset($request_to_technical->name) ? $request_to_technical->name->description : '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.request_to_technicals.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop