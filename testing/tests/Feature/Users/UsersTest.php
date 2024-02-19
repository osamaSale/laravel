<?php

namespace Tests\Feature\Users;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_it_can_return_a_paginated_list_of_users()
    {
        $response = $this->get('/index');
        //$data =  $response->json();
        //dd($data);
        $response->assertStatus(200);
    }

    public function test_it_can_store_a_user_to_database()
    {

        $user = [
            'prefixname' => 'Mr',
            'firstname' => 'Osama',
            'middlename' => 'Ali',
            'lastname' => 'Mohamad',
            'suffixname' => 'Male',
            'username' => 'Osama994121',
            'email' => 'osama9921@gmail.com',
            'password' => '123456',
            'photo' => 'http://127.0.0.1:8000/assets/img/1707606413.png',
            'type' => 'user',
            'trashedd' => 0
        ];
        $response = $this->post('/create', $user);
        $response->assertStatus(201);
    }

    public function test_it_can_find_and_return_an_existing_user()
    {
        $id = 4;
        $response = $this->get('/show/' . $id);
        //dd($response->json());
        $response->assertStatus(200);
    }

    public function test_it_can_update_an_existing_user()
    {

        $id = 10;
        $user = [
            'id' => 10,
            'prefixname' => 'Mrs',
            'firstname' => 'Osama',
            'middlename' => 'Ali',
            'lastname' => 'Mohamad',
            'suffixname' => 'Male',
            'username' => 'Osama994121',
            'email' => 'osama9921@gmail.com',
            'password' => '123456',
            'photo' => 'http://127.0.0.1:8000/assets/img/1707606413.png',
            'type' => 'user',
            'trashedd' => 0
        ];

        $response = $this->put('/update/' . $id, $user);
        $response->assertStatus(201);
        dd($response->json());
    }
    public function test_it_can_soft_delete_an_existing_user()
    {
        $id = 10;
        $response = $this->delete('/delete/' . $id);
        $response->assertStatus(200);
    }
    public function test_it_can_return_a_paginated_list_of_trashed_users()
    {
        $response = $this->get('/trashed');
        $response->assertStatus(200);
    }
    public function test_it_can_permanently_delete_a_soft_deleted_user()
    {
        $id = 8;
        $user = ['trashedd' => 1];
        $response = $this->put('/trashed/edit/' . $id, $user);
        $response->assertStatus(200);
    }
    public function it_can_upload_photo()
    {
        $data = ['photo' => 'http://127.0.0.1:8000/assets/img/1707606413.png'];
        $response = $this->post('/users' . $data);
        $response->assertStatus(200);
    }
}
