<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class CreateWriterUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:writer-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an writer user with the writer role';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user1 = User::factory()->create([
            'name' => 'writer',
            'email' => 'writer@example.com',
        ]);

        $role = Role::create(['name' => 'writer']);
        $user1->assignRole($role);

        $this->info('writer user created successfully. Password: password');
    }
}
