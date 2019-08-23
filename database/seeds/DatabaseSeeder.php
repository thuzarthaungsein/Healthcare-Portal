<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Post;
use App\Category;
use App\Customer;
use App\Job;
use App\JobDetail;
use App\Type;
use Carbon\Carbon;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        DB::table('users')->insert([
            [
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Customer',
                'email' => 'customer@gmail.com',
                'password' => bcrypt('customer'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
        DB::table('roles')->insert([
            [
                'name' => 'Administrator',
                'guard_name' => 'web',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Customer',
                'guard_name' => 'web',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
        DB::table('role_has_permissions')->insert([
            [
                'permission_id' => 1,
                'role_id' => 1,
            ],
            [
                'permission_id' => 2,
                'role_id' => 1,
            ],
            [
                'permission_id' => 3,
                'role_id' => 1,
            ],
            [
                'permission_id' => 4,
                'role_id' => 1,
            ],
            [
                'permission_id' => 5,
                'role_id' => 1,
            ],
            [
                'permission_id' => 6,
                'role_id' => 1,
            ],
            [
                'permission_id' => 7,
                'role_id' => 1,
            ],[
                'permission_id' => 8,
                'role_id' => 1,
            ],
            [
                'permission_id' => 5,
                'role_id' => 2,
            ],
            [
                'permission_id' => 6,
                'role_id' => 2,
            ],
            [
                'permission_id' => 7,
                'role_id' => 2,
            ],
            [
                'permission_id' => 8,
                'role_id' => 2,
            ],
 
        ]);
        DB::table('model_has_roles')->insert([
            [
                'role_id' => 1,
                'model_type' => 'App\User',
                'model_id' => 1,
            ],
            [
                'role_id' => 2,
                'model_type' => 'App\User',
                'model_id' => 2,
            ]
        ]);
        

        

       
        
        $faker = Faker::create();
        for ($i=0; $i < 20; $i++) { 
            $post = new Post();
            $post->title = $faker->sentence();
            $post->photo = "day1.jpg";
            $post->body = $faker->paragraph();
            $post->main_point = $faker->sentence();
            $post->category_id = rand(1, 5);
            $post->user_id = rand(1, 2);
            $post->save();
        }

        $faker = Faker::create();
        for ($i=0; $i < 10; $i++) { 
            $cus = new Customer();
            $cus->name = $faker->sentence();
            $cus->email = "customer@gmail.com";
            $cus->password = bcrypt("123123");
            $cus->logo = $faker->sentence();
            $cus->type_id = rand(1, 3);
            $cus->phone = "09-20102010";
            $cus->address = $faker->sentence();
            $cus->user_id = rand(1, 2);
            $cus->save();
        }

        // $faker = Faker::create();
        // for ($i=0; $i < 10; $i++) { 
        //     $job = new Job();
        //     $job->title = $faker->sentence();
        //     $job->customer_id = rand(1, 10);
        //     // $job->photo = $faker->sentence();
        //     $job->user_id = rand(1, 2);
        //     $job->save();
        // }
        
        // $faker = Faker::create();
        // for ($i=0; $i < 10; $i++) { 
        //     $jobdetail = new JobDetail();
        //     $jobdetail->job_id = rand(1, 10);
        //     $jobdetail->header = $faker->sentence();
        //     $jobdetail->body = $faker->paragraph();
        //     $jobdetail->user_id = rand(1, 2);
        //     $jobdetail->save();
        // }

        $category = new Category();
        $category->name = "特養";
        $category->user_id = 1;
        $category->save();

        $category = new Category();
        $category->name = "有料老人ホーム";
        $category->user_id = 1;
        $category->save();

        $category = new Category();
        $category->name = "病院";
        $category->user_id = 1;
        $category->save();

        $category = new Category();
        $category->name = "訪問介護・看護";
        $category->user_id = 1;
        $category->save();

        $category = new Category();
        $category->name = "デイサービス等";
        $category->user_id = 1;
        $category->save();

        $type = new Type();
        $type->name = "特養";
        $type->user_id = 1;
        $type->save();

        $type = new Type();
        $type->name = "有料老人ホーム";
        $type->user_id = 1;
        $type->save();

        $type = new Type();
        $type->name = "病院";
        $type->user_id = 1;
        $type->save();
        
    }
  
    
    
}
