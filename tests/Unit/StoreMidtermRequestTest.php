<?php

namespace Tests\Unit;

use App\Http\Requests\Midterm\StoreMidtermRequest;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class StoreMidtermRequestTest extends TestCase
{
    public function test_store_request_rules()
    {
        $request = new StoreMidtermRequest();

        $rules = collect($request->rules())->map(function ($rule) {
            return is_array($rule) ? $rule : explode('|', $rule);
        });

        $this->assertArrayHasKey('midtermCode', $rules->toArray());
        $this->assertEquals(['required', 'string', 'max:30'], $rules['midtermCode']);
        $this->assertArrayHasKey('abbreviation', $rules->toArray());
        $this->assertEquals(['required', 'string', 'size:3', 'alpha'], $rules['abbreviation']);
        $this->assertArrayHasKey('startDate', $rules->toArray());
        $this->assertEquals(['required', 'date', 'before:endDate'], $rules['startDate']);
    }

    public function test_store_request_authorization()
    {
        Auth::shouldReceive('user')->andReturn((object)['role' => 'DEV']);
        $request = new StoreMidtermRequest();
        $this->assertTrue($request->authorize());
    }
}
