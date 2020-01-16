<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Sczts\Skeleton\Http\StatusCode;

class CommonController extends Controller
{
    //
    public function routes()
    {
        $routes = app()->routes->getRoutes();
        $list = [];
        foreach ($routes as $route) {
            $middleware = $route->action['middleware'];
            foreach ($middleware as $item) {
                if (Str::startsWith($item, 'rbac.check:')) {
                    $list[] = [
                        'uri' => $route->uri,
                        'methods' => $route->methods,
                        'label' => explode(':', $item)[1],
                        'value' => explode(':', $item)[1]
                    ];
                }
            }
        }
        return $this->json(StatusCode::SUCCESS, ['data' => $list]);
    }
}
