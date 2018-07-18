<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class DomainsTest extends TestCase
{
    use DatabaseMigrations;

    public function testAddPost()
    {
        $param = ['name' => 'http://yandex.ru'];
        $this->post('/domains', $param);
        $this->seeInDatabase('domains', $param);
    }

    public function testListAddDomain()
    {
        $domain = factory(App\Domain::class)->create();
        $this->seeInDatabase('domains', ['name' => $domain->name, 'id' => $domain->id]);
        $this->get('/domains');
        $this->assertResponseOk();
    }
}
