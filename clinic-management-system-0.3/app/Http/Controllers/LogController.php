<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Services\LogService;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index() {
        $logs = Log::all();
        return view('admins.logs', [
            'logs' => $logs
        ]);
    }
    public function operationFilter(Request $request) {
        $logs = LogService::operationFilter($request);
        if ($logs == 'clear') {
            return redirect(route('admin.log'));
        }
        return view('admins.logs', [
            'logs' => $logs
        ]);
    }
    public function logFilter(Request $request) {
        $logs = LogService::loggedFilter($request);
        if ($logs == 'clear') {
            return redirect(route('admin.log'));
        }
        return view('admins.logs', [
            'logs' => $logs
        ]);
    }
}
