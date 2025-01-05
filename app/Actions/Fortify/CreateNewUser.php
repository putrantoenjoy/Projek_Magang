<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input)
    {
        // Validasi input sebelum pembuatan pengguna
        $validated = Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Jika validasi gagal
        if ($validated->fails()) {
            return back()->withErrors($validated)->withInput();
        }

        // Mendapatkan data yang sudah tervalidasi
        $validatedData = $validated->validated(); 

        // Membuat pengguna baru menggunakan data yang sudah tervalidasi
        $user = User::create([
            'name' => $validatedData['name'],  // Gunakan $validatedData, bukan $validated
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Menetapkan role 'user' langsung setelah registrasi
        $user->assignRole('user');  // Pastikan role 'user' sudah ada di database

        // Mengembalikan user atau respons lain
        return $user;  // Atau return redirect atau response lain sesuai kebutuhan
    }
}
