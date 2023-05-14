<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuItem;

class MenuItemsTableSeeder extends Seeder
{
    public function run()
    {
        $menuItems = [
            [
                'item_name' => 'Apple',
                'item_price' => 10,
            ],
            [
                'item_name' => 'Banana',
                'item_price' => 8,
            ],
            [
                'item_name' => 'Melon',
                'item_price' => 6,
            ],
        ];

        foreach ($menuItems as $menuItem) {
            MenuItem::create($menuItem);
        }
    }
}
