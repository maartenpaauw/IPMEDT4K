<template>
    <div class="col-12" v-if="patients">
        <div class="row">
            <div class="col-12 patients border-light-gray bg-white">
                <div class="marquee-span" :style="animation">
                    <div class="row white-bg border-light-gray border-left-0 border-right-0 border-top-0" v-for="(patient, index) in patients" :key="index">
                        <div class="col-1 py-5" :class="`bg-${patient.triage.slug}`">
                            <h4 class="text-white text-center m-0 h6">{{ index + 1 | number }}</h4>
                        </div>
                        <div class="col align-self-center ml-3">
                            <h4 class="h1 m-0 dark-blue">{{ patient.number | number }}</h4>
                        </div>
                        <div class="col align-self-center">
                            <p class="m-0 h5" :class="patient.status.slug">
                                <span class="fa fa-clock-o"></span> {{ patient.status.name }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</template>

<script>
    export default {
        props: ['initial-patients'],
        data () {
            return {
                patients: null,
                speed: 3
            }
        },
        computed: {
            animation () {
                return {
                    animation: `marqueevertical ${this.patients.length * this.speed}s linear infinite`
                }
            }
        },
        methods: {
            getPatients () {

                // Make an API call to get the patients.
                axios.get('/api/patients')
                    .then( (response) => {
                        this.patients = response.data;
                    })
                ;
            }
        },
        filters: {
            number (value) {
                return value.toLocaleString('nl-NL');
            }
        },
        created () {

            // Set the patients.
            this.patients = this.initialPatients;

            // Get the new patients every 15 seconds.
            setInterval(() => {
                this.getPatients();
            }, 1000 * 15);
        }
    }
</script>

<style lang="scss">
    .patients {
        height: 496px;
        overflow-y: hidden;
    }
</style>
