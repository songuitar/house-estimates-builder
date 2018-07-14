<template>
    <div>
        <h1>{{ getResourceUCFirst() }} List</h1>

        <div
                v-if="isLoading"
                class="alert alert-info">Loading...
        </div>
        <div
                v-if="deletedItem"
                class="alert alert-success">{{ deletedItem['@id'] }} deleted.
        </div>
        <div
                v-if="error"
                class="alert alert-danger">{{ error }}
        </div>

        <span v-if="view">
      <button
              :disabled="!view['hydra:previous']"
              type="button"
              class="btn btn-basic btn-sm"
              @click="getPage(view['hydra:first'])">First</button>
      &nbsp;
      <button
              :disabled="!view['hydra:previous']"
              type="button"
              class="btn btn-basic btn-sm"
              @click="getPage(view['hydra:previous'])">Previous</button>
      &nbsp;
      <button
              :disabled="!view['hydra:next']"
              type="button"
              class="btn btn-basic btn-sm"
              @click="getPage(view['hydra:next'])">Next</button>
      &nbsp;
      <button
              :disabled="view['hydra:last']"
              type="button"
              class="btn btn-basic btn-sm"
              @click="getPage(view['hydra:last'])">Last</button>
      &nbsp;
    </span>

        <b-table :items="items" :fields="getFieldsList()">

            <template slot="actions" slot-scope="data">
                <router-link :to="{name: getUpdateRouteName(), params: { id: data.item['@id'] }}"
                             class="btn btn-xs btn-info">
                    <i class="fa fa-edit"></i>
                </router-link>
            </template>
        </b-table>

        <router-link
                :to="{ name: getCreateRouteName() }"
                class="btn btn-primary">Create
        </router-link>
    </div>
</template>

<script>
    export default {

        props: {
            resource: {
                type: String,
                required: true
            },
            fields: {
                type: Object,
                required: true
            },
            fieldDefaults: {
                type: Object,
                default() {
                    return {
                        sortable: true
                    }
                }
            }
        },

        computed:
            {
                deletedItem() {
                    return this.$store.getters[this.resource + '/del/deleted']
                },
                error() {
                    return this.$store.getters[this.resource + '/list/error']
                },
                items() {
                    return this.$store.getters[this.resource + '/list/items']
                },
                isLoading() {
                    return this.$store.getters[this.resource + '/list/isLoading']
                },
                view() {
                    return this.$store.getters[this.resource + '/list/view']
                }
            },

        created() {
            this.getPage()
        },

        methods: {
            getResourceUCFirst() {
                return this.resource.charAt(0).toUpperCase() + this.resource.slice(1)
            },
            getUpdateRouteName() {
                return this.getResourceUCFirst() + 'Update';
            },
            getCreateRouteName() {
                return this.getResourceUCFirst() + 'Create';
            },
            getFieldsList() {
                let fieldArr = []
                Object.keys(this.fields).forEach(key => {
                    fieldArr.push({
                        key: key,
                        ...this.fieldDefaults,
                        ...this.fields[key]
                    })
                })
                return [
                    ...fieldArr,
                    'actions'
                ]
            },
            getPage(options) {
                return this.$store.dispatch(this.resource + '/list/default', options)
            }
        }
    }
</script>
