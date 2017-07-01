<template>
    <div class="col-12 p-4 white-bg border-light-gray">
        <div class="row">
            <div class="col-12">
                <h3 class="h4 dark-blue m-0 p-0 mb-4">
                    <strong>Wacht te lang</strong>
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
                            <th class="border-bottom-0 pl-5">Tijd</th>
                            <th class="border-bottom-0 pl-5 hidden-md-down">Wijzigen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(patient, index) in tooLate">
                            <td class="text-white text-center" :class="background(patient.triage.slug)" />
                            <td class="pl-5"><strong>{{ patient.band_number | number }}</strong></td>
                            <td class="pl-5 hidden-md-down">{{ patient.first_name }} {{ patient.last_name }}</td>
                            <td class="pl-5">
                                <i class="fa fa-clock-o"></i> <span class="ml-2">{{ waiting(patient.created_at) }} minuten</span>
                            </td>
                            <td class="pl-5 hidden-md-down">
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

                // Every 1 minute.
            }, 1000 * 60);
        },
        filters: {
            number (value) {
                // Convert the value to a local number string.
                return value.toLocaleString('nl-NL');
            }
        }
    }
</script>

<style lang="scss" scoped="scoped">
    .overflow-x-scroll {
        overflow-x: scroll;
    }
</style>
