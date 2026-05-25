<?php
// SPDX-License-Identifier: GPL-3.0-or-later

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\Permission\Traits\HasRoles;

#[Fillable(['username', 'email', 'name', 'last_name', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;
    use HasRoles;

    protected function username(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => mb_convert_case($value, MB_CASE_LOWER),
        );
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => mb_convert_case($value, MB_CASE_TITLE),
        );
    }

    protected function lastName(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => mb_convert_case($value, MB_CASE_TITLE),
        );
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function inscrito(): BelongsToMany
    {
        return $this->belongsToMany(Grupo::class);
    }
}
