<?php

namespace App\Providers;

use App\Contracts\Interfaces\ExportInterface;
use App\Contracts\Interfaces\ImportInterface;
use App\Contracts\Repositories\ExportRepository;
use App\Contracts\Repositories\ImportRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    protected $repositories = [
        ExportInterface::class => ExportRepository::class,
        ImportInterface::class => ImportRepository::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $repository)
        {
            app()->bind($interface, $repository);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
