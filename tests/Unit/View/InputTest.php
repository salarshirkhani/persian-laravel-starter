<?php

namespace Tests\Unit\View;

use App\User;
use App\View\Components\Form\Input;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InputTest extends TestCase
{
    use RefreshDatabase;

    private $input;
    private $model;

    public function setUp(): void
    {
        parent::setUp();
        $this->model = factory(User::class)->make();
        $this->input = new class('email', null) extends Input {
            public function render() {}
        };
    }

    public function test_session_override_everything() {
        $this->session([
            '_old_input' => [
                'email' => 'old-session-value'
            ]
        ]);

        $this->input->default = null;
        $this->input->model = null;
        $this->assertEquals('old-session-value', $this->input->value());

        $this->input->default = 'default-explicit-value';
        $this->input->model = null;
        $this->assertEquals('old-session-value', $this->input->value());

        $this->input->default = null;
        $this->input->model = $this->model;
        $this->assertEquals('old-session-value', $this->input->value());

        $this->input->default = 'default-explicit-value';
        $this->input->model = $this->model;
        $this->assertEquals('old-session-value', $this->input->value());
    }

    public function test_value_override_model() {
        $this->input->default = 'default-explicit-value';
        $this->input->model = null;
        $this->assertEquals('default-explicit-value', $this->input->value());

        $this->input->default = 'default-explicit-value';
        $this->input->model = $this->model;
        $this->assertEquals('default-explicit-value', $this->input->value());
    }

    public function test_model_data() {
        $this->input->default = null;
        $this->input->model = $this->model;
        $this->assertEquals($this->model->email, $this->input->value());
    }

    public function test_null() {
        $this->input->name = 'non-existent-attribute';
        $this->input->default = null;
        $this->input->model = null;
        $this->assertNull($this->input->value());

        $this->input->default = null;
        $this->input->model = $this->model;
        $this->assertNull($this->input->value());
    }
}
