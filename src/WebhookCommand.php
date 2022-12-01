<?php

namespace Moh4git\MaystroWebhook;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Symfony\Component\Finder\SplFileInfo;

class WebhookCommand extends Command
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'webhook:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the maystro webhook controller';

    /**
     * Execute the console command.
     *
     * @return void
     *
     * @throws \InvalidArgumentException
     */
    public function handle()
    {
        
        if (! is_dir($directory = app_path('Http/Controllers/MaystroDelivery'))) {
            mkdir($directory, 0755, true);
        }

        $filesystem = new Filesystem;

        collect($filesystem->allFiles(__DIR__.'/stubs'))
            ->each(function (SplFileInfo $file) use ($filesystem) {
                $filesystem->copy(
                    $file->getPathname(),
                    app_path('Http/Controllers/MaystroDelivery/'.Str::replaceLast('.stub', '.php', $file->getFilename()))
                );
            });

        $this->info('Maystro webhook installed successfully.');
    }
}
