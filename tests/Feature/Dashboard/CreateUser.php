<?php

namespace Tests\Feature\Dashboard;

use App\User;

trait CreateUser {
    public $user;

    public function setUp(): void {
        parent::setUp();
        $this->user = factory(User::class)->create(['type' => $this->getUserType()]);
        $this->actingAs($this->user);
    }

    /**
     * Returns the type of user being created in tests.
     * @return mixed
     */
    protected abstract function getUserType();
}
