<template>
    <div class="row justify-content-center">
        <spinner-component v-show="loading"></spinner-component>
        <div class="col-md-8" v-for="perro in perros">
            <div class="card">
                <div class="card-header">
                    {{ perro.name }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            perros:[],
            description: 'Esto es una descripción',
            loading: true
        }
    },
    mounted() {
        axios
            .get('http://127.0.0.1:8000/vue')
            .then( (response) => {
                this.perros = response.data
                this.loading = false
            })
        console.log('Component mounted.')
    }
}

function promesa(response) {
    this.perros = response.data
}

(bar) => bar*bar
</script>
