<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Testa se o login está funcionando
     *
     * @return void
     */
    public function testLogin()
    {
        $user = User::factory()->create();
        $response = $this->post('/api/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
        $response->assertStatus(201);
    }

    /**
     * Testa se a rota getById está funcionando
     *
     * @return void
     */
    public function testGetById()
    {
        $response = $this->get('/api/editais/737');
        $response->assertStatus(200);
    }

    /**
     * Testa se a rota getAll está funcionando
     *
     * @return void
     */
    public function testGetAll()
    {
        $response = $this->get('/api/editais');
        $response->assertStatus(200);
    }

    /**
     * Testa se a rota getById está funcionando
     *
     * @return void
     */
    public function testGetFluxById()
    {
        $response = $this->get('/api/fluxos/1027');
        $response->assertStatus(200);
    }

    /**
     * Testa se a rota getAll está funcionando
     *
     * @return void
     */
    public function testGetAllFluxes()
    {
        $response = $this->get('/api/fluxos');
        $response->assertStatus(200);
    }

    /**
     * Testa se a rota index está funcionando
     *
     * @return void
     */
    public function testGetInscriptions()
    {
        $response = $this->get('/api/inscricoes');
        $response->assertStatus(200);
    }
    
    /**
     * Testa se a rota index está funcionando
     *
     * @return void
     */
    public function testGetTutorials()
    {
        $response = $this->get('/api/tutoriais');
        $response->assertStatus(200);
    }

    /**
     * Testa se a rota index está funcionando
     *
     * @return void
     */
    public function testGetAbout()
    {
        $response = $this->get('/api/sobre');
        $response->assertStatus(200);
    }
  
    /**
     * Teste edital com dado válido
     *
     * @return void
     */
    public function testGetEditalById()
    {
        $response = $this->get('/api/editais/737');
        $response->assertStatus(200);
    }
    
      /**
     * Teste edital com dado inválido
     *
     * @return void
     */
    public function testGetEditalByIdFail()
    {
        $response = $this->get('/api/editais/77');
        $response->assertStatus(404);
    }
    
    /**
     * Teste Flux com dado válido
     *
     * @return void
     */
    public function testGetFluxByIdSucess()
    {
        $response = $this->get('/api/fluxos/2726');
        $response->assertStatus(200);
    }
    
      /**
     * Teste Flux com dado inválido
     *
     * @return void
     */
    public function testGetFluxByIdFail()
    {
        $response = $this->get('/api/fluxos/77');
        $response->assertStatus(404);
    }

    /**
     * Teste Tutorial com dado válido
     *
     * @return void
     */
    public function testGetTutorialByIdSucess()
    {
        $response = $this->get('/api/tutorias/3699');
        $response->assertStatus(200);
    }
    
      /**
     * Teste Tutorial com dado inválido
     *
     * @return void
     */
    public function testGetTutorialByIdFail()
    {
        $response = $this->get('/api/tutorias/77');
        $response->assertStatus(404);
    }
}
