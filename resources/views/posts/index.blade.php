@extends('layouts.app')


@section('content')

        <v-container>
            <v-layout row mb-2 justify-space-between>

                    <h1>Posts</h1>

            </v-layout>
            @foreach($posts as $post)
                <v-layout column style="margin-bottom: 2rem;">
                    <v-flex xs12>
                        <v-card>
                            <v-card-title>
                                <div>
                                    <h3>
                                        <a href="/{{ $post->getRouteKey() }}">{{ $post->title }}</a>
                                    </h3>
                                    por <a href="/?autor={{$post->author->id}}" class="grey--text text--darken-2">{{ $post->author->name }}</a>
                                    {{ $post->created_at->diffForHumans() }}
                                </div>
                            </v-card-title>
                            <v-card-text>
                                <p>{{ str_limit($post->body, 100) }}</p>
                            </v-card-text>
                            <v-card-actions style="text-transform: uppercase;font-weight: bold;" class="grey--text caption">
                                Etiquetas:

                                <div style="margin-left: 1rem">
                                    @foreach($post->tags as $tag)
                                        <v-btn href="/?etiqueta={{$tag->id}}" small flat color="indigo" dark>{{$tag->title}}</v-btn>
                                    @endforeach
                                </div>
                            </v-card-actions>
                        </v-card>
                    </v-flex>
                </v-layout>
            @endforeach
        </v-container>


@endsection