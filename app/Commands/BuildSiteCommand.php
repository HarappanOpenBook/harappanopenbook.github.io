<?php

namespace App\Commands;

use App\Libraries\AssetsBuilder;
use App\Libraries\PageBuilder;
use App\Libraries\SitemapBuilder;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class BuildSiteCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'site:build';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Build the static site.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(
        AssetsBuilder $assetsBuilder,
        PageBuilder $pageBuilder,
        SitemapBuilder $sitemapBuilder
    )
    {

        $this->output->progressStart(3);

        // build assets
        $this->task('Building assets', function () use ($assetsBuilder) {
            return $assetsBuilder->build();
        });
        $this->output->progressAdvance();

        // build sitemap
        $this->task('Building sitemap', function () use ($sitemapBuilder) {
            return $sitemapBuilder->build();
        });
        $this->output->progressAdvance();

        // build pages
        $this->task('Building pages', function () use ($pageBuilder) {
            return $pageBuilder->build();
        });
        $this->output->progressAdvance();

        # output
        $this->output->success('Build complete.');
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
