<?php
namespace Database\Seeders;


use App\Models\Attribute;
use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a size attribute
        Attribute::create([
            'code'          =>  'size',
            'name'          =>  'Size',
        ]);

        // Create a color attribute
        Attribute::create([
            'code'          =>  'color',
            'name'          =>  'Color',
        ]);
    }
}
