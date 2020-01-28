<template>
    <div class="card mt-1">
        <div class="card-body">
            <div class="row">
                <div class="col text-left">
                    <div v-if="name.length < 25" data-toggle="tooltip" data-placement="top" v-bind:title="name">{{ name }}</div>
                    <div v-else data-toggle="tooltip" data-placement="top" v-bind:title="name">{{ name.substring(0,22)+"..." }}</div>
                </div>
                <div class="col text-right">
                    <i class="fas fa-tasks mx-1" data-toggle="tooltip" data-placement="top" v-bind:title="status"></i>
                    <i class="fas fa-clock mx-1" data-toggle="tooltip" data-placement="top" v-bind:title="start_at"></i>
                    <i class="fas fa-clock mx-1" data-toggle="tooltip" data-placement="top" v-bind:title="end_at"></i>
                    <i class="fas fa-sort-amount-down mx-1" data-toggle="tooltip" data-placement="top" v-bind:title="difficulty"></i>
                    <i class="fas fa-star mx-1" data-toggle="tooltip" data-placement="top" v-bind:title="importance"></i>
                    <i class="fas fa-exclamation-triangle mx-1" data-toggle="tooltip" data-placement="top" v-bind:title="urgency"></i>
                    <i class="fas fa-ellipsis-v mx-3" data-toggle="tooltip" data-placement="top" title="options"></i>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'name', 
            'status',
            'start_at',
            'end_at',
            'difficulty',
            'importance',
            'urgency'
        ],
    }
</script>
