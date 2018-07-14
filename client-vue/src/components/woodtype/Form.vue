<template>
  <form @submit.prevent="handleSubmit(item)">
    <div class="form-group">
      <label
        for="woodtype_name"
        class="form-control-label">name</label>
      <input
        id="woodtype_name"
        v-model="item.name"
        :class="['form-control', isInvalid('name') ? 'is-invalid' : '']"
        type="text"
        placeholder=""
        @input="handleUpdateField('name', $event.target.value)">
      <div
        v-if="isInvalid('name')"
        class="invalid-feedback">{{ violations.name }}</div>
    </div>
    <div class="form-group">
      <label
        for="woodtype_price"
        class="form-control-label">price</label>
      <input
        id="woodtype_price"
        v-model="item.price"
        :class="['form-control', isInvalid('price') ? 'is-invalid' : '']"
        type="number"
        step="0.1"
        required="true"
        placeholder=""
        @input="handleUpdateField('price', $event.target.value)">
      <div
        v-if="isInvalid('price')"
        class="invalid-feedback">{{ violations.price }}</div>
    </div>

    <button
      type="submit"
      class="btn btn-success">Submit</button>
  </form>
</template>

<script>
export default {
  props: {
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
    isInvalid (key) {
      return Object.keys(this.violations).length > 0 && this.violations[key]
    }
  }
}
</script>
