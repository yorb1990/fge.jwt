<?php
namespace fge\jwt;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
class jwt_sp extends ServiceProvider
{
    protected $namespace = 'fge\jwt\controller';
    public function map()
    {
        Route::prefix('fge-tok')
             ->namespace($this->namespace)
             ->group(__DIR__.'/routes/api.php');
        Route::prefix('fge_tok')
             ->namespace($this->namespace)
             ->group(__DIR__.'/routes/web.php');
    }
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'fge_tok-jwt');
        parent::boot();
    }
}
