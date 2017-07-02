<template>
    <div class="col-12 p-4 mb-5 white-bg border-light-gray">
        <div class="row">
            <div class="col-12">
                <h3 class="h4 dark-blue m-0 p-0 mb-4">
                    <strong>Laatste 10 patiënten</strong>
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 overflow-x-scroll">
                <table class="table table-striped border-light-gray mb-0">
                    <thead>
                    <tr>
                        <th class="border-bottom-0" width="10%">Urgentie</th>
                        <th class="border-bottom-0 pl-5">Code</th>
                        <th class="border-bottom-0 pl-5 hidden-md-down">Naam</th>
                        <th class="border-bottom-0 pl-5">Wijzigen</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(patient, index) in patients">
                        <td class="text-white text-center" :class="background(patient)" />
                        <td class="pl-5"><strong>{{ patient.band_number }}</strong></td>
                        <td class="pl-5 hidden-md-down">{{ patient.first_name }} {{ patient.last_name }}</td>
                        <td class="pl-5">
                            <a class="btn btn-success btn-sm rounded text-white" :href="`/patienten/${patient.id}/edit`">wijzigen</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'dashboard-last-ten-patients',
        props: {
            initialPatients: {
                required: true
            }
        },
        data () {
            return {
                patients: []
            }
        },
        methods: {
            background (patient) {

                // Controleer of er geen triage is.
                if (patient.triage === null) {

                    // Geef de standaard achtergrond terug.
                    return 'bg-white';

                    // Wel een triage?
                } else {

                    // Geef de triage kleur als achtergrond terug.
                    return `bg-${patient.triage.slug}`;
                }
            },
            getPatients () {

                // Make an API call to get the patients.
                axios.get('/api/patients/last-10')
                    .then( (response) => {

                        // Update the new patients.
                        this.patients = response.data;
                    })
                ;
            }
        },
        created () {
            this.patients = this.initialPatients;

            // Set an interval.
            setInterval(() => {

                // Get the new patients every 15 seconds.
                this.getPatients();

                // Every 1 minute.
            }, 1000 * 60);
        }
    }
</script>

<style lang="scss" scoped="scoped">
    .overflow-x-scroll {
        overflow-x: scroll;
    }
</style>
