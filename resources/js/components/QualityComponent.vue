<template>
    <div>

    </div>
</template>

<script>
    export default {
        data(){
            return {
                qualities: []
            }
        },
        mounted(){
            axios
                .get('http://127.0.0.1:8000/quality')
                .then((res) => this.qualities = res.data)
        }
    }
</script>

<style lang="scss" scoped>

</style>