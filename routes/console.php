<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('resetadmin', function () {
    $password = readline('Ubah password : ');
    $ubah = \App\User::where('akses',0)->update(['password' => Hash::make($password)]);
    if($ubah){
        echo 'berhasil diubah';
    }else {
        echo 'gagal diubah';
    }
});
