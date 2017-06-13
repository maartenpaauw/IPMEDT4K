<template>
    <div class="col-12">
        <div class="row py-3">
            <div class="col-1 align-self-center">
                <p class="mb-1 text-muted">Urg</p>
            </div>
            <div class="col ml-3 align-self-center">
                <p class="mb-1 text-muted">Code</p>
            </div>
            <div class="col align-self-center">
                <p class="mb-1 text-muted">Status</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 patients border-light-gray bg-white">
                <div class="marquee-span marquee-vertical">
                    <div class="row white-bg border-light-gray border-left-0 border-right-0 border-top-0" v-for="patient in patients">
                        <div class="col-1 py-5" :class="`bg-${patient.triage.slug}`"></div>
                        <div class="col align-self-center ml-3">
                            <h4 class="h1 m-0 dark-blue">{{ patient.number | number }}</h4>
                        </div>
                        <div class="col align-self-center">
                            <p class="m-0 h5" :class="patient.status.slug">
                                <span class="fa fa-clock-o"></span> {{ patient.status.name }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</template>

<script>
    export default {
        props: ['patients'],
        filters: {
            number (value) {
                return value.toLocaleString('nl-NL');
            }
        }
    }
</script>

<style lang="scss">
    .patients {
        height: 500px;
        overflow-y: hidden;
    }

    .marquee {
        width: 100%;
        margin: auto;
        white-space: nowrap;
        overflow: hidden;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        border: 0;
    }

    .marquee .marquee-span {
        display: inline-block;
        text-indent: 0;
        border: 0;
    }

    .marquee-horizontal {
        animation: marqueehorizontal 15s linear infinite;
    }

    .marquee-vertical {
        animation: marqueevertical 25s linear infinite;
    }

    @keyframes marqueehorizontal {
        0% {
            -webkit-transform: translate(0, 0);
            -moz-transform: translate(0, 0);
            -ms-transform: translate(0, 0);
            -o-transform: translate(0, 0);
            transform: translate(0, 0);
        }

        100% {
            -webkit-transform: translate(-50%, 0);
            -moz-transform: translate(-50%, 0);
            -ms-transform: translate(-50%, 0);
            -o-transform: translate(-50%, 0);
            transform: translate(-50%, 0);
        }
    }

    @keyframes marqueevertical {
        0% {
            -webkit-transform: translate(0, 0);
            -moz-transform: translate(0, 0);
            -ms-transform: translate(0, 0);
            -o-transform: translate(0, 0);
            transform: translate(0, 0);
        }

        100% {
            -webkit-transform: translate(0, -100%);
            -moz-transform: translate(0, -100%);
            -ms-transform: translate(0, -100%);
            -o-transform: translate(0, -100%);
            transform: translate(0, -100%);
        }
    }
</style>
