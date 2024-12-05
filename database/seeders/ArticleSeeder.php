<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = DB::table('users')->pluck('id');
        $userIds = $userIds->toArray();
        DB::table('articles')->insert([
            'title' => 'The Gender Pay Gap: Why It Still Exists and What Needs to Change',
            'content' => 'The gender pay gap remains a significant issue, where women, on average, earn less than men for similar work. While some argue it’s due to personal choices, such as career paths and work hours, others highlight discrimination and unequal opportunities. Closing the gap could promote fairness, boost economic growth, and improve social equality. However, some believe the gap reflects natural market dynamics and personal preferences, suggesting that immediate eradication may not be the solution. Addressing this complex issue requires a balanced approach, including better pay transparency, support for work-life balance, and fairer policies in the workplace.',
            'datetime_posted' => date("Y-m-d", rand(strtotime("2020-1-1"), strtotime("2024-12-31"))),
            'user_id' => $userIds[array_rand($userIds)],
            'image_path' => '/storage/images/Q2sRvbAYglZC9yL056QPQWXwgxU58lHJxKVQ3rav.jpg'
        ]);
        DB::table('articles')->insert([
            'title' => 'Breaking Free from Gender Stereotypes',
            'content' => 'Gender stereotypes limit both men and women by imposing rigid roles based on outdated norms. Women are often expected to be nurturing and supportive, while men are pressured to be strong and unemotional. These stereotypes not only restrict personal freedom but also hinder professional growth. For example, women may be overlooked for leadership roles because they are seen as less authoritative, while men may be discouraged from pursuing careers in nursing or teaching. Challenging these stereotypes is essential for creating a society where individuals can freely express themselves and pursue careers or lifestyles without fear of judgment or restriction.',
            'datetime_posted' => date("Y-m-d", rand(strtotime("2020-1-1"), strtotime("2024-12-31"))),
            'user_id' => $userIds[array_rand($userIds)],
            'image_path' => '/storage/images/LI6wuEl6zK6oMNdcy299yhiIIzMr3246ui7clV3A.jpg'
        ]);
    }
}
