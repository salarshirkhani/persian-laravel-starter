<?php

namespace App\Policies;

class ProductPolicy {
    use ItemPolicy;

    protected static function getItemType(): string
    {
        return 'product';
    }
}
