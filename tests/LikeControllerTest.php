<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Posts;
use App\Models\Likes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;

class LikesControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_like_a_post()
    {
        // Create a user and a post
        $user = User::factory()->create();
        $post = Posts::factory()->create();

        // Act as the user to perform authenticated actions
        $this->actingAs($user);

        // Send a POST request to like the post
        $response = $this->postJson('/likes', [
            'post_id' => $post->id,
        ]);

        // Assert the response is as expected
        $response->assertStatus(200)
                 ->assertJson([
                     'status' => 'liked',
                     'message' => 'Great that you like this post',
                 ]);

        // Assert that the like was added in the database
        $this->assertDatabaseHas('likes', [
            'post_id' => $post->id,
            'user_id' => $user->id,
        ]);
    }

    public function test_user_can_unlike_a_post()
    {
        // Create a user and a post
        $user = User::factory()->create();
        $post = Posts::factory()->create();

        // Act as the user to perform authenticated actions
        $this->actingAs($user);

        // First, like the post
        Likes::create([
            'post_id' => $post->id,
            'user_id' => $user->id,
        ]);

        // Send a POST request to unlike the post
        $response = $this->postJson('/likes', [
            'post_id' => $post->id,
        ]);

        // Assert the response is as expected
        $response->assertStatus(200)
                 ->assertJson([
                     'status' => 'already_liked',
                     'message' => 'You have already liked this post',
                 ]);

        // Assert that the like was removed from the database
        $this->assertDatabaseMissing('likes', [
            'post_id' => $post->id,
            'user_id' => $user->id,
        ]);
    }
}
