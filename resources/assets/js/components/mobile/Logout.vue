<template>
    <div class="row">
        <div class="col-12 text-center mb-5">
            <small>
                <a class="text-muted" :href="href">Uitloggen</a>
            </small>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'mobile-logout',
        props: ['href']
    }
</script>
