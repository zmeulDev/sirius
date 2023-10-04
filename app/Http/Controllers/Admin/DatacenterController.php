<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDatacenterRequest;
use App\Http\Requests\StoreDatacenterRequest;
use App\Http\Requests\UpdateDatacenterRequest;
use App\Models\Datacenter;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DatacenterController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('datacenter_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $datacenters = Datacenter::all();

        return view('admin.datacenters.index', compact('datacenters'));
    }

    public function create()
    {
        abort_if(Gate::denies('datacenter_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.datacenters.create');
    }

    public function store(StoreDatacenterRequest $request)
    {
        $datacenter = Datacenter::create($request->all());

        return redirect()->route('admin.datacenters.index');
    }

    public function edit(Datacenter $datacenter)
    {
        abort_if(Gate::denies('datacenter_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.datacenters.edit', compact('datacenter'));
    }

    public function update(UpdateDatacenterRequest $request, Datacenter $datacenter)
    {
        $datacenter->update($request->all());

        return redirect()->route('admin.datacenters.index');
    }

    public function show(Datacenter $datacenter)
    {
        abort_if(Gate::denies('datacenter_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $datacenter->load('farmDatacenterFarms');

        return view('admin.datacenters.show', compact('datacenter'));
    }

    public function destroy(Datacenter $datacenter)
    {
        abort_if(Gate::denies('datacenter_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $datacenter->delete();

        return back();
    }

    public function massDestroy(MassDestroyDatacenterRequest $request)
    {
        $datacenters = Datacenter::find(request('ids'));

        foreach ($datacenters as $datacenter) {
            $datacenter->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
