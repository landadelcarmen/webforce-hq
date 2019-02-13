@extends('admin.layouts.app')


@section('content')
    <v-container>
        <v-layout align-center justify-space-between mb-4>
            <div>
                <h1>
                    {{ $user->name }}
                </h1>
                <span class="grey--text text--darken-2">{{ $user->isAdmin() ? 'Administrador' : 'Colaborador' }} – {{ $user->email }}</span>
            </div>
            <div>
                @can('update', $user)
                    <v-btn flat color="indigo" href="/admin/users/{{ $user->getRouteKey() }}/editar">
                        <v-icon>create</v-icon>
                        Editar Usuario
                    </v-btn>
                @endcan
            </div>
        </v-layout>
        <v-layout column>
            <v-flex xs12>
                <v-card>
                    <v-card-title>
                        <h3>Posts</h3>
                    </v-card-title>
                    <v-card-text>
                        @foreach($user->posts as $post)
                            <div class="pb-4">
                                <h4>
                                    <a href="/admin/posts/{{ $post->getRouteKey() }}">{{ $post->title }}</a>
                                </h4>
                                <p>{{ str_limit($post->body, 100) }}</p>
                            </div>
                        @endforeach
                    </v-card-text>

                </v-card>

            </v-flex>
            @can('delete', $user)
                <v-flex xs12 flex align-self-end>
                    <v-btn @click="$modal.show('delete-user')" flat color="red" small>Eliminar</v-btn>
                </v-flex>

                <user-delete-modal
                        :user="{{ $user }}"
                ></user-delete-modal>
            @endcan
        </v-layout>
    </v-container>
@endsection