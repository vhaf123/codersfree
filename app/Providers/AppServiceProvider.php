<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
use App\Categoria;
use App\Curso;
use App\Video;
use App\Manual;
use App\Capitulo;
use App\Tema;
use App\Observers\UserObserver;
use App\Observers\CategoriaObserver;
use App\Observers\CursoObserver;
use App\Observers\VideoObserver;
use App\Observers\ManualObserver;
use App\Observers\CapituloObserver;
use App\Observers\TemaObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Categoria::observe(CategoriaObserver::class);
        Curso::observe(CursoObserver::class);
        Video::observe(VideoObserver::class);
        Manual::observe(ManualObserver::class);
        Capitulo::observe(CapituloObserver::class);
        Tema::observe(TemaObserver::class);
    }
}
