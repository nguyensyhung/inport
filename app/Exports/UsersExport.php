<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class UsersExport implements FromQuery
{
    use Exportable;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function query()
    {
        return User::query()->whereId($this->id);
    }
}
