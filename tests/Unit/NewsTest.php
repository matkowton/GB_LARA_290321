<?php

namespace Tests\Unit;

use App\Models\News_old;
use PHPUnit\Framework\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $model = new News_old();
        $data = $model->getByCategoryId(1);
        $this->assertIsArray($data);
        $this->assertNotEmpty($data);

        foreach ($data as $item) {
            $this->assertEquals(1, $item['category_id']);
        }
    }
}
