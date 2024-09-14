<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Mail\EmailVerification;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Log;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        session()->flash("user", [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect(route('register.verify_email', absolute: false));
    }

    public function verification_email(){
        $user = session("user");
        $kode_verifikasi = (rand(1000,2000));
        
        session()->flash("kode_verifikasi", Hash::make($kode_verifikasi));
        if ($user) {
            Log::info('mencoba mengirim email ke '.$user["email"]);

            if (!session("pesan")) Mail::to($user["email"])->send(new EmailVerification($kode_verifikasi));

            Log::info('berhasil email');
            return view("auth.register.verifikasi-email",["user"=>$user, "kode_verifikasi"=>$kode_verifikasi]);
        } else abort(404);
    }

    public function execute_verification_email(Request $request): RedirectResponse
    {
        $data = $request->all();
        $kode_verifikasi = $request->input("kode_verifikasi");
        if (isset($data["kirim_ulang"])){
            return 
            redirect()->route('register.verify_email')
            ->with("user", [
                'name' => $data["name"],
                'email' => $data["email"],
                'password' => $data["password"],
            ]);
        } else if (Hash::check($kode_verifikasi, session("kode_verifikasi"))) {
            $user = User::create([
                'name' => $data["name"],
                'email' => $data["email"],
                'password' => $data["password"],
            ]);

            Auth::login($user);
            return redirect(route('home', absolute: false));
        } else {
            return 
            redirect()->route('register.verify_email')
            ->with('pesan', 'Kode Konfirmasi Salah')
            ->with("user", [
                'name' => $data["name"],
                'email' => $data["email"],
                'password' => $data["password"],
            ]);
        }
    }
}
