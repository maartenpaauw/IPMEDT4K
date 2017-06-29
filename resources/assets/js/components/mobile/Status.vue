<template>
    <div class="row text-center">
        <div class="col-12 py-5" :class="background">
            <h1 class="text-white">{{ patient.band_number | number }}</h1>
            <h2 class="text-white h6">{{ sentence }}</h2>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'mobile-status',
        data () {
            return {
                waitingPatients: 0
            }
        },
        props: {
            patient: {
                required: true
            },
            initialWaitingPatients: {
                default: 0
            }
        },
        computed: {
            background () {
                return `bg-${this.patient.triage.slug}`;
            },
            sentence () {
                const number = this.waitingPatients;
                const word   = number === 1 ? 'is' : 'zijn';

                if (number !== 0) {
                    return `Er ${word} ${number} wachtende voor u.`;
                } else {
                    return 'U bent de eerst volgende.';
                }

            }
        },
        methods: {
            getWaiting() {
                axios.get(`/api/patients/waiting/${this.patient.band_number}`)
                    .then((response) => {
                        this.waitingPatients = response.data.waiting
                    })
                ;
            }
        },
        created () {

            this.waitingPatients = this.initialWaitingPatients;

            this.getWaiting();
            setInterval(() => {
                this.getWaiting();
            }, 1000 * 15)
        },
        filters: {
            number (value) {
                // Convert the value to a local number string.
                return value.toLocaleString('nl-NL');
            }
        }
    }
</script>
