<template>
    <div class="col-12 p-4 mt-5 white-bg border-light-gray">
        <div class="row">
            <div class="col-12">
                <h3 class="h4 dark-blue m-0 p-0 mb-4">
                    <strong>Laatste 10 patiënten</strong>
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped border-light-gray mb-0">
                    <thead>
                    <tr>
                        <th class="border-bottom-0" width="10%">Urgentie</th>
                        <th class="border-bottom-0 pl-5">Code</th>
                        <th class="border-bottom-0 pl-5">Naam</th>
                        <th class="border-bottom-0 pl-5"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(patient, index) in patients">
                        <td class="text-white text-center" :class="background(patient.triage.slug)" />
                        <td class="pl-5"><strong>{{ patient.band_number | number }}</strong></td>
                        <td class="pl-5">{{ patient.first_name }} {{ patient.last_name }}</td>
                        <td class="pl-5">
                            <a class="btn btn-success rounded text-white" :href="`/patienten/${patient.id}/edit`">wijzigen</a>
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
        created () {
            this.patients = this.initialPatients;
        },
        methods: {
            background (triage) {

                // Return the background color class.
                return `bg-${triage}`;
            }
        },
        filters: {
            number (value) {
                // Convert the value to a local number string.
                return value.toLocaleString('nl-NL');
            }
        }
    }
</script>