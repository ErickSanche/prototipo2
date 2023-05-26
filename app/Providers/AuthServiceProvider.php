<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Paquete' => 'App\Policies\PaquetePolicy',
        'App\Models\Evento' => 'App\Policies\EventoPolicy',
        'App\Models\Servicio' => 'App\Policies\ServicioPolicy',
        'App\Models\Cliente' => 'App\Policies\ClientePolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('paquetes', [PaquetePolicy::class, 'viewAny']);
        Gate::define('eventos', [EventoPolicy::class, 'viewAny']);
        Gate::define('servicios', [ServicioPolicy::class, 'viewAny']);
        Gate::define('clientes', [ClientePolicy::class, 'viewAny']);
        Gate::define('registros', [ClientePolicy::class, 'viewAny']);

}

}
