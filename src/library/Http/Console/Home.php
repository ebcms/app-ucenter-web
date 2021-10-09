<?php

declare(strict_types=1);

namespace App\Ebcms\UcenterWeb\Http\Console;

use App\Ebcms\Ucenter\Model\User;
use Ebcms\Template;

class Home extends Common
{

    public function get(
        User $userModel,
        Template $template
    ) {
        return $this->html($template->renderFromFile('console/home@ebcms/ucenter-web', [
            'my' => $userModel->get('*', [
                'id' => $userModel->getLoginId()
            ]),
        ]));
    }
}
