<template>
    <form @submit.prevent="handleSubmit(item)">

        <div class="form-group" v-for="field in getFields()">
            <label class="form-control-label">{{ field.name }}</label>

            <input
                    v-model="item[field.name]"
                    :class="['form-control', isInvalid(field.name) ? 'is-invalid' : '']"
                    :type="field.type"
                    :required="field.isRequired"
                    :placeholder="field.placeholder"
                      @input="handleUpdateField(field.name, $event.target.value)"></input>


            <div
                    v-if="isInvalid(field.name)"
                    class="invalid-feedback">{{ violations[field.name] }}</div>

        </div>

        <button
                type="submit"
                class="btn btn-success">Submit</button>
    </form>
</template>

<script>
    export default {
        props: {
            fields: {
                type: Array,
                required: true
            },
            handleSubmit: {
                type: Function,
                required: true
            },

            handleUpdateField: {
                type: Function,
                required: true
            },

            values: {
                type: Object,
                required: true
            },

            errors: {
                type: Object,
                default: () => {}
            },

            initialValues: {
                type: Object,
                default: () => {}
            }
        },

        computed: {
            // eslint-disable-next-line
            item () {
                return this.initialValues || this.values
            },

            violations () {
                return this.errors || {}
            }
        },

        methods: {
            getFields() {
                let fields = []
                this.fields.forEach(field => {
                    fields.push({
                        type: 'text',
                        placeholder: '',
                        isRequired: true,
                        ...field
                    })
                })
                return fields
            },
            isInvalid (key) {
                return Object.keys(this.violations).length > 0 && this.violations[key]
            }
        }
    }
</script>
