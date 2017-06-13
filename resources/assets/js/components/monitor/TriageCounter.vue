<template>
    <div class="col-12 p-4 mt-5 white-bg border-light-gray" v-if="triages">
        <div class="row">
            <div class="col-4 align-self-center">
                <h3 class="h4 m-0 dark-blue">Aantal</h3>
            </div>
            <div class="col align-self-center pl-0">
                <div class="rounded-circle text-center text-white circle float-left mr-1" v-for="triage in triages" :class="`bg-${triage.triage.slug}`">
                    <span class="m-auto h4">{{ triage.patients_count }}</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['initial-triages'],
        data () {
            return {
                triages: null
            }
        },
        methods: {
            getTriages () {

                // Make an API call to get the new count.
                axios.get('/api/patients/count')
                    .then( (response) => {
                        this.triages = response.data;
                    })
                ;
            }
        },
        created () {

            // Set the triages.
            this.triages = this.initialTriages;

            // Get the new counts every 15 seconds.
            setInterval(() => {
                this.getTriages();
            }, 1000 * 15);
        }
    }
</script>
