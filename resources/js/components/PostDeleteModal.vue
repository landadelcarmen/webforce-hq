<template>
    <modal
        name="delete-post"
        height="auto"
        width="400"
    >
        <v-card>
            <v-card-title>
                <h3>¿Estás seguro de querer eliminar este post?</h3>
            </v-card-title>
            <v-card-text>
                <v-btn dark color="red" @click="remove">Confirmar</v-btn>
                <v-btn flat color="grey darken-1">Cancelar</v-btn>
            </v-card-text>
        </v-card>
    </modal>
</template>

<script>
    export default {
        props: [ 'post' ],

        methods: {
            remove() {
                axios.delete(`/admin/posts/${this.post.slug}`)
                     .then( () => location.pathname = '/admin/posts');
            }
        }
    }
</script>

<style scoped>

</style>