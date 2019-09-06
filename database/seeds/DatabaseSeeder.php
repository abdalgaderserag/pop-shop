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
            $bio = factory(App\Bio::class)->make();
            $bio->user_id = $u->id;
            $bio->save();

            // Items Factory
            factory(App\Item::class, 5)->create(['user_id' => $u->id])->each(function ($item) {
                $category = factory(App\Category::class)->make();
                $category->item_id = $item->id;
                $category->save();
            });
        });
    }
}
