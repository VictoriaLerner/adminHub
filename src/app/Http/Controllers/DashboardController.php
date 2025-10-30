<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Site;
use App\Dashboard\Actions\DashboardStatusCheckAction;

class DashboardController extends Controller
{
    public function index(): View
    {
        $sites = Site::all();
        return view('dashboard.index', compact('sites'));
    }



    public function checkStatus(Site $site, DashboardStatusCheckAction $action): RedirectResponse
    {
        $result = $action->execute($site);
        return redirect()->back()->with($result['type'], $result['message']);
    }



}
