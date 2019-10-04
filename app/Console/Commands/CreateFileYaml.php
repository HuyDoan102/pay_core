<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CreateFileYaml extends Command
{
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new file yaml.';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'file:yaml
                            {name_file : This is name of yaml file.}
                            {--place= : This is place save of yaml file.}';

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
        $content = config('swagger');
//        $responses = $this->showFileYaml($content);
        Storage::disk('file-yaml')->put($this->option('place') . '/' .$fileName, '');
    }

    /*function showFileYaml($data = [])
    {
        $dataResult = '';
        foreach ($data as $key => $item) {
            if (is_array($item)) {
                if ($key == "servers") {
                    $dataResult = $dataResult . "  $key: $item" . "\n";
                    foreach ($item['data'] as $key => $value) {
                        if ($key == 'url') {
                            $dataResult = $dataResult . "- $key: $value" . "\n";
                        }
                        unset($item['data'][$key]);
                    }
                    $dataResult = $dataResult . "  $key: " . "\n" . $this->showFileYaml($item['data']);
                    dd($dataResult);
                }
                $dataResult = $dataResult . "  $key: " . "\n" . $this->showFileYaml($item);
            } else {
                $dataResult = $dataResult . "  $key: $item" . "\n";
            }
        }

        return $dataResult;
    }*/
}
