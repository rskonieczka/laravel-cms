<?php

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class PullCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'pull';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'pull from git repository and basics actions';

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
        exec("git pull");
        exec("php composer dump-autoload");
        /*SSH::run(array(
            'git pull origin master',
            'php composer dump-autoload',
        ));*/
        $this->generateAsseticKey();
	}

    private function generateAsseticKey()
    {
        File::put('./.assetic',str_random(5));
    }

}
