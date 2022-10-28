<?php

namespace Tests\Feature\Api;

use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventsTest extends TestCase
{
    protected string $routePrefix = 'events.';

    use RefreshDatabase;

    /**
     * @return void
     */
    public function test_can_get_all_events(): void
    {
        $event = Event::factory()->create([
            "timezone" => -2,
            "dateBegin" => "2022-12-01 22:00:00",
        ]);

        $response = $this->getJson(route($this->routePrefix . 'index'));
        $response->assertOk();
        $this->assertEquals("2022-12-01 20:00:00", $event->dateBeginLocal);

        $response->assertJson([
            'data' => [
                [
                    'id' => $event->id,
                    'name' => $event->name,
                    'description' => $event->description,
                    'dateBegin' => $event->dateBegin,
                    'dateBeginLocal' => $event->dateBeginLocal,
                    'dateEnd' => $event->dateEnd,
                    'dateEndLocal' => $event->dateEndLocal,
                ]
            ]
        ]);
    }

    public function test_can_store_an_event()
    {
        $event = Event::factory()->make();
        $response = $this->postJson(
            route($this->routePrefix . 'store'),
            $event->toArray()
        );

        $response->assertStatus(201);
    }
}
