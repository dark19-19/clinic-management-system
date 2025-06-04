<?php

use Illuminate\Foundation\Console\ClosureCommand;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    /** @var ClosureCommand $this */
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('make:service/{name}', function ($name) {
    $file = fopen(__DIR__ . "/../app/Services/$name.php", 'a');
    file_put_contents(__DIR__ . "/../app/Services/$name.php", "<?php

namespace App\Services;

class $name extends Service
{
    //
}
    ");
    fclose($file);
    $this->info('Service Created');
});

Artisan::command('make:api-route/{name}', function ($name) {
    $file = fopen(__DIR__ . "/../routes/api/$name.php", 'a');
    file_put_contents(__DIR__ . "/../routes/api/$name.php", "<?php

use Illuminate\Support\Facades\Route;

");
    fclose($file);
    $this->info('API Route File Created');
});
