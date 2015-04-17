<?php

class ApplicationController extends BaseController {

    public static $name = 'application';
    public static $group = 'application';

    /****************************************************************************/

    ## Routing rules of module
    public static function returnRoutes($prefix = null) {

        Route::group(array(), function() {
            #Route::any('/ajax/request-call', array('as' => 'ajax.request-call', 'uses' => __CLASS__.'@postRequestCall'));
            #Route::any('/ajax/send-message', array('as' => 'ajax.send-message', 'uses' => __CLASS__.'@postSendMessage'));
        });


        #Route::group(array('before' => 'i18n_url'), function() {
        #Route::group(array(), function() {

            Route::any(
                '/{lang}/business/{slug}',
                array(
                    'as' => 'app.business',
                    'uses' => __CLASS__.'@getBusiness'
                )
            )
                ->defaults('lang', 'ru')
                #->parameter('lang', 'ru')
                #->with('lang', 'ru')
                #->setParameter('lang', 'ru')
            ;

        echo URL::route('app.business', ['slug' => '123']); die;

            #Helper::tad(Route::input('lang'));
        #});
    }


    /****************************************************************************/


	public function __construct(){
        #
	}


    public function getBusiness($slug) {

        $business = Dic::valueBySlugs('business', $slug);
        if (!is_object($business))
            App::abort(404);
        #Helper::tad($business);
        $business = DicLib::loadImages($business, ['header_bg_image', 'logo', 'content_wide_image']);

        return View::make(Helper::layout('business'), compact('business'));
    }


    public function postSendMessage() {

        #
    }



}