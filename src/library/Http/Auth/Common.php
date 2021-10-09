<?php

declare(strict_types=1);

namespace App\Ebcms\UcenterWeb\Http\Auth;

use App\Ebcms\Admin\Traits\ResponseTrait;
use App\Ebcms\Admin\Traits\RestfulTrait;

abstract class Common
{
    use RestfulTrait;
    use ResponseTrait;
}
