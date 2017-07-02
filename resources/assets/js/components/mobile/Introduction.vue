<template>
    <div class="row text-center" v-if="patient.triage">
        <div class="col-12 py-5">
            <h3 :class="color">Wat betekenen de andere kleuren voor mij?</h3>
            <p class="text-muted">Hieronder worden alle triages voor u vergeleken en wat deze voor u als patiënt betekenen. U kunt uw triage kleur terugvinden op uw bandje, uw informatie pagina en bovenaan op deze pagina. Ook ziet u de triage kleur terug bij elke vergelijking die wordt gemaakt.</p>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'mobile-introduction',
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