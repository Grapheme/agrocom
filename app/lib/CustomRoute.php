<?php namespace Sngrl\Routing;

use Illuminate\Routing\Route as DefaultRoute;

/**
 * Custom Route Class with getDefaults() method
 * @package Sngrl\Routing
 */
class CustomRoute extends DefaultRoute {

    /**
     * Return all defaults parameters for the route (for example, language)
     *
     * @return array
     */
    public function getDefaults() {
        return $this->defaults;
    }
}
