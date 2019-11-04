<template>
<div class="row">
    <spinner-component v-show="loading"></spinner-component>
    <div class="col-md-4" v-for="foo in foos">
        <div class="card">
            <div class="card-header">
                Elementos
            </div>
            <div class="card-body">
                <h5 class="card-title">Title</h5>
                <p class="card-text">{{ foo.name }}</p>
            </div>
            <div class="card-footer">
                <p class="text-danger">Eliminar</p>
            </div>
        </div>
    </div>
</div>

</template>
<script>
export default {
    data(){
        return {
            foos: [],
            loading: true
        }
    },
    mounted(){
        axios
            .get('http://127.0.0.1:8000/vue')
            .then((res) => {
                this.foos = res.data
                this.loading = false
            });
    }
}
</script>
