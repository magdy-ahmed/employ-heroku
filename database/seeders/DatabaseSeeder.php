<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();


        foreach (range(1,500) as $index) {
            DB::table('places')->insert([
                'name' => $faker->name(),
                'content' => Str::random(500),
                'excerpt' => Str::random(150),
                'openAt' => now(),
                'closeAt' => now(),
                'phone' => $faker->randomNumber(),
                'country' => $faker->city(),
                'city' => $faker->city(),
                'address' => Str::random(15),
                'status' => $faker->boolean(),
                'user_id' => $faker->numberBetween(1,5)
            ]);
        }
        foreach (range(1,500) as $index) {
            DB::table('services')->insert([
                'title' => $faker->jobTitle(),
                'slug' => Str::random(50),
                'content' => Str::random(500),
                'excerpt' => Str::random(150),
                'salery' => $faker->numberBetween(100,2000),
                'discount' => $faker->numberBetween(1,50),
                'user_id' => $faker->numberBetween(1,5),
                'status' => $faker->boolean(),
                'place_id' => $faker->numberBetween(1, 200)
            ]);
        }
        foreach (range(1,500) as $index) {
            DB::table('affiliate')->insert([
                'user_id' => $faker->numberBetween(1,5),
                'tag' => Str::random(150),
                'referral' => "http://127.0.0.1:8000",
                'expire_at' =>now(),
            ]);
        }
        foreach (range(1,50) as $index) {
            DB::table('notifications')->insert([
                'name' => Str::random(25),
                'content' =>  Str::random(200),
                'type' => 'now-role',
                'role_id' => $faker->numberBetween(1,5),
                'created_at' => now()
            ]);
            // ['user','now-role','buy-role','sale-role','welcome-role']);
        //    ;->randomElement(['foo' ,'bar', 'baz']),
        }
        foreach (range(1,50) as $index) {
            DB::table('notifications')->insert([
                'name' => Str::random(25),
                'content' => Str::random(200),
                'type' => 'user',
                'user_id' => $faker->numberBetween(1,5),
                'created_at' => now()
            ]);
            // ['user','now-role','buy-role','sale-role','welcome-role']);
        //    ;->randomElement(['foo' ,'bar', 'baz']),
        }


        foreach (range(1,50) as $index) {
            DB::table('user_favorite')->insert([
                'service_id' => $faker->numberBetween(1,200),
                'user_id' => $faker->numberBetween(1,5),
           ]);
        }
        // \App\Models\User::factory(10)->create();
    }
}



// INSERT INTO users (`id`,`name`,`phone`,`password`,`created_at`,`updated_at`)
// VALUES (1,'admin','01012345678','$2y$10$ZFB1dhX6yi09GkI82KOzte1RLC3cMwfQzD6t.C8ou8oEmC2Od5Suq',
//        '2021-10-31 19:48:19','2021-10-31 19:48:19'),
//        (2,'maketing','01112345678','$2y$10$ZFB1dhX6yi09GkI82KOzte1RLC3cMwfQzD6t.C8ou8oEmC2Od5Suq',
//        '2021-10-31 19:48:19','2021-10-31 19:48:19'),
//        (3,'seller','01212345678','$2y$10$ZFB1dhX6yi09GkI82KOzte1RLC3cMwfQzD6t.C8ou8oEmC2Od5Suq',
//        '2021-10-31 19:48:19','2021-10-31 19:48:19'),
//        (4,'user','01512345678','$2y$10$ZFB1dhX6yi09GkI82KOzte1RLC3cMwfQzD6t.C8ou8oEmC2Od5Suq',
//         '2021-10-31 19:48:19','2021-10-31 19:48:19'),
//        (5,'market and seller','01412345678','$2y$10$ZFB1dhX6yi09GkI82KOzte1RLC3cMwfQzD6t.C8ou8oEmC2Od5Suq',
//         '2021-10-31 19:48:19','2021-10-31 19:48:19');
// INSERT INTO `profiles` (`user_id`) VALUES (1),(2),(3),(4),(5);
// INSERT INTO roles (`id` ,`name`,`slug`) VALUES
//         (1,'أدارة الموقع','admin'),
//         (2,'مسوق','markiting'),
//         (3,'مزود خدمات','seller'),
//         (4,'مستخدم','user'),
//         (5,'مسوق و مزود خدمات','market&seller');
// INSERT INTO permissions (`id` ,`name`,`slug`) VALUES
//         (1,'مدير الموقع','manage'),
//         (2,'يسوق لأضافة مزودى الخدمة','market'),
//         (3,'يبيع ويعرض خدماتة','sell'),
//         (4,'يستخدم','user'),
//         (5,'أدارة المحتوى','controll');
// INSERT INTO roles_permissions(`role_id` ,`permission_id`) VALUES
//             (1,1),(2,2),(3,3),(4,4),(1,2),(1,3),(1,4),(2,4)
//             ,(3,4),(5,2), (5,3) ,(5,4),
//             (1,5),(2,5),(3,5),(5,5);
// INSERT INTO `users_roles` (user_id, role_id) VALUES
// 			(1,1),(2,2),(3,3),(4,4),(5,5);
// INSERT INTO `settings`(`name`,`desc`,`element`) VALUES
// 			('affiliate-expire','أنتهاء صلاحية الرابط بعد أنشائة','30');



