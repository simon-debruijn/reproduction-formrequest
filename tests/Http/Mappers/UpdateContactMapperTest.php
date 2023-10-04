<?php

declare(strict_types=1);

namespace Tests\Http\Mappers;

use App\Domain\Contact;
use App\Http\Mappers\UpdateContactMapper;
use App\Http\Requests\UpdateContactRequest1;
use App\Http\Requests\UpdateContactRequest2;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;
use Tests\TestCase;

final class UpdateContactMapperTest extends TestCase
{
    public function test_it_updates_contact_from_request_1() {
        $request = new UpdateContactRequest1();
        $request->merge([
            'contactName' => 'John'
        ]);
        $id = '2e43a655-e24d-4de0-93f9-5e33b0c1f8ac';

        $actual = UpdateContactMapper::map($request, $id);

        $expected = new Contact(Uuid::fromString($id), 'John');

        $this->assertEquals($expected, $actual);
    }

    public function test_it_updates_contact_from_request_2() {
        $request = new UpdateContactRequest2();
        $request->merge([
            'contact.name' => 'John'
        ]);
        $id = '2e43a655-e24d-4de0-93f9-5e33b0c1f8ac';

        $actual = UpdateContactMapper::map($request, $id);

        $expected = new Contact(Uuid::fromString($id), 'John');

        $this->assertEquals($expected, $actual);
    }

    public function test_it_has_no_validation_errors_for_request_1() {
        $request = new UpdateContactRequest1();
        $request->merge([
            'contactName' => 'John'
        ]);

        $validator = Validator::make($request->all(), $request->rules());

        $errors = $validator->errors()->toArray();

        $this->assertArrayNotHasKey('contactName', $errors);
    }

    public function test_it_has_no_validation_errors_for_request_2() {
        $request = new UpdateContactRequest2();
        $request->merge([
            'contact.name' => 'John'
        ]);

        $validator = Validator::make($request->all(), $request->rules());

        $errors = $validator->errors()->toArray();

        $this->assertArrayNotHasKey('contact.name', $errors);
    }
}
