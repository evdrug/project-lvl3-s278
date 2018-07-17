<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class HomeTest extends TestCase
{
    public function testIndexPage()
    {
        $this->get('/');
        $this->assertResponseOk();
    }
}
