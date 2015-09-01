<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class createdb extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'cms:createdb';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'migrate and seeding cms database';

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
        $this->call('migrate', array('--force' => true));
        $this->call('migrate', array('--package' => 'cartalyst/sentry', '--force' => true));
        $this->call('module:migrate', array('--force' => true));
        $this->call('db:seed', array('--force' => true));
	}

}
