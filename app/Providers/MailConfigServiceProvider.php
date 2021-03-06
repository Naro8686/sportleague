<?php

namespace App\Providers;

use App\Models\Settings;
use Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        if(Schema::hasTable('settings')){
            $smtp = DB::table('settings')->where('title', 'SMTP')->first();
            if(!is_null($smtp)){
                $smtp = json_decode($smtp->content);

                $config = array(
                    'driver' => $smtp->driver,
                    'host' => $smtp->host,
                    'port' => $smtp->port,
                    'from' => array('address' => $smtp->from, 'name' => $smtp->from_name),
                    'encryption' => $smtp->encryption,
                    'username' => $smtp->username,
                    'password' => $smtp->password,
                    'sendmail' => '/usr/sbin/sendmail -bs',
                    'pretend' => false,
                );
                Config::set('mail', $config);
            }
        }
    }
}