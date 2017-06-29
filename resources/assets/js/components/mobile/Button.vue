<template>
    <div class="row">
        <div class="col-12 pb-5">
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
            patient: {
                required: true
            },
            href: {
                default: document.referrer
            }
        },
        computed: {
            background () {
                return `bg-${this.patient.triage.slug}`;
            }
        }
    }
</script>

<style lang="scss" scoped="scoped">
    i {
        font-size: 10px;
    }
</style>
