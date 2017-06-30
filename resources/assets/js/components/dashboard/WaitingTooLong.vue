<template>
    <div class="col p-4 white-bg border-light-gray">
        <div class="row">
            <div class="col-12">
                <h3 class="h4 dark-blue m-0 p-0 mb-4">
                    <strong>Wacht te lang</strong>
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped border-light-gray mb-0">
                    <thead>
                        <tr>
                            <th width="10%">Urgentie</th>
                            <th class="pl-5">Patiëntnummer</th>
                            <th class="pl-5">Tijd</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(patient, index) in tooLate">
                            <td class="text-white text-center" :class="background(patient.triage.slug)"><strong>{{ index + 1 }}</strong></td>
                            <td class="pl-5"><strong>{{ patient.band_number | number }}</strong></td>
                            <td class="pl-5">{{ waiting(patient.created_at) }} minuten</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'dashboard-waiting-too-long',
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
        computed: {
            tooLate () {
                return this.patients.filter((patient) => {

                    // Patient created at.
                    const created_at = moment(patient.created_at, "YYYY-MM-DD HH:mm:ss");

                    // Now.
                    const now = moment();

                    // Starting time.
                    const starting_time = moment("00:00:00", "HH:mm:ss");

                    // Maximum waiting time.
                    const max_waiting_time = moment(patient.triage.maximum_waiting_time, "HH:mm:ss");

                    // Return if maximum waiting time is passed.
                    return now.diff(created_at, 'minutes') >= max_waiting_time.diff(starting_time, 'minutes');
                });
            }
        },
        methods: {
            waiting (timestamp) {

                // Patient created at.
                const created_at = moment(timestamp, "YYYY-MM-DD HH:mm:ss");

                // Now.
                const now = moment();

                // Return the difference in minutes.
                return now.diff(created_at, 'minutes');
            },
            background (triage) {

                // Return the background color class.
                return `bg-${triage}`;
            },
            getPatients () {

                // Make an API call to get the patients.
                axios.get('/api/patients')
                    .then( (response) => {

                        // Update the new patients.
                        this.patients = response.data;
                    })
                ;
            },
        },
        created () {
            // Set the patients.
            this.patients = this.initialPatients;

            // Set an interval.
            setInterval(() => {

                // Get the new patients every 15 seconds.
                this.getPatients();

                // Every 15 seconds.
            }, 1000 * 15);
        },
        filters: {
            number (value) {
                // Convert the value to a local number string.
                return value.toLocaleString('nl-NL');
            }
        }
    }
</script>
