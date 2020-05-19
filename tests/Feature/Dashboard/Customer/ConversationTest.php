<?php

namespace Tests\Feature\Dashboard\Customer;

use Tests\Feature\Dashboard\ConversationTestTrait;
use Tests\TestCase;

class ConversationTest extends TestCase
{

    protected function getUserType()
    {
        return 'customer';
    }

    use ConversationTestTrait;

}
