<template>
	<div class="card my-2">
		<div class="card-header">
            <div class="row justify-content-center" v-bind:style="{ fontSize: 1.6 + 'rem' }">
                <div class="col">
                    <a data-toggle="collapse" v-bind:href="'#'+id" role="button" aria-expanded="false" v-bind:aria-controls="id">
                        {{ name }}
                    </a>
                </div>
                <div class="col text-right">
                    <i class="fas fa-sort-amount-up mx-3" data-toggle="tooltip" data-placement="top" v-bind:title="'priority: '+priority"></i>
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
