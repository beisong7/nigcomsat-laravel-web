<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class, 1)->create();
//        factory(App\Models\Plan::class, 1)->create();

        $plan = new \App\Models\Plan();
        $plan->unid = uniqid();
        $plan->name = 'Freemium';
        $plan->info = 'Get Two Weeks Free';
        $plan->type = 'Free';
        $plan->cost = 'NGN 0';
        $plan->price = 0;
        $plan->duration = 1209600;
        $plan->duration_info = 'Free Two Weeks Subscription for First Registration';
        $plan->active = true;
        $plan->default = true;
        $plan->creator_key = 'BenIceIsYourMaker';
        $plan->save();
    }
}
