<?php

namespace App\Http\Controllers\Admin;

use App\RequestToTechnical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRequestToTechnicalsRequest;
use App\Http\Requests\Admin\UpdateRequestToTechnicalsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Yajra\Datatables\Datatables;

class RequestToTechnicalsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of RequestToTechnical.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('request_to_technical_access')) {
            return abort(401);
        }

        $request_to_technicals = RequestToTechnical::all();

        return view('admin.request_to_technicals.index', compact('request_to_technicals'));
    }

    /**
     * Show the form for creating new RequestToTechnical.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('request_to_technical_create')) {
            return abort(401);
        }
        $relations = [
            'projects' => \App\TimeProject::get()->pluck('name', 'id')->prepend('Please select', ''),
            'work_types' => \App\TimeWorkType::get()->pluck('name', 'id')->prepend('Please select', ''),
            'assigned_people' => \App\User::get()->pluck('name', 'id'),
        ];
        $enum_priority = RequestToTechnical::$enum_priority;
            
        return view('admin.request_to_technicals.create', compact('enum_priority') + $relations);
    }

    /**
     * Store a newly created RequestToTechnical in storage.
     *
     * @param  \App\Http\Requests\StoreRequestToTechnicalsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequestToTechnicalsRequest $request)
    {
        if (! Gate::allows('request_to_technical_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $request_to_technical = RequestToTechnical::create($request->all());
        $request_to_technical->assigned_person()->sync(array_filter((array)$request->input('assigned_person')));


        foreach ($request->input('upload_customer_sign_off_files_id', []) as $index => $id) {
            $model          = config('laravel-medialibrary.media_model');
            $file           = $model::find($id);
            $file->model_id = $request_to_technical->id;
            $file->save();
        }

        return redirect()->route('admin.request_to_technicals.index');
    }


    /**
     * Show the form for editing RequestToTechnical.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('request_to_technical_edit')) {
            return abort(401);
        }
        $relations = [
            'projects' => \App\TimeProject::get()->pluck('name', 'id')->prepend('Please select', ''),
            'work_types' => \App\TimeWorkType::get()->pluck('name', 'id')->prepend('Please select', ''),
            'assigned_people' => \App\User::get()->pluck('name', 'id'),
        ];
        $enum_priority = RequestToTechnical::$enum_priority;
            
        $request_to_technical = RequestToTechnical::findOrFail($id);

        return view('admin.request_to_technicals.edit', compact('request_to_technical', 'enum_priority') + $relations);
    }

    /**
     * Update RequestToTechnical in storage.
     *
     * @param  \App\Http\Requests\UpdateRequestToTechnicalsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequestToTechnicalsRequest $request, $id)
    {
        if (! Gate::allows('request_to_technical_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $request_to_technical = RequestToTechnical::findOrFail($id);
        $request_to_technical->update($request->all());
        $request_to_technical->assigned_person()->sync(array_filter((array)$request->input('assigned_person')));


        $media = [];
        foreach ($request->input('upload_customer_sign_off_files_id', []) as $index => $id) {
            $model          = config('laravel-medialibrary.media_model');
            $file           = $model::find($id);
            $file->model_id = $request_to_technical->id;
            $file->save();
            $media[] = $file;
        }
        $request_to_technical->updateMedia($media, 'upload_customer_sign_off_files');

        return redirect()->route('admin.request_to_technicals.index');
    }


    /**
     * Display RequestToTechnical.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('request_to_technical_view')) {
            return abort(401);
        }
        $relations = [
            'projects' => \App\TimeProject::get()->pluck('name', 'id')->prepend('Please select', ''),
            'work_types' => \App\TimeWorkType::get()->pluck('name', 'id')->prepend('Please select', ''),
            'assigned_people' => \App\User::get()->pluck('name', 'id'),
        ];

        $request_to_technical = RequestToTechnical::findOrFail($id);

        return view('admin.request_to_technicals.show', compact('request_to_technical') + $relations);
    }


    /**
     * Remove RequestToTechnical from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('request_to_technical_delete')) {
            return abort(401);
        }
        $request_to_technical = RequestToTechnical::findOrFail($id);
        $request_to_technical->delete();

        return redirect()->route('admin.request_to_technicals.index');
    }

    /**
     * Delete all selected RequestToTechnical at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('request_to_technical_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = RequestToTechnical::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
