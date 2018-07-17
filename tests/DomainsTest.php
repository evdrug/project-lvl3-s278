<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class DomainsTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();
        \Illuminate\Support\Facades\Artisan::call('migrate');
    }

    public function testIndexDomainPage()
    {
        $this->get('/domains');
        $this->assertResponseOk();
    }

    public function testAddDomain()
    {
        $this->post('/domains',['name' => 'http://exemplew23.com']);
        $this->seeInDatabase('domains', ['name' => 'http://exemplew23.com']);
    }
}
