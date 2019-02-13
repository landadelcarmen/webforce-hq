@extends('layouts.app')


@section('content')
    <v-container>
        <v-layout align-center justify-space-between mb-4>
                <div>
                    <h1>
                        {{ $post->title }}
                    </h1>
                    <a href="/" class="grey--text text--darken-2">{{ $post->author->name }}</a>
                </div>
        </v-layout>
        <v-layout row>
            <v-flex xs8>
                <v-card>
                    <v-card-text>
                        <p>{{ $post->body }}</p>
                    </v-card-text>
                </v-card>
            </v-flex>
            <v-flex xs4 px-4>
                <h4 class="indigo--text text-uppercase">Etiquetas</h4>
                <div>
                    @foreach($post->tags as $tag)
                        <v-btn href="/?tag={{$tag->id}}" small round color="blue" dark>{{$tag->title}}</v-btn>
                    @endforeach
                </div>
            </v-flex>
        </v-layout>
    </v-container>
@endsection