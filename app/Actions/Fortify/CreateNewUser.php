<?php

namespace App\Actions\Fortify;

use App\Models\CodVendedorAsignado;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cod_vendedor' => ['required', 'string'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        if (CodVendedorAsignado::whereCven($input['cod_vendedor'])->whereTipo('main')->exists()) {
            $cven = null;
            Validator::make(
                ['cod_vendedor' => $cven],
                ['cod_vendedor' => ['required']],
                ['required' => 'El Codigo de Vendedor ya está en uso.',]
            )->validate();
        }

        DB::transaction(function () use ($input, &$user) {

            $user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]);

            $user->codVendedorAsignados()->create([
                'cven' => $input['cod_vendedor'],
                'tipo' => 'main'
            ]);
        });

        return $user;
    }
}
