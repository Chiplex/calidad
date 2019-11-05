<template>
<div>
    <div class="row">
        <spinner-component v-show="loading"></spinner-component>    
    </div>
    <div class="row">
        <div class="col-md-2" v-for="level in levels">
            <div class="card">
                <div class="card-body mr-0">
                    <h5 class="card-title">{{ level.positions }}</h5>
                    <form v-on:submit.prevent="deleteLevel(level.id)">
                        <a href="#"><i class="ik ik-eye text-blue"></i></a>
                        <a href="#">
                            <i class="ik ik-edit-2 text-green"></i>
                        </a>
                        <input type="hidden" name="level" :value="level.id">
                        <button type="submit" class="btn btn-link btn-rounded" style="vertical-align: inherit"><i class="ik ik-trash-2 text-red"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <addlevelbotton-component></addlevelbotton-component>
        </div>
    </div>
</div>
</template>
<script>
import { EventBus } from "../Event";
export default {
    data(){
        return {
            levels: [],
            loading: true
        }
    },
    methods:{
        deleteLevel: function (level) {
            axios
                .delete('http://127.0.0.1:8000/level/'+this.level)
                .then(res => {
                    console.log(res);
                    
                })
            
        }
    },
    created(){
        EventBus.$on('level-added', data => {
            this.levels.push(data);
            this.levels.sort();
        })
    },
    mounted(){
        axios
            .get('http://127.0.0.1:8000/level')
            .then((res) => {
                console.log(res);
                this.levels = res.data
                this.loading = false
            })
            .catch((error)=>{
                console.log(error);
            });
    }
}
</script>
