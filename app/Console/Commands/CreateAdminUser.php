<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Spatie\Permission\Models\Role;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an admin user with the admin role';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user1 = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);

        $role = Role::create(['name' => 'admin']);
        $user1->assignRole($role);

        $this->info('Admin user created successfully. Password: password');
    }
}
