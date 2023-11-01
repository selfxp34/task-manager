<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Factories\UserFactory;
use Database\Seeders\StatusesSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class CreateTaskTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_show_create_form(): void
    {

        $user = User::factory()->make();
        $response = $this->actingAs($user)->get('/tasks/create');

        $response->assertOk();
        $response->assertViewIs('tasks.create');
        $response->assertSeeText('Создание задачи');
    }
    public function test_simple_store_task():void
    {
        $this->seed(StatusesSeeder::class);
        $user= User::factory()->make();
        $response=$this->actingAs($user)->post('/tasks', [
            'name'=>'Тест',
            'preview'=>'Краткий текст',
            'text'=>'Полный текст',
            'priority'=>'1',
            'file'=>UploadedFile::fake()->image('test.jpg')

    ]);

        $response->assertRedirect('/tasks');
        $this->assertDatabaseHas('tasks',[
            'name'=>'Тест'
        ]);

    }
    public function test_error_name_store_task():void
    {

        $user = User::factory()->make();
        $response = $this->actingAs($user)->post('/tasks', [
            'name' => '',
            'preview' => 'Краткий текст',
            'text' => 'Полный текст',
            'priority' => '1',
            'file' => UploadedFile::fake()->image('test.jpg')

        ]);

        $response->assertSessionHasErrors('name');
        $response->assertSessionDoesntHaveErrors('preview');

    }
}
