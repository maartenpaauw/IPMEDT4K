<template>
    <div class="row mb-4">
        <div class="col-4">
            <div class="row">
                <div class="col-6">
                    <div class="square" :class="backgroundA" />
                </div>
                <div class="col-6">
                    <div class="square" :class="backgroundB" />
                </div>
            </div>
        </div>
        <div class="col-7 offset-1">
            <h5 :class="color">Wat betekend <strong>{{ compare.b.name }}</strong> voor mij?</h5>
        </div>
        <div class="col-12">
            <p class="text-muted">{{ compare.description }}</p>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'mobile-compare',
        props: ['compare'],
        computed: {
            color () {
                return this.compare.a.slug;
            },
            backgroundA () {
                return `bg-${this.compare.a.slug}`;
            },
            backgroundB () {
                return `bg-${this.compare.b.slug}`;
            }
        }
    }
</script>

<style lang="scss" scoped="scoped">
    .square {
        width: 50px;
        height: 50px;
    }
</style>