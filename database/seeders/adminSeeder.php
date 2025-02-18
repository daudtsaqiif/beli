<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('admin'); // Gunakan Hash::make()
        $user->role = 'admin';
        $user->bank_account = 'admin';
        $user->bank_account_number = '1234567890';
        $user->bank_name = 'BCA';
        $user->avatar = 'https://via.placeholder.com/150'; // Ganti dengan URL avatar jika perlu
        $user->description = 'Akun admin untuk manajemen sistem';
        $user->save();
    }
}
