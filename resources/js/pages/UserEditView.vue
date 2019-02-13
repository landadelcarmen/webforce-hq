<script>
    export default {

        props: [ 'user' ],

        data() {
            return {
                name: this.user.name,
                email: this.user.email,
                password: '',
                emailRules: [
                    email => !!email || 'El Correo Electrónico es obligatorio',
                    email => /.+@.+/.test(email) || 'El Correo Electrónico debe ser válido'
                ],
                role: this.user.role,
                roles: [
                    {id: 1, name: 'Administrador'},
                    {id: 2, name: 'Colaborador'},
                ]
            }
        },

        computed: {
            formData() {
                let data = {};

                if(this.name != this.user.name)
                {
                    data.name = this.name;
                }

                if(this.email != this.user.email)
                {
                    data.email = this.email;
                }

                if(this.role != this.user.role)
                {
                    data.role = this.role;
                }

                if(this.password)
                {
                    data.password = this.password;
                }

                return data;
            }
        },


        methods: {
            submit() {
                if(this.$refs.form.validate()) {
                    axios.patch(`/admin/users/${this.user.id}`, this.formData)
                        .then( ({ data }) => location.pathname = `/admin/users/${data.id}`)
                }
            }
        }

    }
</script>