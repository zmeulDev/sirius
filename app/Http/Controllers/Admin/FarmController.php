<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFarmRequest;
use App\Http\Requests\StoreFarmRequest;
use App\Http\Requests\UpdateFarmRequest;
use App\Models\BackupCluster;
use App\Models\BackupTracker;
use App\Models\Datacenter;
use App\Models\Domain;
use App\Models\Farm;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FarmController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('farm_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $farms = Farm::with(['farm_datacenters', 'farm_domains', 'farm_bck_trackers', 'farm_bck_clusters'])->get();

        $datacenters = Datacenter::get();

        $domains = Domain::get();

        $backup_trackers = BackupTracker::get();

        $backup_clusters = BackupCluster::get();

        return view('admin.farms.index', compact('backup_clusters', 'backup_trackers', 'datacenters', 'domains', 'farms'));
    }

    public function create()
    {
        abort_if(Gate::denies('farm_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $farm_datacenters = Datacenter::pluck('datacenter_name', 'id');

        $farm_domains = Domain::pluck('domain_name', 'id');

        $farm_bck_trackers = BackupTracker::pluck('bck_tracker_name', 'id');

        $farm_bck_clusters = BackupCluster::pluck('bck_clus_name', 'id');

        return view('admin.farms.create', compact('farm_bck_clusters', 'farm_bck_trackers', 'farm_datacenters', 'farm_domains'));
    }

    public function store(StoreFarmRequest $request)
    {
        $farm = Farm::create($request->all());
        $farm->farm_datacenters()->sync($request->input('farm_datacenters', []));
        $farm->farm_domains()->sync($request->input('farm_domains', []));
        $farm->farm_bck_trackers()->sync($request->input('farm_bck_trackers', []));
        $farm->farm_bck_clusters()->sync($request->input('farm_bck_clusters', []));

        return redirect()->route('admin.farms.index');
    }

    public function edit(Farm $farm)
    {
        abort_if(Gate::denies('farm_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $farm_datacenters = Datacenter::pluck('datacenter_name', 'id');

        $farm_domains = Domain::pluck('domain_name', 'id');

        $farm_bck_trackers = BackupTracker::pluck('bck_tracker_name', 'id');

        $farm_bck_clusters = BackupCluster::pluck('bck_clus_name', 'id');

        $farm->load('farm_datacenters', 'farm_domains', 'farm_bck_trackers', 'farm_bck_clusters');

        return view('admin.farms.edit', compact('farm', 'farm_bck_clusters', 'farm_bck_trackers', 'farm_datacenters', 'farm_domains'));
    }

    public function update(UpdateFarmRequest $request, Farm $farm)
    {
        $farm->update($request->all());
        $farm->farm_datacenters()->sync($request->input('farm_datacenters', []));
        $farm->farm_domains()->sync($request->input('farm_domains', []));
        $farm->farm_bck_trackers()->sync($request->input('farm_bck_trackers', []));
        $farm->farm_bck_clusters()->sync($request->input('farm_bck_clusters', []));

        return redirect()->route('admin.farms.index');
    }

    public function show(Farm $farm)
    {
        abort_if(Gate::denies('farm_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $farm->load('farm_datacenters', 'farm_domains', 'farm_bck_trackers', 'farm_bck_clusters');

        return view('admin.farms.show', compact('farm'));
    }

    public function destroy(Farm $farm)
    {
        abort_if(Gate::denies('farm_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $farm->delete();

        return back();
    }

    public function massDestroy(MassDestroyFarmRequest $request)
    {
        $farms = Farm::find(request('ids'));

        foreach ($farms as $farm) {
            $farm->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
