<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class DomainsTest extends TestCase
{
    use DatabaseMigrations;

    public function testIndexDomainPage()
    {
        $this->get('/domains');
        $this->assertResponseOk();
    }

    public function testAddDomain()
    {
        $this->post('/domains',['name' => 'http://yandex.ru']);
        $this->seeInDatabase('domains', ['name' => 'http://yandex.ru']);
    }
}
