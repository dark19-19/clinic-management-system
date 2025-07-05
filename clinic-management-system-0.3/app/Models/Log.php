<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['operation_by', 'affected', 'operation', 'log_hash'];

    /**
     *
     * @param string $operation_by_email
     * @param string $operation_title
     * @param string|null $affected_user_email
     * @param string|null $custom_log_hash
     *
     * Registers a log history for every operation made in the application.
     *
     * @return void
     *
     */
    public static function registerLog($operation_by_email, string $operation_title, string $affected_user_email = null)
    {

        $log_hash = (function () use ($operation_by_email, $operation_title): string {
            $emailPrefix = strtoupper(str_pad($operation_by_email, 3, '', STR_PAD_LEFT));
            $operationPrefix = strtoupper(str_pad($operation_title, 3, ' ', STR_PAD_LEFT));
            return rand(100, 999) . '-' . $emailPrefix . '-' . $operationPrefix;
        }) ();

        Log::create([
            'operation_by' => $operation_by_email,
            'operation' => $operation_title,
            'affected' => $affected_user_email,
            'log_hash' => $log_hash
        ]);
    }
}
