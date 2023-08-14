<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function update(Request $request)
    {
        $user = Auth::user();
        $errors = [];

        if ($request->isMethod('post')) {
            $this->validate($request, $this->validateRules(), [], $this->attributeNames());

            if (Hash::check($request->post('password'), $user->password)) {
                $user->fill([
                    'name' => $request->post('name'),
                    'email' => $request->post('email'),
                    'password' => Hash::make($request->post('newPassword'))
                ]);
            } else {
                $errors['password'][] = 'Не верный пароль';
                return redirect()->route('updateProfile')->withErrors($errors);
            }

            $user->save();

            return redirect()->route('updateProfile')->with('success', 'Профиль успешно изменен');
        }

        return view('user.profile', ['user' => $user]);
    }

    protected function validateRules()
    {
        return [
            'name' => 'required|string|min:3|max:15',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' => 'required',
            'newPassword' => 'required|string|min:3'
        ];
    }

    protected function attributeNames()
    {
        return [
            'newPassword' => 'Новый пароль'
        ];
    }
}
