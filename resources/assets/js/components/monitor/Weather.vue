<template>
    <div class="col-12 p-4 mb-5 white-bg border-light-gray">
        <div class="row">

            <div class="col-12">
                <h3 class="h4 dark-blue">
                    <strong>{{ city }},</strong> {{ country }}
                </h3>
                <small>
                    <i class="text-info">Leids Universitair Medisch Centrum</i>
                </small>
            </div>

            <div class="col-12 mt-5 mb-4">
                <div class="row">
                    <div class="col">
                        <p class="h1 text-center" style="font-size: 4rem;">
                            <i class="mr-3 text-info" :class="weather_icon"></i> <span class="dark-blue">{{ temperature }}<sup>&deg;c</sup></span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-12 my-2">
                <hr>
            </div>

            <div class="col-12">
                <div class="row">
                    <div class="col">
                        <p class="m-0 text-info">
                            <i class="wi wi-sunrise fa-2x  m-0 mr-2 align-middle"></i> <span class="align-middle blue-dark">{{ sunrise | time }}</span>
                        </p>
                    </div>
                    <div class="col">
                        <p class="m-0 text-info">
                            <i class="wi wi-sunset  fa-2x m-0 mr-2 align-middle"></i> <span class="align-middle blue-dark">{{ sunset | time }}</span>
                        </p>
                    </div>
                    <div class="col-5">
                        <p class="m-0 text-info text-right">
                            <i class="wi wi-strong-wind fa-2x m-0 mr-2 align-middle"></i> <span class="align-middle blue-dark">{{ wind_speed }} km/h - {{ wind_direction }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                city: 'Leiden',
                country: 'Nederland',
                weather_icon: '',
                temperature: '',
                sunrise: '',
                sunset: '',
                wind_speed: '',
                wind_direction: ''
            }
        },
        methods: {
            getWeather() {
                axios.get('/api/weather')
                    .then( (response) => {
                        this.city = response.data.name;
                        this.weather_icon = response.data.weather[0].icon;
                        this.temperature = (response.data.main.temp).toFixed(1);
                        this.sunrise = response.data.sys.sunrise;
                        this.sunset = response.data.sys.sunset;
                        this.wind_speed = (response.data.wind.speed * 3.6).toFixed(1);
                        this.wind_direction = response.data.wind.dir;
                    })
                ;
            }
        },
        created () {
            this.getWeather();
        },
        filters: {
            time (value) {
                return moment(value, 'X').format('HH:mm');
            }
        }
    }
</script>