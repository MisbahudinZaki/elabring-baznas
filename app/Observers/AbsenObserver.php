<?php

namespace App\Observers;

use App\Models\absen;

class AbsenObserver
{
    /**
     * Handle the absen "created" event.
     */
    public function creating(absen $absen)
    {
        if (in_array($absen->keterangan_id, [2, 3, 4, 5, 6])) {
            $absen->waktu_kehadiran = null;
            $absen->status = null;
        }
    }
    /**
     * Handle the absen "updated" event.
     */
    public function updated(absen $absen): void
    {
        //
    }

    /**
     * Handle the absen "deleted" event.
     */
    public function deleted(absen $absen): void
    {
        //
    }

    /**
     * Handle the absen "restored" event.
     */
    public function restored(absen $absen): void
    {
        //
    }

    /**
     * Handle the absen "force deleted" event.
     */
    public function forceDeleted(absen $absen): void
    {
        //
    }
}
