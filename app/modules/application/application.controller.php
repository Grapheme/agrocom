<?php

class ApplicationController extends BaseController {

    public static $name = 'application';
    public static $group = 'application';

    /****************************************************************************/

    ## Routing rules of module
    public static function returnRoutes($prefix = null) {

        Route::group(array(), function() {
            #Route::any('/ajax/request-call', array('as' => 'ajax.request-call', 'uses' => __CLASS__.'@postRequestCall'));
            Route::any('/ajax/send-message', array('as' => 'ajax.send-message', 'uses' => __CLASS__.'@postSendMessage'));
        });


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

        #$new = Dic::valueBySlugs('news', $slug, 'all', false, false);
        $new = Dic::valueBySlugs('news', $slug, ['fields', 'textfields', 'seo']);
        if (!is_object($new))
            App::abort(404);

        #Helper::tad($new);

        $new = DicLib::loadGallery($new, ['gallery']);
        #Helper::tad($new);

        return View::make(Helper::layout('news_one'), compact('new', 'slug'));
    }


    public function postSendMessage() {

        if (!Request::ajax())
            App::abort(404);

        $json_request = ['status' => FALSE, 'responseText' => ''];
        $data = Input::all();

        $tpl = 'emails.feedback';
        if (View::exists($tpl)) {

            Mail::send($tpl, $data, function ($message) use ($data) {
                #$message->from(Config::get('mail.from.address'), Config::get('mail.from.name'));

                $from_email = Config::get('app.settings.main.feedback_from_email') ?: 'no@reply.ru';
                $from_name = Config::get('app.settings.main.feedback_from_name') ?: 'No-reply';

                $message->from($from_email, $from_name);
                $message->subject('Сообщение обратной связи');

                $email = Config::get('app.settings.main.feedback_address') ?: 'dev@null.ru';
                $emails = array();
                if (strpos($email, ',')) {
                    $emails = explode(',', $email);
                    foreach ($emails as $e => $email) {
                        $email = trim($email);
                        if (filter_var($email, FILTER_VALIDATE_EMAIL))
                            $emails[$e] = $email;
                    }
                    $email = array_shift($emails);
                }

                $message->to($email);

                #$ccs = Config::get('mail.feedback.cc');
                $ccs = $emails;
                if (isset($ccs) && is_array($ccs) && count($ccs))
                    foreach ($ccs as $cc)
                        $message->cc($cc);

                /**
                 * Прикрепляем файл
                 */
                /*
                if (Input::hasFile('file') && ($file = Input::file('file')) !== NULL) {
                    #Helper::dd($file->getPathname() . ' / ' . $file->getClientOriginalName() . ' / ' . $file->getClientMimeType());
                    $message->attach($file->getPathname(), array('as' => $file->getClientOriginalName(), 'mime' => $file->getClientMimeType()));
                }
                #*/

            });
            $json_request['status'] = TRUE;

        } else {

            $json_request['responseText'] = 'Template ' . $tpl . ' not found.';
        }

        #Helper::dd($result);
        return Response::json($json_request, 200);
    }



}