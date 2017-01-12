<?php

namespace App\Console\Commands;

use App\Helpers\ConfigWriter;
use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class GitVersionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'git:version';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate version information for website';
    /**
     * @var ConfigWriter
     */
    private $configWriter;

    /**
     * Create a new command instance.
     * @param ConfigWriter $configWriter
     */
    public function __construct(ConfigWriter $configWriter)
    {
        parent::__construct();
        $this->configWriter = $configWriter;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $revision = new Process('git rev-parse --short HEAD');
        $revision->run();
        $revision = trim($revision->getOutput());

        $version = new Process('git rev-list --count HEAD');
        $version->run();
        $version = trim($version->getOutput());

        $ver = [];
        $ver['major'] = intval($version / 1000);
        $ver['minor'] = intval($version / 100);
        $ver['maintenance'] = intval($version % 100);

        $ver['maintenance'] = $ver['maintenance'] < 10 ? '0' . $ver['maintenance'] : $ver['maintenance'];

        \Config::set('version', ['version' => implode('.', $ver), 'revision' => $revision]);

        $this->configWriter->save('version');

        return 0;
    }
}
