@extends('admin.layouts.app')

@section('content')
    <user-edit-view :user="{{ $user }}" inline-template>
        <v-container fluid>
            <v-layout row mb-2>

                <h1>Editar Usuario</h1>

            </v-layout>

            <v-card>
                <v-card-text>
                    <v-form ref="form">
                        <v-container>

                            <v-layout>
                                <v-flex xs12>
                                    <v-text-field
                                            v-model="name"
                                            :rules="[ name => !!name || 'El Nombre es obligatorio' ]"
                                            label="Nombre"
                                            required
                                    ></v-text-field>
                                </v-flex>
                            </v-layout>

                            <v-layout>
                                <v-flex xs12>
                                    <v-text-field
                                            v-model="email"
                                            :rules="emailRules"
                                            label="Correo Electrónico"
                                            required
                                    ></v-text-field>
                                </v-flex>
                            </v-layout>

                            <v-layout>
                                <v-flex xs12>
                                    <v-text-field
                                            type="password"
                                            v-model="password"
                                            label="Contraseña (opcional)"
                                    ></v-text-field>
                                </v-flex>
                            </v-layout>

                            <v-layout>
                                <v-flex xs12>
                                    <v-select
                                            v-model="role"
                                            :items="roles"
                                            item-text="name"
                                            item-value="id"
                                            label="Rol"
                                    ></v-select>
                                </v-flex>
                            </v-layout>

                            <v-layout>
                                <v-flex>
                                    <v-btn @click.prevent="submit" color="indigo" dark>Registrar</v-btn>
                                </v-flex>

                            </v-layout>
                        </v-container>
                    </v-form>
                </v-card-text>
            </v-card>

        </v-container>
    </user-edit-view>
@endsection