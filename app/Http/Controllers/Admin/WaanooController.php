<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyWaanooRequest;
use App\Http\Requests\StoreWaanooRequest;
use App\Http\Requests\UpdateWaanooRequest;
use App\Models\Waanoo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WaanooController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('waanoo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $waanoos = Waanoo::all();

        return view('admin.waanoos.index', compact('waanoos'));
    }

    public function create()
    {
        abort_if(Gate::denies('waanoo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.waanoos.create');
    }

    public function store(StoreWaanooRequest $request)
    {
        $waanoo = Waanoo::create($request->all());

        return redirect()->route('admin.waanoos.index');
    }

    public function edit(Waanoo $waanoo)
    {
        abort_if(Gate::denies('waanoo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.waanoos.edit', compact('waanoo'));
    }

    public function update(UpdateWaanooRequest $request, Waanoo $waanoo)
    {
        $waanoo->update($request->all());

        return redirect()->route('admin.waanoos.index');
    }

    public function show(Waanoo $waanoo)
    {
        abort_if(Gate::denies('waanoo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.waanoos.show', compact('waanoo'));
    }

    public function destroy(Waanoo $waanoo)
    {
        abort_if(Gate::denies('waanoo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $waanoo->delete();

        return back();
    }

    public function massDestroy(MassDestroyWaanooRequest $request)
    {
        $waanoos = Waanoo::find(request('ids'));

        foreach ($waanoos as $waanoo) {
            $waanoo->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
