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
                            <td>{{ $request_to_technical->project->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.request-to-technical.fields.work-type')</th>
                            <td>{{ $request_to_technical->work_type->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.request-to-technical.fields.priority')</th>
                            <td>{{ $request_to_technical->priority }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.request-to-technical.fields.request-name')</th>
                            <td>{{ $request_to_technical->request_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.request-to-technical.fields.small-description')</th>
                            <td>{!! $request_to_technical->small_description !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.request-to-technical.fields.upload-customer-sign-off-files')</th>
                            <td> @foreach($request_to_technical->getMedia('upload_customer_sign_off_files') as $media)
                                <p class="form-group">
                                    <a href="{{ $media->getUrl() }}" target="_blank">{{ $media->name }} ({{ $media->size }} KB)</a>
                                </p>
                            @endforeach</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.request-to-technical.fields.assigned-person')</th>
                            <td>
                                @foreach ($request_to_technical->assigned_person as $singleAssignedPerson)
                                    <span class="label label-info label-many">{{ $singleAssignedPerson->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.request_to_technicals.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop