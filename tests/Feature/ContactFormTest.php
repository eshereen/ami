<?php

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('contact form stores message and redirects with success message', function () {
    // Mock the Mail facade to prevent actual email sending during tests
    Mail::fake();

    $contactData = [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'phone' => '+1234567890',
        'message' => 'This is a test message for the contact form.'
    ];

    $response = $this->post(route('contact.store'), $contactData);

    // Assert the contact was created in the database
    $this->assertDatabaseHas('contacts', [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'phone' => '+1234567890',
        'message' => 'This is a test message for the contact form.'
    ]);

    // Assert redirect to home page
    $response->assertRedirect(route('home'));

    // Assert success flash message is set
    $response->assertSessionHas('success', 'Contact message sent successfully');
});

test('contact form validation works correctly', function () {
    $response = $this->post(route('contact.store'), []);

    $response->assertSessionHasErrors(['name', 'email', 'phone', 'message']);
});

test('contact form accepts valid data', function () {
    Mail::fake();

    $contactData = [
        'name' => 'Jane Smith',
        'email' => 'jane@example.com',
        'phone' => '+9876543210',
        'message' => 'Another test message.'
    ];

    $response = $this->post(route('contact.store'), $contactData);

    $response->assertRedirect(route('home'));
    $response->assertSessionHas('success');
});
