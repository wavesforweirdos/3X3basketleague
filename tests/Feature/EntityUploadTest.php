<?php

namespace Tests\Feature;

use App\Models\Entity;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class EntityUploadTest extends TestCase
{
    use RefreshDatabase;

    private function data(array $extra = []): array
    {
        return array_merge([
            'first_name' => 'Ana',
            'last_name' => 'Puig',
            'phone' => '600123456',
            'state' => 'Director técnico',
            'entity_name' => 'Club ../Test',
            'foundation_year' => '2001',
            'entity_phone' => '931234567',
            'email' => 'club@example.com',
            'web' => 'www.example.com',
            'country' => 'España',
            'city' => 'Barcelona',
        ], $extra);
    }

    // PNG de 1x1 píxel
    private function png(): UploadedFile
    {
        $bytes = base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNkYPhfDwAChwGA60e6kgAAAABJRU5ErkJggg==');

        return UploadedFile::fake()->createWithContent('logo.png', $bytes);
    }

    public function test_an_entity_can_be_created_with_a_picture(): void
    {
        Storage::fake('local');

        $this->post(route('entity.store'), $this->data(['image' => $this->png()]))
            ->assertRedirect();

        // El nombre del fichero sale del nombre de la entidad, sin barras ni puntos
        Storage::disk('local')->assertExists('public/images/entities/club-test_profile.png');
        // el modelo guarda los nombres en minúsculas
        $this->assertDatabaseHas('entities', ['entity_name' => 'club ../test']);
    }

    public function test_only_pictures_are_accepted(): void
    {
        Storage::fake('local');

        $pdf = UploadedFile::fake()->create('documento.pdf', 10, 'application/pdf');

        $this->post(route('entity.store'), $this->data(['image' => $pdf]))
            ->assertSessionHasErrors('image');

        $this->assertSame(0, Entity::count());
    }
}
