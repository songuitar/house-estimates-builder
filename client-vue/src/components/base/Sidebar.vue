<template>
    <b-list-group>
        <b-list-group-item
                v-for="route in routes"
                v-if="showLinkToRoute(route)"
                :active="isActiveButton(route)"
        >
            <b-link :to="{name:route.name}">
                {{ route.meta.label }}
            </b-link>
        </b-list-group-item>

    </b-list-group>
</template>

<script>
    export default {
        name: "Sidebar",
        props: {
            routes: {
                type: Array,
                required: true
            }
        },
        methods: {
            showLinkToRoute(route) {
                return route.meta && route.meta.sidebar
            },
            isActiveButton(route) {
                return this.$route.name === route.name
            }
        }
    }
</script>

<style scoped>

</style>