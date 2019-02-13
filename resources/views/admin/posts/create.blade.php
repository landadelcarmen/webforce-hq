@extends('admin.layouts.app')

@section('content')
    <post-create-view :tags="{{ $tags }}" inline-template>

        <v-container fluid>
            <v-layout row mb-2>

                <h1>Nuevo Post</h1>

            </v-layout>

            <v-card>
                <v-card-text>
                    <v-form ref="form">
                        <v-container>

                            <v-layout>
                                <v-flex xs12>
                                    <v-text-field
                                        v-model="title"
                                        :rules="[ title => !!title || 'El Título es obligatorio' ]"
                                        label="Título"
                                        required
                                    ></v-text-field>
                                </v-flex>
                            </v-layout>

                            <v-layout>
                                <v-flex xs12>
                                    <v-textarea
                                        no-resize
                                        label="Contenido"
                                        v-model="body"
                                        :rules="[ body => !!body || 'El Contenido es obligatorio' ]"
                                    ></v-textarea>
                                </v-flex>
                            </v-layout>

                            <v-layout>
                                <v-flex xs12>
                                    <v-combobox
                                        item-text="title"
                                        item-value="id"
                                        multiple
                                        v-model="selectedTags"
                                        :items="tags"
                                        chips
                                        label="Etiquetas (puedes crear nuevas Etiquetas, simplemente escribiéndolas)"
                                    ></v-combobox>
                                </v-flex>
                            </v-layout>

                            <v-layout>
                                <v-flex>
                                    <v-btn @click.prevent="submit" color="indigo" dark>Publicar</v-btn>
                                </v-flex>

                            </v-layout>
                        </v-container>
                    </v-form>
                </v-card-text>
            </v-card>

        </v-container>

    </post-create-view>
@endsection