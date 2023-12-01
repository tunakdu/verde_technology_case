<?php

namespace App\Console\Commands;

use App\Jobs\getOffersJob;
use Illuminate\Console\Command;

class OfferDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:offer-data-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Teklif getirme işlemi başlıyor.');
        $job = new getOffersJob();
        $job->getOfferData();
        $this->info('Teklif getirme işlemi bitti.');
    }
}
