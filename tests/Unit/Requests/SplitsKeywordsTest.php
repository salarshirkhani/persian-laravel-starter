<?php

namespace Tests\Unit\Requests;

use App\Http\Requests\SplitsKeywords;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SplitsKeywordsTest extends TestCase
{
    private $splitter;
    public $keywordRaw;

    public function setUp(): void
    {
        parent::setUp();
        $this->splitter = new class($this) {
            use SplitsKeywords;
            private $parent;

            public function __construct($parent)
            {
                $this->parent = $parent;
            }

            public function validated()
            {
                $data = ['keywords' => $this->parent->keywordRaw];
                return $this->addKeywordsToData($data);
            }
        };
    }

    public function test_empty_keyword_string()
    {
        $this->keywordRaw = "";
        $this->assertEquals(['keywords' => []], $this->splitter->validated());
    }

    public function test_split_keyword_by_colon()
    {
        $this->keywordRaw = "test 1,test 2,test 3";
        $this->assertEquals(['keywords' => ['test 1', 'test 2', 'test 3']], $this->splitter->validated());
    }

    public function test_split_keyword_by_virgool()
    {
        $this->keywordRaw = "test 1،test 2،test 3";
        $this->assertEquals(['keywords' => ['test 1', 'test 2', 'test 3']], $this->splitter->validated());
    }

    public function test_split_keyword_by_mixed_separators()
    {
        $this->keywordRaw = "test 1,test 2،test 3";
        $this->assertEquals(['keywords' => ['test 1', 'test 2', 'test 3']], $this->splitter->validated());
    }

}
