@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.request-to-technical.title')</h3>
    @can('request_to_technical_create')
    <p>
        <a href="{{ route('admin.request_to_technicals.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('request_to_technical_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.request_to_technicals.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">All</a></li> |
            <li><a href="{{ route('admin.request_to_technicals.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">Trash</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($request_to_technicals) > 0 ? 'datatable' : '' }} @can('request_to_technical_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('request_to_technical_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

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
                                @can('request_to_technical_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

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
@stop

@section('javascript') 
    <script>
        @can('request_to_technical_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.request_to_technicals.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection