@extends('layouts.app')

@section('content')
    <v-container>
        <v-layout row mb-2>

            <h1>Iniciar Sesión</h1>

        </v-layout>

        <v-card>
            <v-card-text>
                <v-form method="POST" action="{{ route('login') }}">
                    @csrf
                    <v-container>

                        <v-layout>
                            <v-flex xs12>
                                <v-text-field
                                    name="email"
                                    type="email"
                                    :rules="[ email => !!email || 'El Correo Electrónico es obligatorio' ]"
                                    label="Correo Electrónico"
                                    value="{{ old('email') }}"
                                    required
                                    autofocus
                                ></v-text-field>
                                @if($errors->has('email'))
                                    <span>{{$errors->first('email')}}</span>
                                @endif
                            </v-flex>
                        </v-layout>

                        <v-layout>
                            <v-flex xs12>
                                <v-text-field
                                    name="password"
                                    type="password"
                                    :rules="[ password => !!password || 'La Contraseña es obligatoria' ]"
                                    label="Contraseña"
                                    required
                                ></v-text-field>
                                @if($errors->has('password'))
                                    <span>{{$errors->first('password')}}</span>
                                @endif
                            </v-flex>
                        </v-layout>

                        <v-layout>
                            <v-flex>
                                <v-checkbox
                                    name="remember"
                                    label="Recordarme"
                                    color="indigo"
                                    {{ old('remember') ? 'checked' : '' }}
                                ></v-checkbox>
                            </v-flex>
                        </v-layout>

                        <v-layout>
                            <v-flex>
                                <v-btn type="submit" color="indigo" dark>Iniciar Sesión</v-btn>
                            </v-flex>
                        </v-layout>

                    </v-container>
                </v-form>
            </v-card-text>
        </v-card>
    </v-container>
@endsection
