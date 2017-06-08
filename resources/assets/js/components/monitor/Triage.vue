<template>
    <div class="col-12 p-4 mb-5 white-bg border-light-gray">
        <div class="row">
            <div class="col-4 align-self-center">
                <h3 class="h4 blue-dark">Triage</h3>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col-6 mb-2" v-for="triage in triages">
                        <div class="row">
                            <div class="col-2 badge d-block border-radius-0" :class="`bg-${triage.slug}`"></div>
                            <div class="col">
                                <span class="text-muted">{{ triage.name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            triages: {
                type: Array,
                required: true
            }
        },
        created () {
            console.log(this.triages);
        }
    }
</script>
