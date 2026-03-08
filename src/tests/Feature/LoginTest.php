<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_login_requires_email()
    {
        $data = [
            'email' => '',
            'password' => 'password',
        ];

        $response = $this->post('/login', $data);

        $response->assertSessionHasErrors(['email' => 'メールアドレスを入力してください']);
    }

    public function test_login_requires_password()
    {
        $data = [
            'email' => 'test@example.com',
            'password' => '',
        ];

        $response = $this->post('/login', $data);

        $response->assertSessionHasErrors(['password' => 'パスワードを入力してください']);
    }

    public function test_login_fails_with_invalid_credentials()
    {
        User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        $data = [
            'email' => 'wrong@example.com',
            'password' => 'password',
        ];

        $response = $this->post('/login', $data);

        $response->assertSessionHasErrors(['email' => 'ログイン情報が登録されていません']);
    }

    public function test_successful_login()
    {
        User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        $data = [
            'email' => 'test@example.com',
            'password' => 'password',
        ];

        $response = $this->post('/login', $data);

        $response->assertRedirect('/');
        $this->assertAuthenticated();
    }
}
