<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Subject;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('settings')->insert([
            [
                'name' => 'New App',
                'phone' => '00201021464469',
                'address' => 'Egypt - Cairo',
                'description' => 'Web Site Description',
                'email' => 'thebeststory0@gmail.com',
                'logo' => '/backend/demo.png',
                'icon' => '/backend/demo.png',
                'tip_img' => '/front/img/group-24.png',
                'facebook' => 'https://www.facebook.com/alnefelys',
                'whatsapp' => 'https://wa.me/+201021464469',
            ],
        ]);

        $RolesNames = Schema::getColumnListing('roles');
        $newRows = [];
        foreach ($RolesNames as $val):
            $newRows[$val] = 'on';
            ($val=='id') ? $newRows[$val] = 1 : null;
            ($val=='name') ? $newRows[$val] = 'صلاحية كاملة' : null;
            ($val=='main') ? $newRows[$val] = 'main' : null;
            ($val=='created_at') ? $newRows[$val] = now() : null;
            ($val=='updated_at') ? $newRows[$val] = now() : null;
        endforeach;
        DB::table('roles')->insert($newRows);

        DB::table('admins')->insert([
            [
                'name'      => 'Abdelrhman Mohamed',
                'email'     => 'admin@admin.com',
                'password'  => bcrypt(123456),
                'img'       =>'/backend/demo.png',
                'main'      =>'main',
                'role_id'   => 1,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);





    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('seed');
    }
};
