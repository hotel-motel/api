<template>
    <div class="row">
        <div class="col-3 grid gap-2">
            <router-link class="btn btn-dark" to="/personal_info">
                personal info
            </router-link>
            <router-link class="btn btn-dark" to="/trips">
                trips
            </router-link>
            <router-link class="btn btn-dark" to="/change_password">
                change password
            </router-link>
        </div>
        <div class="col-9">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import VueRouter from 'vue-router'
import trips from "../pages/dashbord/trips"
import changePassword from '../pages/dashbord/change_password'
import personalInfo from '../pages/dashbord/personal_info'

const routes = [
    { path: '/personal_info', component: personalInfo },
    { path: '/trips', component: trips },
    { path: '/change_password', component: changePassword }
]
const router=new VueRouter({routes})
export default {
    router
}
</script>
