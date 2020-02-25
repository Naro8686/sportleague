<?php

namespace App\Providers;

use App\Models\Settings;
use Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $driver = DB::table('settings')->where('title', 'SMTP Driver')->first();
        $host = DB::table('settings')->where('title', 'SMTP Host')->first();
        $port = DB::table('settings')->where('title', 'SMTP Port')->first();
        $from = DB::table('settings')->where('title', 'SMTP From')->first();
        $from_name = DB::table('settings')->where('title', 'SMTP From name')->first();
        $encryption = DB::table('settings')->where('title', 'SMTP Encryption')->first();
        $username = DB::table('settings')->where('title', 'SMTP Username')->first();
        $password = DB::table('settings')->where('title', 'SMTP Password')->first();

        $config = array(
            'driver' => $driver->content,
            'host' => $host->content,
            'port' => $port->content,
            'from' => array('address' => $from->content, 'name' => $from_name->content),
            'encryption' => $encryption->content,
            'username' => $username->content,
            'password' => $password->content,
            'sendmail' => '/usr/sbin/sendmail -bs',
            'pretend' => false,
        );
        Config::set('mail', $config);
    }
}