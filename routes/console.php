<?php

use App\Models\Notification;
use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

/**
 * Send notifications on users birthdates.
 */
Schedule::call(function() {
    $birthdayPeople = DB::table('users')->whereMonth('birthday', date('m'))->whereDay('birthday', date('d'))->get();

    foreach($birthdayPeople as $bp){
        Notification::create([
            'user_matricula' => $bp->matricula,
            'subject' => '¡Feliz cumpleaños!',
            'body' => 'Solo queremos decirte gracias por estar aqui con nosotros. <3',
            'icon' => '/Birthday/Celebrate_'.fake()->randomElement(['Bronti.png','Bronti.gif','Rexxii.png','Seri.png','Steggi.png','Teri.png']),
            'created_by' => "00"
        ]);
    }
})->daily();
