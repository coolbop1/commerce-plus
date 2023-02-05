<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $all_data = collect(json_decode(file_get_contents(public_path("uploads/data.json"))));
        $country = \App\Models\Countries::updateOrCreate(['name' => 'Nigeria', 'code' => 'NG']);
        foreach ($all_data as $key => $data) {
            $state_array = [
                'name' => $data->state->name,
                'country_id' => $country->id
            ];
            $state = \App\Models\States::updateOrCreate($state_array);
            // if($state) {
            //     $state_id = \App\Models\States::where('name', $data->state->name)->first()->id;
            //     $local_govts_array_ = collect($data->state->locals)->map(function($each) use($state_id) {
            //         $arr = [
            //             'name' => $each->name,
            //             'state_id' => $state_id
            //         ];
            //         return $arr;
            //     })->toArray();
            //     //$local_govts_array = LocalGovt::insert($local_govts_array_);
            // }

            
        }
    }
}
