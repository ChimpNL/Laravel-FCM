<?php

namespace LaravelFCM;

use GuzzleHttp\Client;
use Illuminate\Support\Manager;

class FCMManager extends Manager
{

    public function __construct($app)
    {
        parent::__construct($app);
        $this->app = $app;
    }

    public function getDefaultDriver()
    {
        return $this->app[ 'config' ][ 'fcm.driver' ];
    }

    protected function createHttpDriver()
    {
        $config = $this->app[ 'config' ]->get('fcm.http', []);

        return new Client(['timeout' => $config[ 'timeout' ]]);
    }
}
