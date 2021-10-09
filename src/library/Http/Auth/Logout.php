<?php

declare(strict_types=1);

namespace App\Ebcms\UcenterWeb\Http\Auth;

use App\Ebcms\Ucenter\Model\User;
use Ebcms\Router;

class Logout extends Common
{

    public function get(
        Router $router,
        User $userModel
    ) {
        $userModel->logout();
        return $this->success('已退出！', $router->buildUrl('/ebcms/ucenter-web/auth/login'));
    }
}
