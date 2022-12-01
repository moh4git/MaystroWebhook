<?php

namespace Moh4git\MaystroWebhook\Facades;

use Illuminate\Support\Facades\Facade;

class MaystroWebhook extends Facade {
    protected static function getFacadeAccessor() {
        return 'maystrowebhook';
    }
}