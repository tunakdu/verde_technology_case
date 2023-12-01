<?php

namespace App\Console\Commands;

use App\Jobs\getOrdersJob;
use Illuminate\Console\Command;

class OrderDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:order-data-command';

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
        $this->info('Sipariş getirme işlemi başlıyor.');
        $job = new getOrdersJob();
        $job->getOrderData();
        $this->info('Sipariş getirme işlemi bitti.');
    }
}
