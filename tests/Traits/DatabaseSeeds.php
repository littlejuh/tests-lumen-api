<?php

namespace App\Tests\Traits;

trait DatabaseSeeds
{
    /**
     * Run the dabase seeds for the application.
     *
     * @return void
     * @before
     */
    public function runDatabaseSeeds()
    {
        $this->artisan('db:seed');
    }
}
