<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMaintenanceRequest;
use App\Http\Requests\StoreMaintenanceRequest;
use App\Http\Requests\UpdateMaintenanceRequest;
use App\Models\Maintenance;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MaintenanceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('maintenance_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $maintenances = Maintenance::all();

        return view('admin.maintenances.index', compact('maintenances'));
    }

    public function create()
    {
        abort_if(Gate::denies('maintenance_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.maintenances.create');
    }

    public function store(StoreMaintenanceRequest $request)
    {
        $maintenance = Maintenance::create($request->all());

        return redirect()->route('admin.maintenances.index');
    }

    public function edit(Maintenance $maintenance)
    {
        abort_if(Gate::denies('maintenance_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.maintenances.edit', compact('maintenance'));
    }

    public function update(UpdateMaintenanceRequest $request, Maintenance $maintenance)
    {
        $maintenance->update($request->all());

        return redirect()->route('admin.maintenances.index');
    }

    public function show(Maintenance $maintenance)
    {
        abort_if(Gate::denies('maintenance_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.maintenances.show', compact('maintenance'));
    }

    public function destroy(Maintenance $maintenance)
    {
        abort_if(Gate::denies('maintenance_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $maintenance->delete();

        return back();
    }

    public function massDestroy(MassDestroyMaintenanceRequest $request)
    {
        $maintenances = Maintenance::find(request('ids'));

        foreach ($maintenances as $maintenance) {
            $maintenance->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
