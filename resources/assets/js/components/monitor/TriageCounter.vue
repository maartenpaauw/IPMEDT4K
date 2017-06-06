<template>
    <div class="col-12 p-4 mb-5 white-bg border-light-gray">
        <div class="row">
            <div class="col-4 align-self-center">
                <h3 class="h4 m-0 dark-blue">Patiënten</h3>
            </div>
            <div class="col align-self-center pl-0">
                <div class="rounded-circle text-center text-white circle float-left mr-1" v-for="patient in patients" :class="patient.color">
                    <span class="m-auto h4">{{ patient.count }}</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                patients: [
                    { count: 1, color: 'bg-danger' },
                    { count: 2, color: 'bg-warning' },
                    { count: 3, color: 'brand-watchout-bg' },
                    { count: 4, color: 'bg-success' },
                    { count: 5, color: 'bg-info' }
                ]
            }
        }
    }
</script>
