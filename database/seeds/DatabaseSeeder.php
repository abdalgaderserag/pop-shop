<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 5)->create()->each(function ($u) {

            // Payment factory
            $payment = factory(App\Payment::class)->make();
            $payment->user_id = $u->id;
            $payment->save();

            // Items Factory
            factory(App\Item::class, 5)->create();
        });
    }
}
