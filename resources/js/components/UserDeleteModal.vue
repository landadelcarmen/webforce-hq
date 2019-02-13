<template>
    <modal
            name="delete-user"
            height="auto"
            width="400"
    >
        <v-card>
            <v-card-title>
                <h3>¿Estás seguro de querer eliminar este usuario?</h3>
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
        props: [ 'user' ],

        methods: {
            remove() {
                axios.delete(`/admin/users/${this.user.id}`)
                    .then( () => location.pathname = '/admin/users');
            }
        }
    }
</script>

<style scoped>

</style>