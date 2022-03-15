<?php

namespace App\Providers;

use App\Domain\Model\Character\CharacterRepository;
use App\Domain\Model\User\UserDataRepository;
use App\Infrastructure\Persistence\Eloquent\CharacterRepositoryImpl;
use App\Infrastructure\Persistence\Eloquent\UserDataRepositoryImpl;
use App\Service\Gacha\GachaService;
use App\Service\Gacha\GachaServiceImpl;
use Illuminate\Support\ServiceProvider;

class GachaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(GachaService::class, GachaServiceImpl::class);
        $this->app->bind(UserDataRepository::class, UserDataRepositoryImpl::class);
        $this->app->bind(CharacterRepository::class, CharacterRepositoryImpl::class);
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
