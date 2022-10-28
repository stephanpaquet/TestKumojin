<?php

namespace Tests\Unit\Http\Requests;

use App\Models\Event;
use Illuminate\Support\Str;
use Tests\TestCase;

class EventRequestTest extends TestCase
{
    protected string $routePrefix = 'events.';

    public function test_name_is_required()
    {
        $validatedField = 'name';
        $brokenRule = null;

        $event = Event::factory()->make([
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $event->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    public function test_event_must_not_exceed_32_characters()
    {
        $validatedField = 'name';
        $brokenRule = Str::random(33);

        $event = Event::factory()->make([
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $event->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    public function test_description_is_required()
    {
        $validatedField = 'description';
        $brokenRule = null;

        $event = Event::factory()->make([
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $event->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    public function test_date_begin_is_required()
    {
        $validatedField = 'dateBegin';
        $brokenRule = null;

        $event = Event::factory()->make([
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $event->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    public function test_date_begin_is_before_date_end()
    {
        $validatedField = 'dateBegin';

        $event = Event::factory()->make([
            'dateBegin' => '2022-10-10',
            'dateEnd' => '2022-09-10',
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $event->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    public function test_date_end_is_required()
    {
        $validatedField = 'dateEnd';
        $brokenRule = null;

        $event = Event::factory()->make([
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $event->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    public function test_timezone_must_be_gte_less_11()
    {
        $validatedField = 'timezone';
        $brokenRule = -12;

        $event = Event::factory()->make([
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $event->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    public function test_timezone_must_be_lte_12()
    {
        $validatedField = 'timezone';
        $brokenRule = 13;

        $event = Event::factory()->make([
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $event->toArray()
        )->assertJsonValidationErrors($validatedField);
    }
}
