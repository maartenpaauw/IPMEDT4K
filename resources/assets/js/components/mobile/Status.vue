<template>
    <div class="row text-center">
        <div class="col-12 py-5" :class="background">
            <h1 class="text-white">{{ patient.band_number }}</h1>
            <h2 class="text-white h6 mb-0x">{{ sentence }}</h2>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'mobile-status',
        data () {
            return {
                patient: [],
                waitingPatients: 0
            }
        },
        props: {
            initialPatient: {
                required: true
            },
            initialWaitingPatients: {
                default: 0
            }
        },
        computed: {
            background () {

                // Controleer of er geen triage is.
                if (this.patient.triage === null) {

                    // Geef de standaard achtergrond terug.
                    return 'blue-dark-bg';

                // Wel een triage?
                } else {

                    // Geef de triage kleur als achtergrond terug.
                    return `bg-${this.patient.triage.slug}`;
                }
            },
            sentence () {
                // Het aantal wachtende voor u.
                const number = this.waitingPatients;

                // Controleer of de patient niet wachtend is.
                if(number === false) {
                    return `U ben ${(this.patient.status.name).toLowerCase()}.`
                }

                // Zo wel.
                else {
                    // Enkelvoud / meervoud.
                    const word = number === 1 ? 'is' : 'zijn';

                    // Patient is niet de eerste.
                    if (number !== 0) {

                        // Geef de zin terug.
                        return `Er ${word} ${number} wachtende voor u.`;

                    // Patient is de eerstvolgende.
                    } else {

                        // Geef dat terug als zin.
                        return 'U bent de eerst volgende.';
                    }
                }
            }
        },
        methods: {
            getWaiting() {
                axios.get(`/api/patients/waiting/${this.initialPatient.band_number}`)
                    .then((response) => {
                        this.waitingPatients = response.data.waiting
                    })
                ;
            },
            getPatient () {
                axios.get(`/api/patients/${this.initialPatient.band_number}`)
                    .then((response) => {
                        this.patient = response.data
                    })
                ;
            }
        },
        created () {

            // Set the number of waiting patients.
            this.waitingPatients = this.initialWaitingPatients;
            this.patient = this.initialPatient;

            this.getWaiting();
            this.getPatient();

            setInterval(() => {
                this.getWaiting();
                this.getPatient();
            }, 1000 * 15)
        }
    }
</script>
