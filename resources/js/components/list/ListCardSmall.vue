<template>
    <div class="card mt-1 ml-2">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col text-left">
                    <a v-bind:href="route">
                        <div v-if="name.length < 16" data-toggle="tooltip" data-placement="top" v-bind:title="name">{{ name }}</div>
                        <div v-else data-toggle="tooltip" data-placement="top" v-bind:title="name">{{ name.substring(0,13)+"..." }}</div>
                    </a>            
                </div>
                <div class="col text-right">
                    <i class="fas fa-ellipsis-v mx-2" data-toggle="tooltip" data-placement="top" title="options"></i>        
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
        	'name',
            'route'
        ],
    }
</script>
