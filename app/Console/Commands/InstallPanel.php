<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallPanel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'panel:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Panel in One Command Action';

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
    public function handle()
    {
        $this->header();
        $this->info('Installing: ');

        if ($this->confirm('Do you have setting the database configuration at .env ?')) {
            $this->info('Migrating database...');
            $this->call('migrate:fresh');
            $this->call('db:seed');
            $this->call('key:generate');
            $this->call('config:clear');
            $this->info('Installing Panel Is Completed ! Thank You :)');
            $this->info('--');
            $this->info("::Administrator Credential::\n URL Login: http://localhost/panel/public/admin/login\nEmail: hiskianggi@gmail.com \nPassword: 123456");
        }else{
            $this->info('Setup Aborted !');
            $this->info('Please setting the database configuration for first !');
        }

        $this->footer();
    }

    private function header(){
        $this->info('--------- :===: Panel By HiskiaDev :==: ---------------');
        $this->info('====================================================================');
    }

    private function footer()
    {
        $this->info('--');
        $this->info('Website : https://hiskiaweb.com');
        $this->info('Github : https://github.com/hiskiia/panel');
        $this->info('====================================================================');
        $this->info('------------------- :===: Completed !! :===: ------------------------');
        exit;
    }
}
