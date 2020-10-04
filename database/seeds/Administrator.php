<?php

use Illuminate\Database\Seeder;
use App\User;

class Administrator extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new User();
        $administrator->username = 'administrator';
        $administrator->name     = 'Site Administrator';
        $administrator->email    = 'administrator@test.test';
        $administrator->roles    = json_encode(['ADMIN']);
        $administrator->password = \Hash::make('passsword');
        $administrator->avatar   = 'saat-ini-tidak-ada-image.png';
        $administrator->address  = 'Pancoran, Jakarta Selatan';
        $administrator->phone    = '0851111111';
        $administrator->save();

        $this->command->info('User Admin berhasil diinsert');
    }
}
