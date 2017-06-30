<template>
    <div class="row my-5 px-1 py-3 white-bg border-light-gray">
        <div class="col-1">
            <img :src="logo" alt="Nu.nl - Logo" style="height: 50px;">
        </div>
        <div class="col-11 align-self-center">
            <p class="marquee m-0 mr-5 news-item">
                <span class="marquee-span" :style="animation">
                    <span v-for="item in news">
                        <strong class="text-info pl-5">{{ item.date | date }}</strong><span class="dark-blue">&emsp;&mdash;&emsp;</span>{{ item.title }}.
                    </span>
                </span>
            </p>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['logo'],
        data () {
            return {
                news: [],
                speed: 6
            }
        },
        computed: {
            animation () {
                return {
                    animation: `marqueehorizontal ${this.news.length * this.speed}s linear infinite`
                }
            }
        },
        methods: {
            getNews () {
                axios.get('/api/nu.nl')
                    .then((response) => {
                        this.news = this.fakeNews(response.data);
                    })
                ;
            },
            fakeNews (news) {
                return _.flatten(Array(10).fill(news));
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
