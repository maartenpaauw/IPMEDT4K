<template>
    <div class="row text-center">
        <div class="col-12 py-5">
            <h3 :class="color">Wat betekenen de andere kleuren voor mij?</h3>
            <p class="text-muted">Dit moet een omschrijving worden...</p>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'mobile-introduction',
        props: ['patient'],
        computed: {
            color () {
                return this.patient.triage.slug;
            }
        }
    }
</script>