<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDatacenterRequest;
use App\Http\Requests\UpdateDatacenterRequest;
use App\Http\Resources\Admin\DatacenterResource;
use App\Models\Datacenter;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DatacenterApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('datacenter_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DatacenterResource(Datacenter::all());
    }

    public function store(StoreDatacenterRequest $request)
    {
        $datacenter = Datacenter::create($request->all());

        return (new DatacenterResource($datacenter))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Datacenter $datacenter)
    {
        abort_if(Gate::denies('datacenter_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DatacenterResource($datacenter);
    }

    public function update(UpdateDatacenterRequest $request, Datacenter $datacenter)
    {
        $datacenter->update($request->all());

        return (new DatacenterResource($datacenter))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Datacenter $datacenter)
    {
        abort_if(Gate::denies('datacenter_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $datacenter->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
