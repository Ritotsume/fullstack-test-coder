<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * Testando a rota para buscar os posts através da API.
     *
     * @return void
     */
    public function testPostsApi()
    {
        $response = $this->get('/api/posts');

        $response->assertStatus(200);
    }

    /**
     * Testa a rota para encontrar um post específico.
     * 
     * @return void
     */
    public function testPostsSingleApi()
    {
        $postSlug = 'lorem-ipsum-dolor';

        $response = $this->get("/api/posts/{$postSlug}");
        $response->assertJsonFragment(['title' => 'Lorem ipsum dolor', 'status' => 'PUBLISHED']);
    }

    /**
     * Testa a rota para inserção de dados via form de contato. 
     * Obs.: irá inserir dados no banco.
     * 
     * @return void
     */
    public function testContactsApi()
    {
        $contact = \App\Models\Contact::factory()->make();
        $response = $this->post('/api/contacts', [
            '_token' => csrf_token(),
            'name' => $contact->name,
            'email' => $contact->email,
            'phone' => $contact->phone,
            'subject' => $contact->subject,
            'message' => $contact->message
        ]);
        $response->assertJsonStructure(['success']);
    }
}
