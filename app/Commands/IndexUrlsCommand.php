<?php

namespace App\Commands;

use App\Libraries\InstantIndexingLibrary;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class IndexUrlsCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'site:index';

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
    public function handle(InstantIndexingLibrary $instantIndexingLibrary)
    {
        $urlsArr = [];

        $sitemap = ROOT_DIR . '_html/sitemap.xml';

        // Check if the sitemap file exists
        if (file_exists($sitemap) && empty ($urlsArr)) {
            // Load the sitemap XML file
            $xml = simplexml_load_file($sitemap);

            // Check if the XML was loaded successfully
            if ($xml) {
                // Array to store extracted URLs
                $urls = array();

                // Iterate through each <url> element in the sitemap
                foreach ($xml->url as $url) {
                    // Get the URL and add it to the array
                    $urls[] = (string) $url->loc;
                }

                // Output the extracted URLs
                foreach ($urls as $url) {
                    echo $instantIndexingLibrary->indexUrl($url) . "\n";
                }
            } else {
                echo "Failed to load sitemap XML.\n";
                echo "Using urls array instead...\n";

                foreach ($urlsArr as $url) {
                    $instantIndexingLibrary->indexUrl($url);
                }
            }
        } else {
            echo "Sitemap file does not exist.\n";
            echo "Using urls array instead...\n";

            foreach ($urlsArr as $url) {
                $instantIndexingLibrary->indexUrl($url);
            }
        }
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
