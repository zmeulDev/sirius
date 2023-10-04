<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMachineRequest;
use App\Http\Requests\StoreMachineRequest;
use App\Http\Requests\UpdateMachineRequest;
use App\Models\Checklist;
use App\Models\Machine;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MachineController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('machine_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $machines = Machine::with(['checklist'])->get();

        $checklists = Checklist::get();

        return view('admin.machines.index', compact('checklists', 'machines'));
    }

    public function create()
    {
        abort_if(Gate::denies('machine_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $checklists = Checklist::pluck('chk_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.machines.create', compact('checklists'));
    }

    public function store(StoreMachineRequest $request)
    {
        $machine = Machine::create($request->all());

        return redirect()->route('admin.machines.index');
    }

    public function edit(Machine $machine)
    {
        abort_if(Gate::denies('machine_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $checklists = Checklist::pluck('chk_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $machine->load('checklist');

        return view('admin.machines.edit', compact('checklists', 'machine'));
    }

    public function update(UpdateMachineRequest $request, Machine $machine)
    {
        $machine->update($request->all());

        return redirect()->route('admin.machines.index');
    }

    public function show(Machine $machine)
    {
        abort_if(Gate::denies('machine_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $machine->load('checklist');

        return view('admin.machines.show', compact('machine'));
    }

    public function destroy(Machine $machine)
    {
        abort_if(Gate::denies('machine_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $machine->delete();

        return back();
    }

    public function massDestroy(MassDestroyMachineRequest $request)
    {
        $machines = Machine::find(request('ids'));

        foreach ($machines as $machine) {
            $machine->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
