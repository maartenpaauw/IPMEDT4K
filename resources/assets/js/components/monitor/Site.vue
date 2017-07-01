<template>
    <div class="col-12 p-4 blue-dark-bg">
        <h4 class="text-white text-center text-uppercase p-0 m-0">
            <i class="fa fa-external-link align-middle" /> <span class="pl-3">{{ url }}</span>
        </h4>
    </div>
</template>

<script>
    export default {
        props: ['url']
    }
</script>
