<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        $categories=['Musica','Viaggi','Sport','Finanza','Motori','Antiquariato','Tech','Film','Letteratura','Arredamento'];
    
        foreach($categories as $category){
            DB::table('categories')->insert([
                'name'=>$category,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);
    
        // ]);
    }
    
}
}

