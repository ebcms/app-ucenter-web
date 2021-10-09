<?php

declare(strict_types=1);

namespace App\Ebcms\UcenterWeb\Http\Console;

use Ebcms\App;
use Ebcms\Config;
use Ebcms\Template;
use SplPriorityQueue;

class Index extends Common
{

    public function get(
        App $app,
        Config $config,
        Template $template
    ) {
        $menus = new SplPriorityQueue;
        foreach (array_keys($app->getPackages()) as $value) {
            $tmp = $config->get('ucenter_menus@' . $value);
            if (is_array($tmp)) {
                foreach ($tmp as $value) {
                    $value = array_merge([
                        'title' => '',
                        'url' => '',
                        'icon' => '',
                        'badge' => '',
                        'priority' => 50
                    ], (array)$value);
                    if (
                        $value['title'] &&
                        $value['url'] &&
                        $value['icon']
                    ) {
                        if (strpos($value['icon'], '<svg ') === 0) {
                            $value['icon'] = 'data:image/svg+xml;base64,' . base64_encode($value['icon']);
                        }
                        $menus->insert($value, $value['priority']);
                    }
                }
            }
        }
        return $this->html($template->renderFromFile('console/index@ebcms/ucenter-web', [
            'menus' => iterator_to_array($menus),
        ]));
    }
}
