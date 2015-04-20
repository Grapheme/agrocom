<?php

class ApplicationController extends BaseController {

    public static $name = 'application';
    public static $group = 'application';

    /****************************************************************************/

    ## Routing rules of module
    public static function returnRoutes($prefix = null) {

        #Route::group(array(), function() {
            #Route::any('/ajax/request-call', array('as' => 'ajax.request-call', 'uses' => __CLASS__.'@postRequestCall'));
            #Route::any('/ajax/send-message', array('as' => 'ajax.send-message', 'uses' => __CLASS__.'@postSendMessage'));
        #});


        Route::group(array('prefix' => '{lang}'), function() {

            Route::any('/business/{slug}', array('as' => 'app.business', 'uses' => __CLASS__.'@getBusiness'));
            Route::any('/projects/{slug}', array('as' => 'app.project', 'uses' => __CLASS__.'@getProject'));
            Route::any('/news/{slug}', array('as' => 'app.news_one', 'uses' => __CLASS__.'@getNewsOne'));
        });




        Route::any('/{lang}/test', array('as' => 'app.test', 'uses' => __CLASS__ . '@getBusiness'));




        #echo URL::route('app.business', ['slug' => '123']); die;
        #Helper::tad(Route::input('lang'));
    }


    /****************************************************************************/


	public function __construct(){
        #
	}


    public function getBusiness($lang, $slug) {

        $business = Dic::valueBySlugs('business', $slug);
        if (!is_object($business))
            App::abort(404);
        #Helper::tad($business);
        $business = DicLib::loadImages($business, ['header_bg_image', 'logo', 'content_wide_image']);

        return View::make(Helper::layout('business'), compact('business'));
    }


    public function getProject($lang, $slug) {

        $project = Dic::valueBySlugs('projects', $slug);
        if (!is_object($project))
            App::abort(404);
        $project = DicLib::loadGallery($project, ['gallery']);
        #Helper::tad($project);

        return View::make(Helper::layout('projects'), compact('project', 'slug'));
    }


    public function getNewsOne($lang, $slug) {

        $new = Dic::valueBySlugs('news', $slug);
        if (!is_object($new))
            App::abort(404);
        $new = DicLib::loadGallery($new, ['gallery']);
        #Helper::tad($new);

        return View::make(Helper::layout('news_one'), compact('new', 'slug'));
    }


    public function postSendMessage() {

        #
    }



}