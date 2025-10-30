<?php

namespace App\Http\Controllers;

use App\Cdn\Requests\CdnRequest;
use App\Cdn\Actions\CreateCdnAction;
use App\Cdn\Actions\DeleteCdnAction;
use App\Cdn\Actions\UpdateCdnAction;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Cdn;
use App\Models\Site;

class CdnController extends Controller
{
    public function index(): View
    {
        $cdns = Cdn::all();
        $sites = Site::all();

        return view('cdns.index', compact('cdns', 'sites'));
    }

    public function edit(Cdn $cdn): View
    {
        return view('cdns.edit', compact('cdn'));
    }

    public function store(CdnRequest $request, CreateCdnAction $action): RedirectResponse
    {
        $data = $request->getData();
        $action->execute($data);

        return redirect()->back()->with('success', 'Cdn created successfully!');
    }

    public function update(CdnRequest $request, Cdn $cdn, UpdateCdnAction $action): RedirectResponse
    {
        $data = $request->getData();
        $action->execute($cdn, $data);

        return redirect()->route('cdns.index')->with('success', 'Cdn updated successfully!');
    }

    public function destroy(Cdn $cdn, DeleteCdnAction $action): RedirectResponse
    {
        $action->execute($cdn);

        return redirect()->route('cdns.index')->with('success', 'Cdn deleted successfully!');
    }
}
