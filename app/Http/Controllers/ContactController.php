<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Mappers\UpdateContactMapper;
use App\Http\Requests\UpdateContactRequest1;

final class ContactController extends Controller
{
    public function update(UpdateContactRequest1 $request, string $id): void
    {
        $updatedContact = UpdateContactMapper::map($request, $id);
    }
}
