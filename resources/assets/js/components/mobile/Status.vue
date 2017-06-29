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
        props: {
            patient: {
                required: true
            },
            'waiting_patients': {
                default: 0
            }
        },
        computed: {
            background () {
                return `bg-${this.patient.triage.slug}`;
            },
            sentence () {
                const number = this.waiting_patients;
                const word   = number === 1 ? 'is' : 'zijn';

                if (number !== 0) {
                    return `Er ${word} ${number} wachtende voor u.`;
                } else {
                    return 'U bent de eerst volgende.';
                }

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
