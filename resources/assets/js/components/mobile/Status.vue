<template>
    <div class="row text-center">
        <div class="col-12 py-5" :class="background">
            <h1 class="text-white">{{ patient.band_number }}</h1>
            <h2 class="text-white h6">Er zijn 3 wachtende voor u.</h2>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'mobile-status',
        props: ['patient'],
        computed: {
            background () {
                return `bg-${this.patient.triage.slug}`;
            }
        }
    }
</script>
