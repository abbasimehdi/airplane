<?php

namespace Tests\Unit;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class TicketTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('passport:install');
        $this->user = User::factory(1)->create(['password' => 123456])->first();
    }

    /**
     * @test
     */
    public function user_table_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('tickets', [
                'user_id',
                'origin',
                'destination',
                'start_date',
                'end_date'
            ]));
    }


    /** @test */
    public function it_has_one_user()
    {
        $reservation = Ticket::factory()->create([
            'user_id' => $this->user->id,
        ]);
    }
}
