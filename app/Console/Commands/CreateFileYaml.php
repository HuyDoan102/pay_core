<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Yaml\Yaml;

class CreateFileYaml extends Command
{
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new file yaml with place save in ["empty|components|paths"].';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'file:yaml
                            {name_file : This is name of yaml file.}';
//                            {--place= : This is place save ["components|paths"] of yaml file.}';

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
        $fileName = $this->argument('name_file') . '.yaml';
        $location = $this->choice('Where do you want to save file?', ['', 'paths', 'components']);
        if ($location == 'paths') {
            $content = config('swagger-path');
            $this->showFileYamlWrapper($content, $fileName, $location);
        }
        if ($location == 'components') {
            $content = config('swagger-component');
            $this->showFileYamlWrapper($content, $fileName, $location);
        }
        if (empty($location)) {
            $content = config('swagger');
            $this->showFileYamlWrapper($content, $fileName, $location);
        }

    }

    function showFileYamlWrapper($content, $fileName, $location)
    {
        $yaml = Yaml::dump($content, 10, 2);
        Storage::disk('file-yaml')->put($location . '/' .$fileName, $yaml);

        return $yaml;
    }
}
