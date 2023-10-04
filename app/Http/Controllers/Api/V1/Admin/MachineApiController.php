<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMachineRequest;
use App\Http\Requests\UpdateMachineRequest;
use App\Http\Resources\Admin\MachineResource;
use App\Models\Machine;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MachineApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('machine_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MachineResource(Machine::with(['checklist'])->get());
    }

    public function store(StoreMachineRequest $request)
    {
        $machine = Machine::create($request->all());

        return (new MachineResource($machine))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Machine $machine)
    {
        abort_if(Gate::denies('machine_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MachineResource($machine->load(['checklist']));
    }

    public function update(UpdateMachineRequest $request, Machine $machine)
    {
        $machine->update($request->all());

        return (new MachineResource($machine))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Machine $machine)
    {
        abort_if(Gate::denies('machine_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $machine->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
