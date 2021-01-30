<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function a_user_object()
    {
        $user = User::factory()->create();

        $response = $this->get('/api/1/users/' . $user->id);

        $response->assertStatus(200)->assertSee([
            'name' => $user->name,
            'id' => $user->id
        ]);
    }

    /**
     * @test
     */
    public function list_all_users()
    {
        $users = User::factory(100)->create();

        $response = $this->get('/api/1/users/');

        $response->assertStatus(200)->assertSee([
            'name' => $users->first()->name,
            'id' => $users->first()->id
        ]);
    }

    /**
     * @test
     */
    public function add_new_user()
    {
        $response = $this->post('/api/1/users/', [
            'name' => "user test 22",
            'email' => "email22@gmail.com",
            'phone' => "0321651222",
            'is_active' => true,
            'password' => '12345678'
        ]);

        $response->assertStatus(201)->assertSee([
            'name' => "user test 22"
        ]);
    }

    /**
     * @test
     */
    public function update_user_data_with_invalid()
    {
        $user = User::factory()->create();

        $response = $this->put('/api/1/users/' . $user->id, [
            'name' => "user test 55"
        ], [
            'Content-Type' => 'application/json'
        ]);

        $response->assertStatus(422)->assertSee([
            'email' => "The email field is required.",
            'phone' => "The phone field is required.",
        ]);
    }
}
