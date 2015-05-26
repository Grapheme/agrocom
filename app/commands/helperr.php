<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class helperr extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'helperr:truncate';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Очистка';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		//
        #$this->info("111");

        $records = DB::connection('mysql_old')->table('news_material')
            ->leftJoin('news_material_fields', 'news_material_fields.material', '=', 'news_material.id')
            ->select('news_material.*')
            ->addSelect('news_material_fields.value')
            ->orderBy('date', 'ASC')
            ->get()
        ;
        #dd(count($records));

        $dics = [
            1 => 'news',
            2 => 'news',
            3 => 'publications',
        ];

        if (NULL != ($count = count($records))) {
            foreach ($records as $record) {

                $dic_slug = @$dics[$record->division];
                if (!$dic_slug)
                    continue;

                #$this->info($record->title);
                #$this->info(Helper::translit($record->title));
                #die;

                $this->info('[ ' . $dic_slug . ' ] - ' . $record->id . ' / ' . $count . ': ' . Helper::translit($record->title));

                if ($dic_slug == 'news') {

                    $dicval = DicVal::inject($dic_slug, array(
                        'slug' => Helper::translit($record->title),
                        'name' => $record->title,
                        'fields_i18n' => array(
                            'ru' => array(
                                'news_name' => $record->title,
                                'published_at' => mb_substr($record->date, 0, 10),
                                'source' => $record->value,
                            ),
                        ),
                        'textfields_i18n' => array(
                            'ru' => array(
                                'preview' => $record->short_text,
                                'content' => $record->full_text,
                            ),
                        ),
                    ));

                } else if ($dic_slug == 'publications') {

                    $dicval = DicVal::inject($dic_slug, array(
                        'slug' => Helper::translit($record->title),
                        'name' => $record->title,
                        'fields_i18n' => array(
                            'ru' => array(
                                'press_name' => $record->title,
                                'published_at' => mb_substr($record->date, 0, 10),
                                'source' => $record->value,
                            ),
                        ),
                        'textfields_i18n' => array(
                            'ru' => array(
                                'content' => $record->short_text,
                            ),
                        ),
                    ));
                }

                #die;

            }
        }

	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			#array('example', InputArgument::REQUIRED, 'An example argument.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			#array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}
