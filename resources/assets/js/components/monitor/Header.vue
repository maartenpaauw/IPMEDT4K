<template>
    <!-- Menu -->
    <div class="container-fluid">
        <div class="row blue-dark-bg py-3 px-5">
            <div class="col-2 align-self-center">
                <img :src="logo" alt="Krankenhaus Krak - Logo" width="150px">
            </div>
            <div class="col text-center text-white align-self-center">
                <h1 class="m-0 text-uppercase">Wacht indicatie</h1>
            </div>
            <div class="col-2 text-right text-white align-self-center">
                <h4>
                    <i class="fa fa-calendar mr-2"></i> <span v-html="date"></span>
                </h4>
                <h4>
                    <i class="fa fa-clock-o mr-2"></i> <span v-html="time"></span>
                </h4>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['logo'],
        data () {
            return {
                date: this.date = moment().format('LL'),
                time: this.time = moment().format('HH:mm:ss')
            }
        },
        created () {
            setInterval(() => {
                this.date = moment().format('LL');
                this.time = moment().format('HH:mm:ss');
            }, 1000)
        }
    }
</script>