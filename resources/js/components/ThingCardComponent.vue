<template>
    <div class="card my-1">
        <div class="card-body"">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                    <div v-if="name.length < 25" data-toggle="tooltip" data-placement="top" v-bind:title="name">{{ name }}</div>
                    <div v-else data-toggle="tooltip" data-placement="top" v-bind:title="name">{{ name.substring(0,25)+"..." }}</div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-right">
                    <i class="fas fa-tasks mx-1" data-toggle="tooltip" data-placement="top" v-bind:title="status"></i>
                    <i class="fas fa-clock mx-1" data-toggle="tooltip" data-placement="top" v-bind:title="start_at"></i>
                    <i class="fas fa-clock mx-1" data-toggle="tooltip" data-placement="top" v-bind:title="end_at"></i>
                    <i class="fas fa-sort-amount-down mx-1" data-toggle="tooltip" data-placement="top" v-bind:title="difficulty"></i>
                    <i class="fas fa-star mx-1" data-toggle="tooltip" data-placement="top" v-bind:title="importance"></i>
                    <i class="fas fa-exclamation-triangle mx-1" data-toggle="tooltip" data-placement="top" v-bind:title="urgency"></i>
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
