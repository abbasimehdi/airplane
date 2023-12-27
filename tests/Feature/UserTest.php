<?php

namespace Tests\Feature\Users;

use App\Models\Schmas\Constants\BaseConstants;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('passport:install');
        $this->user = User::factory(1)->create(['password' => 123456])->first();
        $this->ticket = Ticket::factory(1)->create(['user_id' => $this->user['id']]);
        $this->token = $this->user->createToken('test token')->accessToken;
    }

    /**
     * @test
     */
    public function a_user_can_be_create_the_ticket(): void
    {
        $response = $this->actingAs($this->user, 'api')->withHeader(
                'Authorization', "Bearer $this->token"

        )
            ->json('POST', "/api/ticket" ,
            [
                BaseConstants::ORIGIN => str_replace(' ', '', fake()->city),
                BaseConstants::DESTINATION => str_replace(' ', '', fake()->city),
                BaseConstants::START_DATE => fake()->date(),
                BaseConstants::END_DATE => fake()->date(),
            ]
        );


        $response->assertStatus(201);
    }
}
