<template>
    <div>
        <div class="form-group mt-5">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-user-o" />
                </div>
                <input type="text" name="band_number" class="form-control form-style mobile-login-input-bandnumber text-center" id="band_number" placeholder="Persoonlijke code" v-model="band_number" />
            </div>
        </div>
        <button class="btn btn-primary btn-block btn-login mt-4 px-5 py-3 justify-content-center" @click="submit">
            <strong>Login</strong>
            <i class="fa fa-chevron-right fa-pull-right pt-1" />
        </button>
    </div>
</template>

<script>
    export default {
        name: 'mobile-login',
        data () {
            return {
                band_number: null
            }
        },
        methods: {
            submit () {
                window.location.href = `${this.band_number}/status`
            }
        }
    }
</script>