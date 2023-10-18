<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function reset(Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessage());

        $user = User::where('email', $request->email)->first();
        $user->password = bcrypt('12345678');
        $user->save();

        event(new PasswordReset($user));

        return $this->sendResetResponse($request, 'password.reset');
    }
}
