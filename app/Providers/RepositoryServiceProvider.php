<?php

namespace App\Providers;

use App\Repositories\Backend\Impls\AdminRepositoryImpl;
use App\Repositories\Backend\Impls\BoxRepositoryImpI;
use App\Repositories\Backend\Impls\RoleRepositoryImpl;
use App\Repositories\Backend\Impls\DashboardRepositoryImpl;
use App\Repositories\Backend\Impls\SongRepositoryImpI;
use App\Repositories\Backend\Impls\SubscriberRepositoryImpl;
use App\Repositories\Backend\Interf\AdminRepository;
use App\Repositories\Backend\Interf\BoxRepository;
use App\Repositories\Backend\Interf\RoleRepository;
use App\Repositories\Backend\Interf\DashboardRepository;
use App\Repositories\Backend\Interf\SongRepository;
use App\Repositories\Backend\Interf\SubscriberRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(RoleRepository::class, RoleRepositoryImpl::class);
        $this->app->bind(DashboardRepository::class, DashboardRepositoryImpl::class);
        $this->app->bind(AdminRepository::class, AdminRepositoryImpl::class);
        $this->app->bind(SubscriberRepository::class, SubscriberRepositoryImpl::class);
        $this->app->bind(BoxRepository::class, BoxRepositoryImpI::class);
        $this->app->bind(SongRepository::class, SongRepositoryImpI::class);

    }
}
