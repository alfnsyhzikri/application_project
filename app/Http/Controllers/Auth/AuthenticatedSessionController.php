<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    public function index()
    {
        $nomor = 1;
        $user = User::all();
        return view('users.admin.form',compact('nomor','user'));
    }

    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->level === 'Administrator') {
            return redirect('/admin');
        } elseif ($user->level === 'siswa') {
            return redirect('/user');
        } 
        // else {
        //         return redirect()->intended(RouteServiceProvider::HOME);
        // }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($user->status_verifikasi === 'Menunggu') {
            $user->status_verifikasi = $request->status;
            $user->save();
        }
    
        return redirect('/data_user')->with('success', 'Status verifikasi berhasil diperbarui.');
        }
}
