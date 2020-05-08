<?php

namespace App\Policies;

class ServicePolicy {
    use ItemPolicy;

    protected static function getItemType(): string
    {
        return 'service';
    }
}
