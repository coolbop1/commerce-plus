<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
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
        $roles = [
            [
                'name' => 'ROLE_SUPERADMIN',
                'description' => 'Has all the access'
            ],
            [
                'name' => 'ROLE_VENDOR',
                'description' => 'Has store acess'
            ],
            [
                'name' => 'ROLE_DELIVERY',
                'description' => 'Has delivery access'
            ]
        ];
        foreach ($roles as $key => $role) {
            Role::updateOrCreate($role);
        }

        $superAmin['name'] = "Super_AdMin";
        $superAmin['email'] = "admin@commerceplus.com";
        $superAmin['password'] = bcrypt(env('ADMIN_PASS'));
        $user = User::firstOrCreate(
            ["email" => $superAmin['email']],
            $superAmin
        );
        $role = Role::where('name', 'ROLE_SUPERADMIN')->first();
        $user->roles()->attach($role->id);


        //Category seeder
        $category_data = collect(json_decode(file_get_contents(public_path("uploads/category.json"))));

        foreach ($category_data as $key => $category) {
            $category_array = [
                'name' => $category->category->name,
                'verified' => true
            ];
            $category_ = \App\Models\Category::updateOrCreate($category_array);
            $sub_category_array = $category->category->sub_category;
            foreach ($sub_category_array as $key => $sub_category) {
                $sub_category_arr =[
                    "name" => $sub_category->name,
                    "category_id" => $category_->id,
                    'verified' => true
                ];
                $sub_category_ = \App\Models\SubCategory::updateOrCreate($sub_category_arr);
                $sections =  $sub_category->section;
                foreach ($sections as $key => $section) {
                    $section_array = [
                        "name" => $section,
                        "sub_category_id" => $sub_category_->id,
                        'verified' => true
                    ];
                    \App\Models\Section::updateOrCreate($section_array);
                }
            }
        }

        $brand_data = collect(json_decode(file_get_contents(public_path("uploads/brands.json"))));
        foreach ($brand_data as $key => $brand) {
            $brand_array = [
                'name' => $brand->name,
                'verified' => true
            ];
            \App\Models\Brand::updateOrCreate($brand_array);
        }

    }
}
