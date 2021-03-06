<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //头像随机数组
        $avatars = [
            '/upload/images/avatars/202007/08/avatar-14-07-181682.jpg',
            '\upload\images\avatars\202007\10\avatar-08-28-323156.png',
            '\upload\images\avatars\202007\10\avatar-08-28-527659.jpg',
            '\upload\images\avatars\202007\10\avatar-08-29-031325.png',
            '\upload\images\avatars\202007\10\avatar-08-29-176209.jpg',
            '\upload\images\avatars\202007\10\avatar-08-29-476672.jpg',
            '\upload\images\avatars\202007\10\avatar-08-31-265446.jpg',
            '\upload\images\avatars\202007\10\avatar-08-31-457271.jpg',
            '\upload\images\avatars\202007\10\avatar-08-32-108226.png',
            '\upload\images\avatars\202007\10\avatar-08-32-213471.jpg'
        ];

        $users = factory(User::class)->times(30)->make()->each(function ($user, $index) use ($avatars) {
            $user->avatar = $avatars[array_rand($avatars)];
        })->makeVisible('password')->toArray();

        User::insert($users);

        $user = User::find(1);
        $user->name = 'master';
        $user->save();

        //用户1给站长角色
        $user->assignRole('master');

        //用户2给管理员角色
        $user = User::find(2);
        $user->name = 'admin';
        $user->save();
        $user->assignRole('admin');
    }
}
