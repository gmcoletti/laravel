<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Contact;

class ContactsTest extends TestCase
{
    use RefreshDatabase, WithFaker, WithoutMiddleware;

    public function testCreateContact()
    {
        $data = [
            'name' => 'John Doe',
            'contact' => '123456789',
            'email' => 'john@example.com',
        ];

        $response = $this->post('/contacts', $data);

        $response->assertStatus(302); // Verifica se a criação redireciona
        $this->assertDatabaseHas('contacts', $data); // Verifica se os dados foram inseridos no banco de dados
    }
}
