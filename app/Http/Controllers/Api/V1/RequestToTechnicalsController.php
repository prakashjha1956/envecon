<?php

namespace App\Http\Controllers\Api\V1;

use App\RequestToTechnical;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRequestToTechnicalsRequest;
use App\Http\Requests\Admin\UpdateRequestToTechnicalsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Yajra\Datatables\Datatables;

class RequestToTechnicalsController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        return RequestToTechnical::all();
    }

    public function show($id)
    {
        return RequestToTechnical::findOrFail($id);
    }

    public function update(UpdateRequestToTechnicalsRequest $request, $id)
    {
        $request = $this->saveFiles($request);
        $request_to_technical = RequestToTechnical::findOrFail($id);
        $request_to_technical->update($request->all());
        

        return $request_to_technical;
    }

    public function store(StoreRequestToTechnicalsRequest $request)
    {
        $request = $this->saveFiles($request);
        $request_to_technical = RequestToTechnical::create($request->all());
        

        return $request_to_technical;
    }

    public function destroy($id)
    {
        $request_to_technical = RequestToTechnical::findOrFail($id);
        $request_to_technical->delete();
        return '';
    }
}
