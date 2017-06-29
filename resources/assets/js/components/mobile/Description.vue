<template>
    <div class="row text-center">
        <div class="col-12 py-5">
            <h3 :class="color">Uw kleur code</h3>
            <p class="text-muted">{{ patient.triage.description }}</p>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'mobile-description',
        props: ['patient'],
        computed: {
            color () {
                return this.patient.triage.slug;
            }
        }
    }
</script>