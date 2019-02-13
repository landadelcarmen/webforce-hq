@extends('admin.layouts.app')

@section('content')

    <v-container fluid>
        <v-layout row mb-2 justify-space-between>

            <h1>Usuarios</h1>

            @can('create', User::class)
                <v-btn color="indigo" flat href="/admin/users/crear">
                    <v-icon>add</v-icon>
                    Nuevo Usuario
                </v-btn>
            @endcan

        </v-layout>

            <v-layout column style="margin-bottom: 2rem;">
                <v-flex xs12>
                    <v-card>
                        <v-card-text>
                            
                            <table style="width: 100%; text-align:left">
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Correo Electrónico</th>
                                    <th>Rol</th>
                                    <th>Posts</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td><a href="/admin/users/{{ $user->getRouteKey() }}">{{ $user->name }}</a></td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{$user->isAdmin() ? 'Administrador' : 'Colaborador'}}</td>
                                            <td>{{ $user->posts_count }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </v-card-text>

                    </v-card>
                </v-flex>
            </v-layout>
    </v-container>


@endsection