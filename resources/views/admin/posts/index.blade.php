@extends('admin.layouts.app')

@section('content')

    <v-container fluid>
        <v-layout row mb-2 justify-space-between>

            <h1>Posts</h1>

            <v-btn color="indigo" flat href="/admin/posts/crear">
                <v-icon>add</v-icon>
                Nuevo Post
            </v-btn>

        </v-layout>
        @foreach($posts as $post)
            <v-layout column style="margin-bottom: 2rem;">
                <v-flex xs12>
                    <v-card>
                        <v-card-title>
                            <div>
                                <h3>
                                    <a href="/admin/posts/{{ $post->getRouteKey() }}">{{ $post->title }}</a>
                                </h3>
                                por <a href="/admin/users/{{$post->author->id}}" class="grey--text text--darken-2">{{ $post->author->name }}</a>
                                {{$post->created_at->diffForHumans()}}
                            </div>
                        </v-card-title>
                        <v-card-text>
                            <p>{{ str_limit($post->body, 100) }}</p>
                        </v-card-text>
                    </v-card>
                </v-flex>
            </v-layout>
        @endforeach
    </v-container>


@endsection