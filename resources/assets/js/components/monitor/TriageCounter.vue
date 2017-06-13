<template>
    <div class="col-12 p-4 mt-5 white-bg border-light-gray">
        <div class="row">
            <div class="col-4 align-self-center">
                <h3 class="h4 m-0 dark-blue">Aantal</h3>
            </div>
            <div class="col align-self-center pl-0">
                <div class="rounded-circle text-center text-white circle float-left mr-1" v-for="triage in triages" :class="`bg-${triage.slug}`">
                    <span class="m-auto h4">{{ triage.patients_count }}</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['triages']
    }
</script>
