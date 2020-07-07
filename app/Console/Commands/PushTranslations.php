<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
class PushTranslations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'push:translations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->set_version = true;
        $this->set_changelog = true;
        $this->local_path_to_git = base_path().'/public/translations';
        $this->version_file = 'version.txt';
        $this->changelog_file = 'changelog.txt';
        $this->branch = 'master';

    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $remote = 'origin';


        $remote_path = '/translations';
        $remote_version_file = $remote_path . '/' . $this->version_file;
        $remote_changelog_file = $remote_path . '/' . $this->changelog_file;

        $this->info('Pushing to ' . $remote);

      //  exec('php '.base_path().'/public/translations/push.php');

        //Git Push to chosen remote
        exec('git --git-dir=.gitone add public/translations/*.*');
        exec('git --git-dir=.gitone commit -m "new strings on the way"');
        exec('git --git-dir=.gitone push ' . $remote . ' ' . $this->branch . ' --tags --force');

        $this->info('Git Push Complete');


    }
}
