<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDailyCheckRequest;
use App\Http\Requests\StoreDailyCheckRequest;
use App\Http\Requests\UpdateDailyCheckRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DailyCheckController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('daily_check_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dailyChecks.index');
    }

    public function create()
    {
        abort_if(Gate::denies('daily_check_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dailyChecks.create');
    }

    public function store(StoreDailyCheckRequest $request)
    {
        $dailyCheck = DailyCheck::create($request->all());

        return redirect()->route('admin.daily-checks.index');
    }

    public function edit(DailyCheck $dailyCheck)
    {
        abort_if(Gate::denies('daily_check_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dailyChecks.edit', compact('dailyCheck'));
    }

    public function update(UpdateDailyCheckRequest $request, DailyCheck $dailyCheck)
    {
        $dailyCheck->update($request->all());

        return redirect()->route('admin.daily-checks.index');
    }

    public function show(DailyCheck $dailyCheck)
    {
        abort_if(Gate::denies('daily_check_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dailyChecks.show', compact('dailyCheck'));
    }

    public function destroy(DailyCheck $dailyCheck)
    {
        abort_if(Gate::denies('daily_check_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dailyCheck->delete();

        return back();
    }

    public function massDestroy(MassDestroyDailyCheckRequest $request)
    {
        $dailyChecks = DailyCheck::find(request('ids'));

        foreach ($dailyChecks as $dailyCheck) {
            $dailyCheck->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
