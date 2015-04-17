<?php namespace Sngrl\Routing;

use Illuminate\Routing\Router as DefaultRouter;

/**
 * Custom Router Class with modified newRoute() method - for return custom Route class
 * @package Sngrl\Routing
 */
class Router extends DefaultRouter {

    /**
     * Return custom Route class
     *
     * @param array|string $methods
     * @param string       $uri
     * @param mixed        $action
     *
     * @return Route
     */
    protected function newRoute($methods, $uri, $action)
    {
        return new CustomRoute($methods, $uri, $action);
    }

}