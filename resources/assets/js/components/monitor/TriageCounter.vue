<template>
    <div class="col-12 p-4 mt-5 white-bg border-light-gray">
        <div class="row">
            <div class="col-4 align-self-center">
                <h3 class="h4 m-0 dark-blue">Aantal</h3>
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
                    { count: 1, color: 'bg-onmiddelijk' },
                    { count: 2, color: 'bg-hoog-urgent' },
                    { count: 3, color: 'bg-urgent' },
                    { count: 4, color: 'bg-standaard' },
                    { count: 5, color: 'bg-niet-urgent' }
                ]
            }
        }
    }
</script>
