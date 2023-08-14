<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::where('id', '!=', Auth::id())->paginate(5);

        return view('admin.users.index', ['users' => $users]);
    }

    public function update(Request $request, User $user)
    {
        if (Auth::id() != $user->id) {
            $user->isAdmin = !$user->isAdmin;
            if ($user->save()) {
                return response()->json([
                    'message' => 'ok',
                    'status_code' => 200
                ], 200);
            } else {
                return response()->json([
                    'message' => 'log deleted error',
                    'status_code' => 500
                ], 500);
            }
        } else {
            return view('admin.users.index')->with('error', 'Нельзя снять админа с себя');
        }
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Пользователь успешно удален');
    }
}
