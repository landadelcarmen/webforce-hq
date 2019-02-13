<template>
    
</template>

<script>
    export default {

        data() {
            return {
                name: '',
                email: '',
                emailRules: [
                    email => !!email || 'El Correo Electrónico es obligatorio',
                    email => /.+@.+/.test(email) || 'El Correo Electrónico debe ser válido'
                ],
                password: '',
                role: '',
                roles: [
                    {id: 1, name: 'Administrador'},
                    {id: 2, name: 'Colaborador'},
                ]
            }
        },

        computed: {
            formData() {
                return {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    role: this.role
                };
            }
        },


        methods: {
            submit() {
                if(this.$refs.form.validate()) {
                    axios.post('/admin/users', this.formData)
                        .then( ({ data }) => location.pathname = `/admin/users/${data.id}`)
                }
            }
        }

    }
</script>

<style scoped>

</style>