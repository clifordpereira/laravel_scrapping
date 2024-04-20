<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ScrapedData;

class TruncateScrapedData extends Command
{
    protected $signature = 'scraped-data:truncate';
    protected $description = 'Truncate the scraped_data table';

    public function handle()
    {
        ScrapedData::truncate();
        $this->info('scraped_data table truncated successfully.');
    }
}
