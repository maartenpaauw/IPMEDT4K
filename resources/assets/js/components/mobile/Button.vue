<template>
    <div class="row">
        <div class="col-12 pb-3">
            <a class="btn btn-block justify-content-center" :class="background" :href="href">
                <slot></slot>
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'mobile-button',
        props: {
            initialPatient: {
                required: true
            },
            href: {
                required: true
            }
        },
        data () {
            return {
                patient: []
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
            }, 1000 * 15);
        }
    }
</script>

<style lang="scss" scoped="scoped">
    i {
        font-size: 10px;
    }
</style>
