@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.request-to-technical.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.request_to_technicals.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('project_id', 'Project', ['class' => 'control-label']) !!}
                    {!! Form::select('project_id', $projects, old('project_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('project_id'))
                        <p class="help-block">
                            {{ $errors->first('project_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('work_type_id', 'Work type*', ['class' => 'control-label']) !!}
                    {!! Form::select('work_type_id', $work_types, old('work_type_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('work_type_id'))
                        <p class="help-block">
                            {{ $errors->first('work_type_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('priority', 'Priority*', ['class' => 'control-label']) !!}
                    {!! Form::select('priority', $enum_priority, old('priority'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('priority'))
                        <p class="help-block">
                            {{ $errors->first('priority') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('request_name', 'Request name', ['class' => 'control-label']) !!}
                    {!! Form::text('request_name', old('request_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('request_name'))
                        <p class="help-block">
                            {{ $errors->first('request_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('small_description', 'Small description', ['class' => 'control-label']) !!}
                    {!! Form::textarea('small_description', old('small_description'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('small_description'))
                        <p class="help-block">
                            {{ $errors->first('small_description') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('upload_customer_sign_off_files', 'Upload customer sign off files*', ['class' => 'control-label']) !!}
                    {!! Form::file('upload_customer_sign_off_files[]', [
                        'multiple',
                        'class' => 'form-control file-upload',
                        'data-url' => route('admin.media.upload'),
                        'data-bucket' => 'upload_customer_sign_off_files',
                        'data-filekey' => 'upload_customer_sign_off_files',
                        ]) !!}
                    <p class="help-block"></p>
                    <div class="photo-block">
                        <div class="progress-bar form-group">&nbsp;</div>
                        <div class="files-list"></div>
                    </div>
                    @if($errors->has('upload_customer_sign_off_files'))
                        <p class="help-block">
                            {{ $errors->first('upload_customer_sign_off_files') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('assigned_person', 'Assigned person', ['class' => 'control-label']) !!}
                    {!! Form::select('assigned_person[]', $assigned_people, old('assigned_person'), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('assigned_person'))
                        <p class="help-block">
                            {{ $errors->first('assigned_person') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent

    <script src="{{ asset('quickadmin/plugins/fileUpload/js/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('quickadmin/plugins/fileUpload/js/jquery.fileupload.js') }}"></script>
    <script>
        $(function () {
            $('.file-upload').each(function () {
                var $this = $(this);
                var $parent = $(this).parent();

                $(this).fileupload({
                    dataType: 'json',
                    formData: {
                        model_name: 'RequestToTechnical',
                        bucket: $this.data('bucket'),
                        file_key: $this.data('filekey'),
                        _token: '{{ csrf_token() }}'
                    },
                    add: function (e, data) {
                        data.submit();
                    },
                    done: function (e, data) {
                        $.each(data.result.files, function (index, file) {
                            var $line = $($('<p/>', {class: "form-group"}).html(file.name + ' (' + file.size + ' KB)').appendTo($parent.find('.files-list')));
                            $line.append('<a href="#" class="btn btn-xs btn-danger remove-file">Remove</a>');
                            $line.append('<input type="hidden" name="' + $this.data('bucket') + '_id[]" value="' + file.id + '"/>');
                            if ($parent.find('.' + $this.data('bucket') + '-ids').val() != '') {
                                $parent.find('.' + $this.data('bucket') + '-ids').val($parent.find('.' + $this.data('bucket') + '-ids').val() + ',');
                            }
                            $parent.find('.' + $this.data('bucket') + '-ids').val($parent.find('.' + $this.data('bucket') + '-ids').val() + file.id);
                        });
                        $parent.find('.progress-bar').hide().css(
                            'width',
                            '0%'
                        );
                    }
                }).on('fileuploadprogressall', function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $parent.find('.progress-bar').show().css(
                        'width',
                        progress + '%'
                    );
                });
            });
            $(document).on('click', '.remove-file', function () {
                var $parent = $(this).parent();
                $parent.remove();
                return false;
            });
        });
    </script>
@stop