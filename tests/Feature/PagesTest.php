<?php

namespace Tests\Feature;

use App\Models\Entity;
use App\Models\League;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class PagesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Entidad, liga, equipos, jugadores y partidos de demostración
        $this->seed();
    }

    public function test_home_loads(): void
    {
        $this->get('/')->assertOk()->assertSee('liga 3X3 de baloncesto');
    }

    public function test_entity_page_shows_the_seeded_entity(): void
    {
        $this->get(route('entity.show', Entity::firstOrFail()))
            ->assertOk()
            ->assertSee('Club Bàsquet Gràcia');
    }

    public function test_league_page_shows_its_teams_and_games(): void
    {
        $league = League::firstOrFail();

        $this->get(route('league.show', $league))
            ->assertOk()
            ->assertSee('Barcelona Open');
    }

    public function test_entity_without_photo_uses_the_local_placeholder(): void
    {
        $this->get(route('entity.show', Entity::firstOrFail()))
            ->assertSee('images/placeholder.svg');
    }

    #[DataProvider('unfinishedRoutes')]
    public function test_unfinished_pages_are_not_a_server_error(string $url): void
    {
        // 404 (no hay ruta) o 405 (la URL existe solo para POST): nunca un error 500
        $this->assertContains($this->get($url)->status(), [404, 405]);
    }

    public static function unfinishedRoutes(): array
    {
        return [['/league'], ['/game'], ['/player'], ['/team']];
    }

    public function test_the_forms_to_create_things_load(): void
    {
        $this->get(route('entity.create'))->assertOk();
        $this->get(route('league.create', Entity::firstOrFail()))->assertOk();
    }
}
