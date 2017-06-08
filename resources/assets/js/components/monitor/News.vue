<template>
    <div class="row my-5 px-1 py-3 white-bg border-light-gray">
        <div class="col-1">
            <img :src="logo" alt="Nu.nl - Logo" style="height: 50px;">
        </div>
        <div class="col-11 align-self-center">
            <div class="news">
                <p class="marquee m-0 mr-5 news-item">
                    <span class="marquee-span">
                        <span v-for="item in news">
                            <strong class="text-info pl-5">{{ item.date | date }}</strong><span class="dark-blue">&emsp;&mdash;&emsp;</span>{{ item.title }}.
                        </span>
                    </span>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['logo'],
        data () {
            return {
                news: []
            }
        },
        methods: {
            getNews () {
                axios.get('/api/nu.nl')
                    .then( (response) => {
                        this.news = response.data;
                    })
                ;
            }
        },
        created () {
            this.getNews();
            setInterval(() => {
                this.getNews();
            }, 1000 * 60 * 5);
        },
        filters: {
            date (value) {
                return moment(value).format('HH:mm');
            }
        }
    }
</script>
