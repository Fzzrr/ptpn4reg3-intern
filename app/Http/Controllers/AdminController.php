<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Unit;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Menampilkan halaman user account dengan data join ke table unit
    public function account()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        $users = User::select('users.*', 'unit.namaunit')
            ->leftJoin('unit', 'users.kodeunit', '=', 'unit.kodeunit')
            ->get();


        $units = Unit::all();

        return view('admin.account', [
            'user' => $user,
            'users' => $users,
            'units' => $units,
        ]);
    }

    // Method untuk login, validasi password plaintext
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user && $request->password === $user->password) {
            Auth::login($user);
            return redirect()->intended('dashboard'); // ganti dengan route yang sesuai
        }

        return back()->withErrors(['username' => 'Username atau password salah']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    // Update data user (termasuk password plaintext)

    
    public function updateAccount(Request $request, $username)
    {
        $user = User::where('username', $username)->firstOrFail();

        // Validasi data update
        $validatedData = $request->validate([
            'level' => 'required|string',
            'kodeunit' => 'required|string',
            'password' => 'nullable|string|min:6|confirmed', // jika form ada konfirmasi password
        ]);

        $dataToUpdate = [
            'level' => $validatedData['level'],
            'kodeunit' => $validatedData['kodeunit'],
        ];

        // Update password hanya jika ada input password baru
        if (!empty($validatedData['password'])) {
            $dataToUpdate['password'] = Hash::make($validatedData['password']);
        }

        $user->update($dataToUpdate);

        return redirect()->route('admin.account')->with('success', 'User updated successfully');
    }

    // Delete user berdasarkan username
    public function deleteAccount($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $user->delete();

        return redirect()->route('admin.account')->with('success', 'User deleted successfully');
    }

    // Menambah user baru, password disimpan plaintext
    public function storeAccount(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string',
            'level' => 'required|string',
            'kodeunit' => 'required|string', // sesuaikan dengan form
        ]);

        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password), // hash password
            'level' => $request->level,
            'kodeunit' => $request->kodeunit,
        ]);

        return redirect()->route('admin.account')->with('success', 'User berhasil ditambahkan');
    }

    public function view()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        return view('view', ['user' => $user]);
    }

    public function progress()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        return view('progress', ['user' => $user]);
    }
}
