<?php

namespace App\CustomRepo;

use Illuminate\Database\Eloquent\Collection;

interface searchrepo
{
    public function search(string $query=''): Collection;
}
?>