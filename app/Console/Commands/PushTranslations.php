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

        //creates local version.txt and local changelog.txt in project root
        if ( ! is_null($this->local_path_to_git))
        {
           if ($this->set_version)
           {
               exec($this->local_path_to_git . ' describe --tags --abbrev=0 > ' . base_path() . '/' . $this->version_file);
           }

           if ($this->set_changelog)
           {
               exec($this->local_path_to_git . ' log --date=short --cherry-pick --oneline --branches=master --format="%cd%n%s%n" --remove-empty --since=3.months > ' . base_path() . '/' . $this->changelog_file);
           }
        }

        $this->info('Pushing to ' . $remote);



        //Git Push to chosen remote
        exec('git add .');
        exec('git commit public/translations');
        exec('git push ' . $remote . ' ' . $this->branch . ' --tags --force');

        $this->info('Git Push Complete');


    }
}
