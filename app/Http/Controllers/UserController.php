<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Admin;

class UserController extends Controller
{
    public function profile($userid)
    {
        $user = User::where('id',$userid)->first();
        $comms = Comment::where('user_id',$userid)->get();
        $orders= Order::where('user_id',$userid)->get();
        return view('user/profile')
    ->with('user', $user)
    ->with('comms', $comms)
    ->with('orders', $orders);

    }
    public function registrationView()
    {
        return view('user/registration');
    }
    public function loginView()
    {
        return view('user/login');
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('welcome');
    }
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
        
        $credentials = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials)) {
            
            return redirect()->route('welcome');
        }
        
        return redirect()->back()->with('error', 'Неправильний логін або пароль.');
    }
    public function registration(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'password2' => 'required|string|same:password',
        ]);
        
        $existingUser = User::where('username', $request->input('username'))->first();
        if ($existingUser) {
            return redirect()->back()->with('existing-user', 'Користувач з таким логіном вже існує.');
        }

        $user = new User();
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect()->route('login')->with('success', 'Регістрація успішна. Тепер авторизуйтесь');
    }

    public function editUser(Request $request, $userid)
    {
        $request->validate([
            'editedLogin' => 'required|max:255|unique:users,login,' . $userid,
        ]);

        $user = User::where('id',$userid)->first();

        $user->username = $request->input('editedLogin');
        $user->save();

        return redirect()->back()->with('success', 'Успішно змінено логін');
    }
    public function delete($userId) {
        $user = User::find($userId);
    
        if (!$user) {
            return false;
        }
    
        $user->comments()->delete();

        $orders = $user->orders;

        foreach ($orders as $order) {
            $order->orderItems()->delete();
            
            $order->delete();
        }

        $user->delete();

        return redirect()->route('welcome')->with('success', 'Користувача видалено');
    }
    
}
