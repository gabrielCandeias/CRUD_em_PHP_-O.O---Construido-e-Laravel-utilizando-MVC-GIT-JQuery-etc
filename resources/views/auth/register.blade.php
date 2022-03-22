<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            </div>

            <div class="row">

                <div class="col">
                    <x-label for="cpf" value="CPF" />
                    <x-input id="cpf" class="block mt-1 w-full" type="number" name="cpf" :value="old('cpf')" required />
                </div>
                <div class="col">
                    <x-label for="rg" value="RG" />
                    <x-input id="rg" class="block mt-1 w-full" type="number" name="rg" :value="old('rg')" required />
                </div>
                <div class="col">
                    <x-label for="data_nascimento" value="Data de Nascimento" />
                    <x-input id="data_nascimento" class="block mt-1 w-full" type="date" name="data_nascimento" :value="old('data_nascimento')" required />
                </div>
                <div class="col">
                    <x-label for="sexo" value="Sexo" />

                    <select class="form-select" aria-label="Default select example" name="sexo" id="sexo">
                        <option selected value="ND">Prefiro Não Declarar</option>
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>

                    </select>
                </div>

            </div>
            <div class="row">

                <div class="col">
                    <x-label for="cep" value="CEP" />
                    <x-input id="cep" class="block mt-1 w-full" type="number" name="cep" :value="old('cep')" required />

                </div>
                <div class="col">
                    <x-label for="endereco" value="Endereco" />
                    <x-input id="endereco" class="block mt-1 w-full" type="text" name="endereco" :value="old('endereco')" required />
                </div>
                <div class="col">
                    <x-label for="numero" value="Número" />
                    <x-input id="numero" class="block mt-1 w-full" type="number" name="numero" :value="old('numero')" required />
                </div>
                <div class="col">
                    <x-label for="bairro" value="Bairro" />
                    <x-input id="bairro" class="block mt-1 w-full" type="text" name="bairro" :value="old('bairro')" required />
                </div>

            </div>
            <div class="row">



                <div class="col">
                    <x-label for="complemento" value="Complemento" />
                    <x-input id="complemento" class="block mt-1 w-full" type="text" name="complemento" :value="old('complemento')" />
                </div>
                <div class="col">
                    <x-label for="estado" value="Estado" />
                    <x-input id="estado" class="block mt-1 w-full" type="text" name="estado" :value="old('estado')" required />
                </div>
                <div class="col">
                    <x-label for="cidade" value="Cidade" />
                    <x-input id="cidade" class="block mt-1 w-full" type="text" name="cidade" :value="old('cidade')" required />
                </div>

            </div>
            <div class="row">

                <div class="col">
                    <x-label for="telefone" value="Telefone" />
                    <x-input id="telefone" class="block mt-1 w-full" type="tel" name="telefone" :value="old('telefone')" required />
                </div>
                <div class="col">
                    <x-label for="celular" value="Celular" />
                    <x-input id="celular" class="block mt-1 w-full" type="tel" name="celular" :value="old('celular')" required />
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>