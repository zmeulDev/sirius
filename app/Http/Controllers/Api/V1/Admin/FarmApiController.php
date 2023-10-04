<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFarmRequest;
use App\Http\Requests\UpdateFarmRequest;
use App\Http\Resources\Admin\FarmResource;
use App\Models\Farm;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FarmApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('farm_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FarmResource(Farm::with(['farm_datacenters', 'farm_domains', 'farm_bck_trackers', 'farm_bck_clusters'])->get());
    }

    public function store(StoreFarmRequest $request)
    {
        $farm = Farm::create($request->all());
        $farm->farm_datacenters()->sync($request->input('farm_datacenters', []));
        $farm->farm_domains()->sync($request->input('farm_domains', []));
        $farm->farm_bck_trackers()->sync($request->input('farm_bck_trackers', []));
        $farm->farm_bck_clusters()->sync($request->input('farm_bck_clusters', []));

        return (new FarmResource($farm))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Farm $farm)
    {
        abort_if(Gate::denies('farm_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FarmResource($farm->load(['farm_datacenters', 'farm_domains', 'farm_bck_trackers', 'farm_bck_clusters']));
    }

    public function update(UpdateFarmRequest $request, Farm $farm)
    {
        $farm->update($request->all());
        $farm->farm_datacenters()->sync($request->input('farm_datacenters', []));
        $farm->farm_domains()->sync($request->input('farm_domains', []));
        $farm->farm_bck_trackers()->sync($request->input('farm_bck_trackers', []));
        $farm->farm_bck_clusters()->sync($request->input('farm_bck_clusters', []));

        return (new FarmResource($farm))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Farm $farm)
    {
        abort_if(Gate::denies('farm_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $farm->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
