<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            'item_name' => '腕時計',
            'price' => 15000,
            'brand_name' => 'Rolax',
            'description' => 'スタイリッシュなデザインのメンズ腕時計',
            'img_url' => 'items/Clock.jpg',
            'category' => NULL,
            'condition' => '良好',
        ];
        DB::table('items')->insert($items);
        $items = [
            'item_name' => 'HDD',
            'price' => 5000,
            'brand_name' => '西芝',
            'description' => '高速で信頼性の高いハードディスク',
            'img_url' => 'items/HDD.jpg',
            'category' => NULL,
            'condition' => '目立った傷や汚れなし',
        ];
        DB::table('items')->insert($items);
        $items = [
            'item_name' => '玉ねぎ3束',
            'price' => 300,
            'brand_name' => 'なし',
            'description' => '新鮮な玉ねぎ3束のセット',
            'img_url' => 'items/Onion.jpg',
            'category' => NULL,
            'condition' => 'やや傷や汚れあり',
        ];
        DB::table('items')->insert($items);
        $items = [
            'item_name' => '革靴',
            'price' => 4000,
            'brand_name' => NULL,
            'description' => 'クラシックなデザインの革靴',
            'img_url' => 'items/LeatherShoes.jpg',
            'category' => NULL,
            'condition' => '状態が悪い',
        ];
        DB::table('items')->insert($items);
        $items = [
            'item_name' => 'ノートPC',
            'price' => 45000,
            'brand_name' => NULL,
            'description' => '高性能なノートパソコン',
            'img_url' => 'items/PC.jpg',
            'category' => NULL,
            'condition' => '良好',
        ];
        DB::table('items')->insert($items);
        $items = [
            'item_name' => 'マイク',
            'price' => 8000,
            'brand_name' => 'なし',
            'description' => '高音質のレコーディング用マイク',
            'img_url' => 'items/Mic.jpg',
            'category' => NULL,
            'condition' => '目立った傷や汚れなし',
        ];
        DB::table('items')->insert($items);
        $items = [
            'item_name' => 'ショルダーバッグ',
            'price' => 3500,
            'brand_name' => NULL,
            'description' => 'おしゃれなショルダーバッグ',
            'img_url' => 'items/Bag.jpg',
            'category' => NULL,
            'condition' => 'やや傷や汚れあり',
        ];
        DB::table('items')->insert($items);
        $items = [
            'item_name' => 'タンブラー',
            'price' => 500,
            'brand_name' => 'なし',
            'description' => '使いやすいタンブラー',
            'img_url' => 'items/Tumbler.jpg',
            'category' => NULL,
            'condition' => '状態が悪い',
        ];
        DB::table('items')->insert($items);
        $items = [
            'item_name' => 'コーヒーミル',
            'price' => 4000,
            'brand_name' => 'Starbacks',
            'description' => '手動のコーヒーミル',
            'img_url' => 'items/Coffee.jpg',
            'category' => NULL,
            'condition' => '良好',
        ];
        DB::table('items')->insert($items);
        $items = [
            'item_name' => 'メイクセット',
            'price' => 2500,
            'brand_name' => NULL,
            'description' => '便利なメイクアップセット',
            'img_url' => 'items/Makeup.jpg',
            'category' => NULL,
            'condition' => '目立った傷や汚れなし',
        ];
        DB::table('items')->insert($items);
    }
}
