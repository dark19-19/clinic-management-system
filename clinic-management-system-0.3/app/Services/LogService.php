<?php

namespace App\Services;

use App\Models\Log;
use Illuminate\Http\Request;

class LogService extends Service
{
    public static function operationFilter(Request $request) {
        $operation = $request->input('operation');
        if ($operation == 'clear') {
            return $operation;
        }
        return Log::where('operation', 'like', "%$operation%")->get();
    }
    public static function loggedFilter(Request $request) {
        $filter = $request->input('log');
        $logs = Log::all();
        $returnedLogs = [];
        switch ($filter) {
            case 'last_year':
                foreach ($logs as $log) {
                    if ($log->created_at >= now()->subYear()) {
                        array_push($returnedLogs, $log);
                    }
                }
                return $returnedLogs;
            case 'last_month':
                foreach ($logs as $log) {
                    if ($log->created_at >= now()->subMonth()) {
                        array_push($returnedLogs, $log);
                    }
                }
                return $returnedLogs;
            case 'last_week':
                foreach ($logs as $log) {
                    if ($log->created_at >= now()->subWeek()) {
                        array_push($returnedLogs, $log);
                    }
                }
                return $returnedLogs;
            case 'today':
                return Log::whereDate('created_at', today())->get();
            case 'last_min':
                foreach ($logs as $log) {
                    if ($log->created_at >= now()->subMinutes(10)) {
                        array_push($returnedLogs, $log);
                    }
                }
                return $returnedLogs;
            case 'clear':
                return $filter;
        }
    }
}
