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
    public function test_can_get_all_properties(): void
    {
        $event = Event::factory()->create();

        $response = $this->getJson(route($this->routePrefix . 'index'));
        $response->assertOk();

        $response->assertJson([
            'data' => [
                [
                    'id' => $event->id,
                    'name' => $event->name,
                    'description' => $event->description,
                    'dateBegin' => $event->dateBegin->format('Y-m-d H:i:s'),
                    'dateEnd' => $event->dateEnd->format('Y-m-d H:i:s'),
                ]
            ]
        ]);
    }
}
