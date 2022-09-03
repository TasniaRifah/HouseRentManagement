<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\CategoryPolicy;
use App\Policies\ProductPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\UserPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('category-list', [CategoryPolicy::class,'viewAny']);
        Gate::define('category-delete', [CategoryPolicy::class,'delete']);
        Gate::define('product-list', [ProductPolicy::class,'viewAny']);
        Gate::define('admin-access',[UserPolicy::class,'adminAccess']);
        // Gate::define('product-list', function (User $user, ) {

        //     return $user->role_id===1;
        // });

        // Gate::define('category-list', function (User $user, ) {

        //     return $user->role_id===1;
        // });
    }
}
