<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Contracts\RegisterResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);

        Fortify::registerView(function () {
            return view('auth.register');
        });

        Fortify::loginView(function () {
            return view('auth.login');
        });

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;
            return Limit::perMinute(10)->by($email . $request->ip());
        });

        Fortify::authenticateUsing(function (Request $request) {

            $validator = Validator::make(
                $request->all(),
                [
                    'email' => ['required', 'email'],
                    'password' => ['required'],
                ],
                [
                    'email.required' => 'メールアドレスを入力してください',
                    'email.email' => 'メールアドレスはメール形式で入力してください',
                    'password.required' => 'パスワードを入力してください',
                ]
            );

            if ($validator->fails()) {
                throw ValidationException::withMessages(
                    $validator->errors()->toArray()
                );
            }

            if (Auth::attempt($request->only('email', 'password'))) {
                return Auth::user();
            }

            throw ValidationException::withMessages([
                'email' => 'ログイン情報が登録されていません',
            ]);
        });

        $this->app->singleton(RegisterResponse::class, function () {
            return new class implements RegisterResponse {
                public function toResponse($request)
                {
                    return redirect('/mypage/profile');
                }
            };
        });
    }
}
