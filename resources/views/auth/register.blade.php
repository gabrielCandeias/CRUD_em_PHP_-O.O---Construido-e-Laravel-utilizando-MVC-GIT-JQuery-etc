<x-guest-layout>
    <x-auth-card class="register-card">
        <div class="btn-group div-cards" role="group">

            <h2 class="registro-font">Cadastro de Usuário</h2>
            <div class="registro">
                <ion-icon name="person-add-outline" ></ion-icon>
            </div>
        </div>
        <hr class="hr">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />


        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="row">
                <div class="col">
                    <x-label for="name" :value="__('Name')" />

                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                        autofocus />
                </div>


                <div class="col">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />
                </div>


                <div class="col">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required />
                </div>
            </div>
            <div class="row">

                <div class="col">
                    <x-label for="cpf" value="CPF" />
                    <x-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf')"
                        onkeypress="$(this).mask('000.000.000-00');" required />
                </div>
                <div class="col">
                    <x-label for="rg" value="RG" />
                    <x-input id="rg" class="block mt-1 w-full" type="text" name="rg" :value="old('rg')"
                        onkeypress="$(this).mask('00.000.000-0');" required />
                </div>
                <div class="col">
                    <x-label for="data_nascimento" value="Data de Nascimento" />
                    <x-input id="data_nascimento" class="block mt-1 w-full" type="date" name="data_nascimento"
                        :value="old('data_nascimento')" required />
                </div>
                <div class="col">
                    <x-label for="sexo" value="Sexo" />

                    <select class="form-select" aria-label="Default select example" name="sexo" id="sexo">

                        <option value="ND" @if (old('sexo') == 'ND') {{ 'selected' }} @endif>Prefiro Não
                            Declarar</option>
                        <option value="M" @if (old('sexo') == 'M') {{ 'selected' }} @endif>Masculino
                        </option>
                        <option value="F" @if (old('sexo') == 'F') {{ 'selected' }} @endif>Feminino
                        </option>

                    </select>
                </div>

            </div>
            <div class="row">

                <div class="col">
                    <x-label for="cep" value="CEP" />
                    <x-input id="cep" class="block mt-1 w-full" type="text" name="cep" :value="old('cep')"
                        onkeypress="$(this).mask('00.000-000')" required />

                </div>
                <div class="col">
                    <x-label for="endereco" value="Endereco" />
                    <x-input id="endereco" class="block mt-1 w-full" type="text" name="endereco"
                        :value="old('endereco')" required />
                </div>
                <div class="col">
                    <x-label for="numero" value="Número" />
                    <x-input id="numero" class="block mt-1 w-full" type="number" name="numero" :value="old('numero')"
                        required />
                </div>
                <div class="col">
                    <x-label for="bairro" value="Bairro" />
                    <x-input id="bairro" class="block mt-1 w-full" type="text" name="bairro" :value="old('bairro')"
                        required />
                </div>

            </div>
            <div class="row">

                <div class="col">
                    <x-label for="complemento" value="Complemento" />
                    <x-input id="complemento" class="block mt-1 w-full" type="text" name="complemento"
                        :value="old('complemento')" />
                </div>
                <div class="col">
                    <x-label for="estado" value="Estado" />
                    <select class="form-select block mt-1 w-full" aria-label="Default select example" name="estado"
                        id="estado">
                        @foreach ($estados as $estado)
                            <option value="{{ $estado->id }}"
                                @if (old('estado') == '{{ $estado->id }}') {{ 'selected' }} @endif> {{ $estado->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <x-label for="cidade" value="Cidade" />

                    <select class="form-select block mt-1 w-full" aria-label="Default select example" name="cidade_id"
                        id="cidade_id">
                        @foreach ($cidades as $cidade)
                            <option value="{{ $cidade->id }}"
                                @if (old('cidade') == '{{ $cidade->id }}') {{ 'selected' }} @endif>{{ $cidade->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="row">

                <div class="col">
                    <x-label for="telefone" value="Telefone" />
                    <x-input id="telefone" class="block mt-1 w-full" type="tel" name="telefone" :value="old('telefone')"
                        onkeypress="$(this).mask('(00) 0000-00009')" required />
                </div>
                <div class="col">
                    <x-label for="celular" value="Celular" />
                    <x-input id="celular" class="block mt-1 w-full" type="tel" name="celular" :value="old('celular')"
                        onkeypress="$(this).mask('(00) 0000-00009')" required />
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="/login" class="ml-3">
                    Já esta Cadastrado?
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>

    </x-auth-card>
</x-guest-layout>
