<?php

declare(strict_types=1);

test('to array', function (): void {
    $user = App\Models\User::factory()->create()->refresh();
    expect(array_keys($user->toArray()))
        ->toBe([
            'id',
            'key',
            'last_name',
            'first_name',
            'other_name',
            'full_name',
            'email',
            'email_verified_at',
            'created_at',
            'updated_at',
        ]);
});

it('retrieves last name as a capitalized word', function (): void {
    $user = App\Models\User::factory()->create(['last_name' => 'doe'])->refresh();
    expect($user->last_name)->toBe('Doe');
});

it('it insert last name as lower case', function (): void {
    $user = App\Models\User::factory()->create(['last_name' => 'DoE'])->refresh();
    expect($user->getAttributes()['last_name'])->toBe('doe');
});

it('retrieves first name as a capitalized word', function (): void {
    $user = App\Models\User::factory()->create(['first_name' => 'bunny'])->refresh();
    expect($user->first_name)->toBe('Bunny');
});

it('it insert first name in lower case letters', function (): void {
    $user = App\Models\User::factory()->create(['first_name' => 'bUnny'])->refresh();
    expect($user->getAttributes()['first_name'])->toBe('bunny');
});

it('retrieves the full name in the right case', function (): void {
    $user = App\Models\User::factory()->create([
        'last_name' => 'ChRis',
        'first_name' => 'don',
        'other_name' => 'graham',
    ])->refresh();
    expect($user->full_name)->toBe('Chris Don Graham');
});
