<template>
  <form @submit.prevent="handleSubmit(item)">
    <div class="form-group">
      <label
        for="planksize_width"
        class="form-control-label">width</label>
      <input
        id="planksize_width"
        v-model="item.width"
        :class="['form-control', isInvalid('width') ? 'is-invalid' : '']"
        type="number"
        required="true"
        placeholder=""
        @input="handleUpdateField('width', $event.target.value)">
      <div
        v-if="isInvalid('width')"
        class="invalid-feedback">{{ violations.width }}</div>
    </div>
    <div class="form-group">
      <label
        for="planksize_thickness"
        class="form-control-label">thickness</label>
      <input
        id="planksize_thickness"
        v-model="item.thickness"
        :class="['form-control', isInvalid('thickness') ? 'is-invalid' : '']"
        type="number"
        required="true"
        placeholder=""
        @input="handleUpdateField('thickness', $event.target.value)">
      <div
        v-if="isInvalid('thickness')"
        class="invalid-feedback">{{ violations.thickness }}</div>
    </div>
    <div class="form-group">
      <label
        for="planksize_length"
        class="form-control-label">length</label>
      <input
        id="planksize_length"
        v-model="item.length"
        :class="['form-control', isInvalid('length') ? 'is-invalid' : '']"
        type="number"
        required="true"
        placeholder=""
        @input="handleUpdateField('length', $event.target.value)">
      <div
        v-if="isInvalid('length')"
        class="invalid-feedback">{{ violations.length }}</div>
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
