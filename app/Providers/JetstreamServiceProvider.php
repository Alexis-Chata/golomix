<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use App\Models\CodVendedorAsignado;
use App\Models\Com10;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);

        Fortify::registerView(function () {
            $cven_asignados = CodVendedorAsignado::whereTipo('main')->get('cven');
            $cvens = Com10::where('ccargo', '1')->whereNotIn('cven', $cven_asignados)->get('cven');
            return view('auth.register', compact('cvens'));
        });
    }

    /**
     * Configure the permissions that are available within the application.
     */
    protected function configurePermissions(): void
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
