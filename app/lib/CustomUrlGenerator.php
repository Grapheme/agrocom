<?php namespace Illuminate\Routing;

use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;

/**
 * Custom UrlGenerator Class - for redeclare route() method
 *
 * @package Illuminate\Routing
 *
 * @see \vendor\laravel\framework\src\Illuminate\Routing\UrlGenerator.php
 */
class CustomUrlGenerator extends UrlGenerator {

	##
    ## Custom URL::route() method
    ##
	public function route($name, $parameters = array(), $absolute = true, $route = null)
	{
        ##
        ## Call url link modifier closure
        ## OUT OF DATE
        ##
        if (@is_callable($this->url_modifiers[$name])) {
            #\Helper::dd($parameters);
            $this->url_modifiers[$name]($parameters);
        }

        ##
        ## !!! IMPORTANT FOR MULTILANGUAGE!!!
        ## Apply the route default parameters
        ## Need CustomRouter, CustomRoute & him custom facades
        ##
        $route = $route ?: $this->routes->getByName($name);
        $parameters = $parameters + $route->getDefaults();

        ##
        ## Call original URL::route() with 100% right $parameters
        ##
        return parent::route($name, $parameters, $absolute, $route);
	}


    /**
     * Custom action method
     * Get the URL to a controller action.
     *
     * @param  string  $action
     * @param  mixed   $parameters
     * @param  bool    $absolute
     * @return string
     */
    public function action($action, $parameters = array(), $absolute = true)
    {
        ##
        ## Call url link modifier closure
        ##
        if (isset($action) && $action != '' && isset($this->url_modifiers[$action]) && @is_callable($this->url_modifiers[$action])) {
            #\Helper::dd($parameters);
            $this->url_modifiers[$action]($parameters);
        }

        return parent::route($action, $parameters, $absolute, $this->routes->getByAction($action));
    }


    ##
    ## Add url link modifier closure
    ##
    public function add_url_modifier($route_name = false, $closure) {

        if (!is_string($route_name) || !is_callable($closure))
            return false;

        #\Helper::dd($route_name);

        if (!@$this->url_modifiers || !@is_array($this->url_modifiers))
            $this->url_modifiers = array();

        $this->url_modifiers[$route_name] = $closure;
    }


    public function get_modified_parameters($route_name, $params = array()) {
        if (isset($route_name) && $route_name != '' && isset($this->url_modifiers[$route_name]) && @is_callable($this->url_modifiers[$route_name])) {
            #\Helper::d('=== START URL::get_modified_parameters() ===');
            #\Helper::d($route_name);
            #\Helper::d($params);
            $this->url_modifiers[$route_name]($params);
            #\Helper::d($params);
            #\Helper::d('=== END URL::get_modified_parameters() ===');
            return $params;
        }

    }
}
