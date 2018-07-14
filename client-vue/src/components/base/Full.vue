<template>
    <b-container fluid class="app-container">
        <b-row class="app-container-row">
            <b-col md="2" class="sidebar">
                <sidebar :routes="routes"></sidebar>
            </b-col>
            <b-col md="10">
                <router-view></router-view>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
    import routes from '../../router/_routes'
    import Sidebar from "./Sidebar";

    export default {
        name: "Full",
        data() {
            return {
                routes: routes
            }
        },
        components: {Sidebar}
    }
</script>

<style scoped>

</style>