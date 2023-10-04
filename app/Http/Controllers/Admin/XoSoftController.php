<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyXoSoftRequest;
use App\Http\Requests\StoreXoSoftRequest;
use App\Http\Requests\UpdateXoSoftRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class XoSoftController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('xo_soft_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.xoSofts.index');
    }

    public function create()
    {
        abort_if(Gate::denies('xo_soft_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.xoSofts.create');
    }

    public function store(StoreXoSoftRequest $request)
    {
        $xoSoft = XoSoft::create($request->all());

        return redirect()->route('admin.xo-softs.index');
    }

    public function edit(XoSoft $xoSoft)
    {
        abort_if(Gate::denies('xo_soft_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.xoSofts.edit', compact('xoSoft'));
    }

    public function update(UpdateXoSoftRequest $request, XoSoft $xoSoft)
    {
        $xoSoft->update($request->all());

        return redirect()->route('admin.xo-softs.index');
    }

    public function show(XoSoft $xoSoft)
    {
        abort_if(Gate::denies('xo_soft_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.xoSofts.show', compact('xoSoft'));
    }

    public function destroy(XoSoft $xoSoft)
    {
        abort_if(Gate::denies('xo_soft_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $xoSoft->delete();

        return back();
    }

    public function massDestroy(MassDestroyXoSoftRequest $request)
    {
        $xoSofts = XoSoft::find(request('ids'));

        foreach ($xoSofts as $xoSoft) {
            $xoSoft->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
