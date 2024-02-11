<?php

namespace Tests\Unit\Services;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Providers\RouteServiceProvider;

/**
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 */
class UserServiceTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    /**
     * @test
     * @return void
     */
    public function it_can_return_a_paginated_list_of_users()
    {
        $response = $this->get('/dashboard');
        $response->assertStatus(200);
        $response->assertSee(__(key: "no users"));
    }

    /**
     * @test
     * @return void
     */
    public function it_can_store_a_user_to_database()
    {
        $user = [
            'prefixname' => 'Mr',
            'firstname' => 'Osama',
            'middlename' => 'Ali',
            'lastname' => 'Mohamad',
            'suffixname' => 'Male',
            'username' => 'Osama',
            'email' => 'osama@gmail.com',
            'password' => '123456',
            'photo' => 'http://127.0.0.1:8000/assets/img/1707606413.png'
        ];
        $response = $this->post('/users', $user);
        $response->assertStatus(201);
        $response->assertJson($user);
    }

    /**
     * @test
     * @return void
     */
    public function it_can_find_and_return_an_existing_user()
    {
        $user = User::factory()->create();
        $response = $this->get('/users/edit/' . $user->id);
        $response->assertStatus(200);
    }

    /**
     * @test
     * @return void
     */
    public function it_can_update_an_existing_user()
    {
        $user = User::factory()->create();

        $response = $this->delete("/users/update/" . $user->id);
        $response->assertStatus(200);
        // Assertions
    }

    /**
     * @test
     * @return void
     */
    public function it_can_soft_delete_an_existing_user()
    {
        $user = User::factory()->create();
        $response = $this->delete("/users/delete/" . $user->id);
        $response->assertStatus(200);
    }

    /**
     * @test
     * @return void
     */
    public function it_can_return_a_paginated_list_of_trashed_users()
    {
        $user = User::factory()->create();
        $response = $this->post("/users/trashed/" . $user->id);
        $response->assertStatus(200);
    }

    /**
     * @test
     * @return void
     */
    public function it_can_restore_a_soft_deleted_user()
    {
        $user = User::factory()->create();
        $response = $this->post("/users/trashed/" . $user->id);
        $response->assertStatus(200);
    }

    /**
     * @test
     * @return void
     */
    public function it_can_permanently_delete_a_soft_deleted_user()
    {
        $response = $this->get('/users/allListTrashed');
        $response->assertStatus(200);
        $response->assertSee(__(key: "no trashed users"));
    }

    /**
     * @test
     * @return void
     */
    public function it_can_upload_photo()
    {
        $data = ['photo' => 'http://127.0.0.1:8000/assets/img/1707606413.png'];
        $response = $this->post('/users' . $data);
        $response->assertStatus(200);
    }
}
