<template>
<div id="addlevel" class="modal fade" 
    tabindex="-1" role="dialog" 
    aria-labelledby="addlevel-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addlevel-title">Nuevo Nivel</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form v-on:submit.prevent="createLevel" id="formlevel">
                    <div class="form-group">
                        <label for="positions">Posición</label>
                        <input id="positions" class="form-control" type="text" v-model="positions">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit" form="formlevel">Agregar</button>
            </div>
        </div>
    </div>
</div>
</template>
<script>
import { EventBus } from "../Event";
export default {
    data(){
        return {
            positions: null
        }
    },
    methods: {
        createLevel: function() {
            console.log('enviando '+this.positions);
            
            axios
                .post('http://127.0.0.1:8000/level',{
                    positions: this.positions
                })
                .then(function (res) {
                    console.log('recibido: '+res.data);
                    EventBus.$emit('level-added', res.data.level);
                    
                })
                .catch(function (err) {
                    console.log('error: '+err)
                })
        }
    }
}
</script>
<style>

</style>