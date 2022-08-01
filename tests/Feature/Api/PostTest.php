<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Post;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_posts_list()
    {
        $posts = Post::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.posts.index'));

        $response->assertOk()->assertSee($posts[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_post()
    {
        $data = Post::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.posts.store'), $data);

        $this->assertDatabaseHas('posts', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_post()
    {
        $post = Post::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence(15),
            'status' => $this->faker->word,
            'field_float' => $this->faker->randomNumber(2),
            'field_integer' => $this->faker->randomNumber(0),
            'field_bool' => $this->faker->boolean,
            'field_date' => $this->faker->date,
            'field_timestamp' => $this->faker->dateTime,
        ];

        $response = $this->putJson(route('api.posts.update', $post), $data);

        $data['id'] = $post->id;

        $this->assertDatabaseHas('posts', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_post()
    {
        $post = Post::factory()->create();

        $response = $this->deleteJson(route('api.posts.destroy', $post));

        $this->assertModelMissing($post);

        $response->assertNoContent();
    }
}
