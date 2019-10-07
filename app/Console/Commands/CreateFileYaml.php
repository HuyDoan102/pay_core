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
    protected $description = 'Create a new file yaml with place save in ["empty|components|paths|schemas"].';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'file:yaml
                            {name_file : This is name of yaml file.}
                            {--place= : This is place save ["components|paths"] of yaml file.}';

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
        if ($this->option('place') == 'paths') {
            $content = config('swagger-path');
            $this->showFileYamlWrapper($content, $fileName);
        }
        if ($this->option('place') == 'components') {
            $content = config('swagger-component');
            $this->showFileYamlWrapper($content, $fileName);
        }
        if (empty($this->option('place'))) {
            $content = config('swagger');
            $this->showFileYamlWrapper($content, $fileName);
        }

    }

    function showFileYamlWrapper($data = [], $fileName)
    {
        $yaml = Yaml::dump($data, 6, 2);

        Storage::disk('file-yaml')->put($this->option('place') . '/' .$fileName, $yaml);
        return $yaml;
    }
}
