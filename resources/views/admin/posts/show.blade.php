@extends('admin.layouts.app')

@section('content')
    <v-container fluid>
        <v-layout align-center justify-space-between mb-4>
                <div>
                    <h1>
                        {{ $post->title }}
                    </h1>
                    <a href="/admin/users/{{ $post->author->id }}" class="grey--text text--darken-2">{{ $post->author->name }}</a>
                </div>
                @can('update', $post)
                    <v-btn flat color="indigo" href="/admin/posts/{{$post->getRouteKey()}}/editar">
                        <v-icon>create</v-icon>
                        Editar Post
                    </v-btn>
                @endcan
        </v-layout>
        <v-layout row>
            <v-flex xs8>
                <v-layout column>
                    <v-flex xs12>
                        <v-card>
                            <v-card-text>
                                <p>{{ $post->body }}</p>
                            </v-card-text>
                        </v-card>
                    </v-flex>
                        @can('delete', $post)

                            <v-flex xs12 flex align-self-end>
                                <v-btn @click="$modal.show('delete-post')" flat color="red" small>Eliminar</v-btn>
                            </v-flex>

                            <post-delete-modal
                                    :post="{{ $post }}"
                            ></post-delete-modal>

                        @endcan

                </v-layout>
            </v-flex>
            <v-flex xs4 px-4>
                <v-flex xs12>
                    <h4 class="indigo--text text-uppercase">Etiquetas</h4>
                    <div>
                        @foreach($post->tags as $tag)
                            <v-btn href="/?etiqueta={{$tag->id}}" small round color="blue" dark>{{$tag->title}}</v-btn>
                        @endforeach
                    </div>
                </v-flex>
            </v-flex>
        </v-layout>
    </v-container>
@endsection