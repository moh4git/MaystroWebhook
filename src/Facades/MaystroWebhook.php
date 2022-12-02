<?php

namespace MaystroWebhook\Facades;

use Illuminate\Support\Facades\Facade;

class MaystroWebhook extends Facade {
    protected static function getFacadeAccessor() {
        return 'maystrowebhook';
    }
}