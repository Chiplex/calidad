<template>
<div id="addlevel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addlevel-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addlevel-title">Nuevo Nivel</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/level/add" method="post" id="form_add_level">
                    <div class="form-group">
                        <label for="pisitions">Posición</label>
                        <input id="pisitions" class="form-control" type="text" name="" v-model="positions">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" form="form_add_level">Agregar</button>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        
    }
</script>

<style>

</style>