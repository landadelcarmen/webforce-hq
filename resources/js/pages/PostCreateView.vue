<script>
    export default {

        props: [ 'tags' ],

        data() {
            return {
                validated: false,
                title: '',
                body: '',
                selectedTags: []
            }
        },

        computed: {
            formData() {
                return {
                    title: this.title,
                    body: this.body,
                    tags: this.selectedTags
                };
            }
        },

        methods: {
            submit() {
                if(this.$refs.form.validate()) {
                    axios.post('/admin/posts', this.formData)
                         .then( ({ data }) => location.pathname = `/admin/posts/${data.slug}`)
                }
            }
        }

    }
</script>
