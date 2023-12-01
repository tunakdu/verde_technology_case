<?php

namespace App\Console\Commands;

use App\Jobs\getProductsJob;
use Illuminate\Console\Command;

class ProductDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:product-data-command';

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
        $this->info('Ürün getirme işlemi başlıyor.');
        $job = new getProductsJob();
        $job->getProductData();
        $this->info('Ürün getirme işlemi bitti.');
    }
}
