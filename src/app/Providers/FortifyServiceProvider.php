<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Models\User;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\LoginRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;


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

        // Fortify::createUsersUsing(function (array $input) {

        //     Validator::make($input, [
        //         'name' => ['required', 'string', 'max:255'],
        //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //         'password' => ['required', 'confirmed', Password::defaults()],
        //     ])->validate();
    
        //     // ユーザー作成（`postcode`は空にしておく）
        //     return User::create([
        //         'name' => $input['name'],
        //         'email' => $input['email'],
        //         'password' => Hash::make($input['password']),
        //         'postcode' => null,  // `postcode`は後で入力
        //     ]);
        // });

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
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'password' => 'required|string',
            ]);

            if ($validator->fails()) {
                return null;
            }
                $login = $request->input('name');
                $user = User::where('email', $login)->orWhere('name', $login)->first();
                if ($user && Hash::check($request->input('password'), $user->password)) {
                    return $user;
                    }
                });

                $this->app->bind(FortifyLoginRequest::class, LoginRequest::class);

        }
}



