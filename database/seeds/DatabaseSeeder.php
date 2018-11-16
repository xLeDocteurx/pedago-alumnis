<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RegionTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RolesUsersTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(EventsUsersTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
        $this->call(JobsTableSeeder::class);
        $this->call(TagsFamilyTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(JobTagTableSeeder::class);
        $this->call(TagUserTableSeeder::class);
        $this->call(FormationsTableSeeder::class);
        $this->call(FormationUserTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
    }
}
