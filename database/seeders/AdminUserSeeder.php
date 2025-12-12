<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * Admin User Seeder
 * 
 * Creates the admin user with the following credentials:
 * Email: ghulammustafa.bscsf22@iba-suk.edu.pk
 * Password: ghulam786@
 */
class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if admin user already exists
        $admin = User::where('email', 'ghulammustafa.bscsf22@iba-suk.edu.pk')->first();

        if (!$admin) {
            User::create([
                'name' => 'Admin User',
                'email' => 'ghulammustafa.bscsf22@iba-suk.edu.pk',
                'password' => Hash::make('ghulam786@'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]);

            $this->command->info('Admin user created successfully!');
        } else {
            // Update existing user to be admin
            $admin->update([
                'is_admin' => true,
                'password' => Hash::make('ghulam786@'),
            ]);

            $this->command->info('Admin user updated successfully!');
        }
    }
}
