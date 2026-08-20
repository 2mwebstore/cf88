<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Video;

class VideoSeeder extends Seeder
{
    public function run(): void
    {
        $videos = [
            [
                'title' => 'V168',
                'url' => 'https://livecpc247.com/live/168.m3u8',
                'thumb' => 'https://livedagathomo.com/wp-content/uploads/2025/08/lich-truc-tiep-da-ga-thomo-hom-nay-1-768x384.jpg',
                'message' => 'coming soon',
                'votes_red' => 0,
                'votes_blue' => 0,
                'votes_total' => 0,
                'red_percent_vote' => 50,
                'blue_percent_vote' => 50,
            ],
            [
                'title' => 'CPC4',
                'url' => 'https://livecpc247.com/live/CPC4.m3u8',
                'thumb' => 'https://livedagathomo.com/wp-content/uploads/2025/08/cac-the-da-ga-pho-bien-tai-thomo-5.jpg',
                'message' => 'coming soon',
                'votes_red' => 0,
                'votes_blue' => 0,
                'votes_total' => 0,
                'red_percent_vote' => 50,
                'blue_percent_vote' => 50,
            ],
            [
                'title' => 'CPC5',
                'url' => 'https://livecpc247.com/live/CPC5.m3u8',
                'thumb' => 'https://livedagathomo.com/wp-content/uploads/2025/08/vi-sao-da-ga-tho-mo-duoc-ua-chuong-nhat-hien-nay.png',
                'message' => 'coming soon',
                'votes_red' => 0,
                'votes_blue' => 0,
                'votes_total' => 0,
                'red_percent_vote' => 50,
                'blue_percent_vote' => 50,
            ],
            [
                'title' => 'TONHON',
                'url' => 'https://livecpc247.com/live/tonhon.m3u8',
                'thumb' => 'https://livedagathomo.com/wp-content/uploads/2025/08/cach-xem-da-ga-thomo-tren-dien-thoai-768x384.jpg',
                'message' => 'coming soon',
                'votes_red' => 0,
                'votes_blue' => 0,
                'votes_total' => 0,
                'red_percent_vote' => 50,
                'blue_percent_vote' => 50,
            ],
        ];

        foreach ($videos as $video) {
            Video::create($video);
        }
    }
}
