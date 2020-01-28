<template>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col text-left" v-bind:style="{ fontSize: 1.4 + 'rem' }">
                    <a data-toggle="collapse" v-bind:href="'#'+id" role="button" aria-expanded="false" v-bind:aria-controls="id">
                        <div v-if="name.length < 25" data-toggle="tooltip" data-placement="top" v-bind:title="name">{{ name }}</div>
                        <div v-else data-toggle="tooltip" data-placement="top" v-bind:title="name">{{ name.substring(0,22)+"..." }}</div>
                    </a>
                </div>
                <div class="col text-right">
                    <i class="fas fa-sort-amount-up mx-2" data-toggle="tooltip" data-placement="top" v-bind:title="'Priority: '+priority"></i>    
                    <i class="fas fa-ellipsis-v mx-2" data-toggle="tooltip" data-placement="top" title="options"></i>
                </div> 
            </div>
        </div>
        <div v-if="show == 'true'">
            <div v-bind:id="id" class="collapse show">
                <div class="card-body">
                    <slot>
                        
                    </slot>
                </div>
            </div>    
        </div>
        <div v-else>
            <div v-bind:id="id" class="collapse">
                <div class="card-body">
                    <slot>
                        
                    </slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'id',
            'name', 
            'priority',
            'show'
        ],
    }
</script>
