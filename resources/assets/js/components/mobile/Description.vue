<template>
    <div class="row text-center">
        <div class="col-12 py-5" v-if="patient.triage">
            <h3 :class="color">Uw kleur code</h3>
            <p class="text-muted">U heeft door onze verpleger het triage <strong :class="color">{{ patient.triage.name }}</strong> gekregen, dit betekent voor u een aantal dingen.</p>
            <p class="text-muted">{{ patient.triage.description }}</p>
        </div>
        <div class="col-12 py-5" v-else="">
            <h3 :class="color">Nog geen triage...</h3>
            <p class="text-muted p-0 m-0">U heeft nog geen triage gekregen. De verpleger zal zometeen een diagnose stellen en u koppelen aan een triage.</p>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'mobile-description',
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
        computed: {
            color () {

                // Controleer of er geen triage is.
                if (this.patient.triage === null) {

                    // Geef de standaard achtergrond terug.
                    return 'blue-dark';

                    // Wel een triage?
                } else {

                    // Geef de triage kleur als achtergrond terug.
                    return `${this.patient.triage.slug}`;
                }
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