<?php

declare(strict_types=1);

namespace App\Http\Mappers;

use App\Domain\Contact;
use App\Http\Requests\UpdateContactRequest1;
use App\Http\Requests\UpdateContactRequest2;
use Ramsey\Uuid\Uuid;

final class UpdateContactMapper
{
    public static function map(UpdateContactRequest1|UpdateContactRequest2 $request, string $id): Contact {
        if ($request instanceof UpdateContactRequest1) {
            $name = $request->input('contactName');
        } else {
            $name = $request->input('contact.name');
        }

        return new Contact(
            Uuid::fromString($id),
            $name
        );
    }
}
