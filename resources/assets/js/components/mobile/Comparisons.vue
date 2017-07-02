<template>
    <div>
        <div v-if="patient.triage">
            <mobile-compare v-for="compare in patient.triage.comparisons" :compare="compare" :key="compare.id"></mobile-compare>
        </div>
        <div class="row m-4 text-center" v-else="">
            <div class="col-12">
                <h3 class="blue-dark m-0">Nog geen vergelijkingen...</h3>
                <p class="text-muted m-0 mt-3">
                    U heeft nog geen triage ontvangen. Daarom kunnen er nog geen vergelijkingen worden gemaakt. Kom later terug.
                </p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name : 'mobile-comparisons',
        props: {
            initialPatient: {
                required: true
            }
        },
        data () {
            return {
                patient: []
            }
        },
        methods: {
            getPatient () {
                axios.get(`/api/patients/${this.initialPatient.band_number}`)
                    .then((response) => {
                        this.patient = response.data
                    })
                ;
            }
        },
        created () {
            this.patient = this.initialPatient;
            this.getPatient();
            setInterval(() => {
                this.getPatient();
            }, 1000 * 15)
        }
    }
</script>