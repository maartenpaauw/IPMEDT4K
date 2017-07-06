<template>
    <a class="col-12 p-4 mb-5 blue-dark-bg text-center" :href="href">
        <p class="h4 text-white text-uppercase p-0 m-0">
            <i class="fa fa-external-link align-middle" /> <span class="pl-3">Snel een patiënt toevoegen?</span>
        </p>
    </a>
</template>

<script>
    export default {
        name: 'dashboard-fast-check-in',
        props: ['href']
    }
</script>

<style lang="scss" scoped="scoped">
    a,
    a:hover {
        text-decoration: none;
    }
</style>