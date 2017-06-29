<template>
    <div class="row text-center">
        <div class="col-12 py-5">
            <h3 :class="color">Wat betekenen de andere kleuren voor mij?</h3>
            <p class="text-muted">Hieronder worden alle triages voor u vergeleken en wat deze voor u als patiënt betekenen. U kunt uw triage kleur terugvinden op uw bandje, uw informatie pagina en bovenaan op deze pagina. Ook ziet u de triage kleur terug bij elke vergelijking die wordt gemaakt.</p>
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