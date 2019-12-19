<template>
    <div>
        {{category.name}}
    </div>
</template>
<script>
    export default {
    data() {
        return {
            category: []
        }
    },
        methods: {
            getCategory(id) {
                this.$http.get('http://localhost:8000/category/'+id)
                    .then(response => response.json())
                    .then(result => this.category = result)
            }
        },
        created: function () {
            this.getCategory(this.$route.params.id);
        }
    }
</script>
<style lang="scss" scoped>

</style>