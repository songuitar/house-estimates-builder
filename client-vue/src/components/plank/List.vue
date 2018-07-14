<template>
    <base-list :fields="fields" resource="plank"></base-list>
</template>

<script>
    import BaseList from "../base/crud/BaseList";

    export default {
        components: {BaseList},
        data() {
            return {
                fields: {
                    id: {},
                    size: {
                        sortable:true
                    },
                    element: {},
                    woodType: {},
                    count: {},
                    description: {},
                    price: {},
                    itemPrice: {},
                    woodVolume: {},
                }
            }
        }
    }
</script>
