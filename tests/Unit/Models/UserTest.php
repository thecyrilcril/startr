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


it('formats last name correctly when getting', function (): void {
    $user = App\Models\User::factory()->create(['last_name' => 'doe'])->refresh();
    expect($user->last_name)->toBe('Doe');
});

it('formats last name correctly when setting', function (): void {
    $user = App\Models\User::factory()->create(['last_name' => 'DoE'])->refresh();
    expect($user->getAttributes()['last_name'])->toBe('doe');
});
