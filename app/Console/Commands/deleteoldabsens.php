<?php

namespace App\Console\Commands;

use App\Models\absen;
use Illuminate\Console\Command;

class deleteoldabsens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:deleteoldabsens';

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
        $cutoffTime = now()->subHours(24);


        absen::where('created_at','<', $cutoffTime)->delete();


        $this->info('data absensi yang lebih dari 24 jam telah dihapus');
    }
}
