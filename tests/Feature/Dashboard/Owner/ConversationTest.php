<?php

namespace Tests\Feature\Dashboard\Owner;

use Tests\Feature\Dashboard\ConversationTestTrait;
use Tests\TestCase;

class ConversationTest extends TestCase
{

    protected function getUserType()
    {
        return 'owner';
    }

    use ConversationTestTrait;

}
