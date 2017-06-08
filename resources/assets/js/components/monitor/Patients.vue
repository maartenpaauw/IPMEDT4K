<template>
    <div class="col-12">
        <div class="row py-3">
            <div class="col-1 align-self-center">
                <p class="mb-1 text-muted">Urg</p>
            </div>
            <div class="col ml-3 align-self-center">
                <p class="mb-1 text-muted">Code</p>
            </div>
            <div class="col align-self-center">
                <p class="mb-1 text-muted">Status</p>
            </div>
        </div>
        <div class="row white-bg border-light-gray border-bottom-0" v-for="patient in patients">
            <div class="col-1 py-5" :class="patient.triage"></div>
            <div class="col align-self-center ml-3">
                <h4 class="h1 m-0 dark-blue">{{ patient.number }}</h4>
            </div>
            <div class="col align-self-center">
                <p class="m-0 h5" :class="{'text-success': patient.status_id === 2}">
                    <span class="fa fa-clock-o"></span> {{ patient.status_id === 2 ? 'In behandeling' : 'Wachten' }}
                </p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                patients: [
                    { number: 56934, triage: 'bg-danger',         status_id: 2 },
                    { number: 56934, triage: 'bg-warning',        status_id: 1 },
                    { number: 56934, triage: 'brand-watchout-bg', status_id: 1 },
                    { number: 56934, triage: 'bg-success',        status_id: 1 },
                    { number: 56934, triage: 'bg-info',           status_id: 1 }
                ]
            }
        }
    }
</script>
