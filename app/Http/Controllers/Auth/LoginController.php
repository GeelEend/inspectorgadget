<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
class LoginController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('azure')->redirect();
    }
    public function handleProviderCallback()
    {
        $azureUser = Socialite::driver('azure')->user();
        $user = User::where('email', $azureUser->getEmail())->first();
        if ($user) {
            Auth::login($user, true);
        } else {
            $newUser = User::create([
                'name' => $azureUser->getName(),
                'email' => $azureUser->getEmail()
            ]);
            Auth::login($newUser, true);
        }
        return redirect('/');
    }
}
