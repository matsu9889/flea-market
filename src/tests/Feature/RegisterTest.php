<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_create_post_requires_user_name()
    {
        // user_nameを省略
        $data = [
            'user_name' => '',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $response = $this->post('/register', $data);

        $response->assertSessionHasErrors(['user_name' => 'お名前を入力してください']);
    }

    public function test_create_post_requires_email()
    {
        $data = [
            'user_name' => 'Taro',
            'email' => '',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $response = $this->post('/register', $data);

        $response->assertSessionHasErrors(['email' => 'メールアドレスを入力してください']);
    }

    public function test_create_post_requires_password()
    {
        $data = [
            'user_name' => 'Taro',
            'email' => 'test@example.com',
            'password' => '',
            'password_confirmation' => '',
        ];

        $response = $this->post('/register', $data);

        $response->assertSessionHasErrors(['password' => 'パスワードを入力してください']);
    }

    public function test_create_post_minimum_8_password()
    {
        $data = [
            'user_name' => 'Taro',
            'email' => 'test@example.com',
            'password' => '1234567',
            'password_confirmation' => '1234567',
        ];

        $response = $this->post('/register', $data);

        $response->assertSessionHasErrors(['password' => 'パスワードは8文字以上で入力してください']);
    }

    public function test_create_post_match_password()
    {
        $data = [
            'user_name' => 'Taro',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => '12345678',
        ];

        $response = $this->post('/register', $data);

        $response->assertSessionHasErrors(['password' => 'パスワードと一致しません']);
    }

    public function test_successful_registration_redirects_to_profile()
    {
        $data = [
            'user_name' => 'Taro',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $response = $this->post('/register', $data);

        $response->assertRedirect('/mypage/profile');

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
            'user_name' => 'Taro',
        ]);
    }
}
