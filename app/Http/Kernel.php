<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
        ],

        'api' => [
            'throttle:60,1',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth'          => \App\Http\Middleware\Authenticate::class,
        'auth.basic'    => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'can'           => \Illuminate\Foundation\Http\Middleware\Authorize::class,
        'guest'         => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle'      => \Illuminate\Routing\Middleware\ThrottleRequests::class,

        //下面三个是使用权限
        'role'          => \Zizaco\Entrust\Middleware\EntrustRole::class,
        'permission'    => \Zizaco\Entrust\Middleware\EntrustPermission::class,
        'ability'       => \Zizaco\Entrust\Middleware\EntrustAbility::class,

        /**
         * 自定义权限验证
         */
        'role.base'     => \App\Http\Middleware\RoleBase::class, // 基础的验证
        'role.auth'     => \App\Http\Middleware\RoleAuth::class, // 权限验证
        'role.menu'     => \App\Http\Middleware\RoleMenu::class, // 后台菜单
    ];
}
