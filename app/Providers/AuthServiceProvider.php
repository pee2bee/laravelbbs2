<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
		 \App\Models\Reply::class => \App\Policies\ReplyPolicy::class,
		 \App\Models\Category::class => \App\Policies\CategoryPolicy::class,
		 \App\Models\Post::class => \App\Policies\PostPolicy::class,

         //'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {

        $this->registerPolicies();
        //模型已移动到Models下面,自动注册策略类需要这个
        // 修改策略自动发现的逻辑,这是因为修改了User.php的位置
        Gate::guessPolicyNamesUsing(function ($modelClass) {
            // 动态返回模型对应的策略名称，如：// 'App\Model\User' => 'App\Policies\UserPolicy',
            return 'App\Policies\\'.class_basename($modelClass).'Policy';
        });

        // 会注册一些在访问令牌、客户端、私人访问令牌的发放和吊销过程中会用到的必要路由
        Passport::routes();

        // accessToken有效期
        Passport::tokensExpireIn(Carbon::now()->addDays(15));
        // accessRefushToken刷新令牌有效期
        Passport::refreshTokensExpireIn(Carbon::now()->addDays(60));
    }

}
