<script>
    export default {

        props: [ 'post', 'tags' ],

        data() {
            return {
                title: this.post.title,
                body: this.post.body,
                selectedTags: this.post.tags
            }
        },

        computed: {
            formData() {

                let formData = {};

                if(this.post.title != this.title) {
                    formData.title = this.title
                }

                if(this.post.body != this.body) {
                    formData.body = this.body
                }

                formData.tags = this.selectedTags;

                return formData;
            }
        },

        methods: {
            submit() {
                if(this.$refs.form.validate()) {
                    axios.patch(`/admin/posts/${this.post.slug}`, this.formData)
                        .then( ({ data }) => location.pathname = `/admin/posts/${data.slug}`)
                }
            }
        }

    }
</script>
