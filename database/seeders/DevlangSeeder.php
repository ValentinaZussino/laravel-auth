<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Devlang;

class DevlangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $devlangs = ['Html', 'Css', 'Javascript', 'Scss', 'Php', 'Mysql'];
        foreach($devlangs as $devlang){
            $new_devlang = new Devlang();
            $new_devlang->name = $devlang;
            $new_devlang->slug = Str::slug($new_devlang->name, '-');
            $new_devlang->save();
        }
    }
}
