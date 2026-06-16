<?php

// SPDX-License-Identifier: GPL-3.0-or-later

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['nombre'])]
class Asignatura extends Model
{
    public function grupos(): HasMany
    {
        return $this->hasMany(Grupo::class);
    }
}
