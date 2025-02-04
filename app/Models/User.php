<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Ramsey\Uuid\Uuid;

final class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasUuids;
    use Notifiable;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Generate a new UUID for the model.
     */
    public function newUniqueId(): string
    {
        return (string) Uuid::uuid7();
    }

    /**
     * Get the columns that should receive a unique identifier.
     *
     * @return array<int, string>
     */
    public function uniqueIds(): array
    {
        return ['key'];
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

    /**
     * @return Attribute<string, string>
     */
    protected function lastName(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value): string => is_string($value) ? ucfirst($value) : '',
            set: fn(string $value): string => mb_strtolower($value),
        );
    }
    /** @return Attribute<string, string> */
    protected function firstName(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value): string => is_string($value) ? ucfirst($value) : '',
            set: fn(string $value): string => mb_strtolower($value),
        );
    }
    /** @return Attribute<string|null, string|null> */
    protected function otherName(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value): ?string => is_string($value) ? ucfirst($value) : null,
            set: fn(string|null $value): ?string => $value ? mb_strtolower($value) : null,
        );
    }

    /** @return Attribute<string, never> */
    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value): string => ucwords(type($value)->asString()),
        );
    }
}
