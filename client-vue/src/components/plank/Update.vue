<template>
    <div>
        <h1>Edit {{ item && item['@id'] }}</h1>

        <div
                v-if="created"
                class="alert alert-success"
                role="status">{{ created['@id'] }} created.
        </div>
        <div
                v-if="updated"
                class="alert alert-success"
                role="status">{{ updated['@id'] }} updated.
        </div>
        <div
                v-if="isLoading || deleteLoading"
                class="alert alert-info"
                role="status">Loading...
        </div>
        <div
                v-if="error"
                class="alert alert-danger"
                role="alert">
      <span
              class="fa fa-exclamation-triangle"
              aria-hidden="true"/> {{ error }}
        </div>
        <div
                v-if="deleteError"
                class="alert alert-danger"
                role="alert">
      <span
              class="fa fa-exclamation-triangle"
              aria-hidden="true"/> {{ deleteError }}
        </div>

        <BaseForm
                v-if="item"
                :handle-submit="onSendForm"
                :handle-update-field="updateField"
                :values="item"
                :fields="fields"
                :errors="violations"
                :initial-values="retrieved"/>


        <router-link
                v-if="item"
                :to="{ name: 'PlankList' }"
                class="btn btn-default">Back to list
        </router-link>
        <button
                class="btn btn-danger"
                @click="del">Delete
        </button>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex'
    import PlankForm from './Form.vue'
    import BaseForm from "../base/crud/BaseForm";

    export default {
        components: {
            BaseForm,
            PlankForm
        },

        data() {
            return {
                item: {},
                fields: [
                    {name: 'size'},
                    {name: 'element'},
                    {name: 'woodType'},
                    {
                        name: 'count',
                        type: 'number'
                    },
                    {name: 'description'},
                ]
            }
        },

        computed: {
            ...mapGetters({
                isLoading: 'plank/update/isLoading',
                error: 'plank/update/error',
                deleteError: 'plank/del/error',
                deleteLoading: 'plank/del/isLoading',
                created: 'plank/create/created',
                deleted: 'plank/del/deleted',
                retrieved: 'plank/update/retrieved',
                updated: 'plank/update/updated',
                violations: 'plank/update/violations'
            })
        },

        watch: {
            // eslint-disable-next-line object-shorthand,func-names
            deleted: function (deleted) {
                if (!deleted) {
                    return
                }

                this.$router.push({name: 'PlankList'})
            }
        },

        beforeDestroy() {
            this.reset()
        },

        created() {
            this.retrieve(decodeURIComponent(this.$route.params.id))
        },

        methods: {
            ...mapActions({
                createReset: 'plank/create/reset',
                deleteItem: 'plank/del/del',
                delReset: 'plank/del/reset',
                retrieve: 'plank/update/retrieve',
                updateReset: 'plank/update/reset',
                update: 'plank/update/update',
                updateRetrieved: 'plank/update/updateRetrieved'
            }),

            del() {
                if (window.confirm('Are you sure you want to delete this plank ?')) {
                    this.deleteItem(this.retrieved)
                }
            },

            reset() {
                this.updateReset()
                this.delReset()
                this.createReset()
            },

            onSendForm() {
                this.update()
            },

            updateField(field, value) {
                this.updateRetrieved({[field]: value})
            }
        }
    }
</script>
