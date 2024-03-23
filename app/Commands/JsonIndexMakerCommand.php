<?php

namespace App\Commands;

use Dikki\Markdown\MarkdownParser;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class JsonIndexMakerCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'make:json';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $pagesDir = config('blog.content_dir');
        $markdownParser = new MarkdownParser($pagesDir);

        $pagesArr = $markdownParser->getFolderFiles("");

        file_put_contents(dirname(__DIR__, 2) . '/search.json', json_encode($pagesArr));
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
