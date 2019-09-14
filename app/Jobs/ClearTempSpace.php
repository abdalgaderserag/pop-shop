<?php

namespace App\Jobs;

use App\Item;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Storage;

class ClearTempSpace implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $i = 0;
        $paths = [];
        foreach (Storage::disk('public')->allDirectories('storage/items/image/') as $path) {
            $paths[$i] = $path;
            $i++;
        }
        $i = 0;
        $images = [];
        Item::all()->each(function ($item) use ($images, $i) {
            foreach ($item->images as $image) {
                $images[$i] = $image;
                $i++;
            }
        });

        foreach ($paths as $path) {
            $skip = false;
            foreach ($images as $image) {
                if ($image == $path) {
                    $skip = true;
                    break;
                }
            }
            if (!$skip)
                Storage::disk('public')->delete($path);
        }

    }
}
