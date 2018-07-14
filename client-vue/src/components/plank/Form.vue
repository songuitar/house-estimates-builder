<template>
  <form @submit.prevent="handleSubmit(item)">
    <div class="form-group">
      <label
        for="plank_size"
        class="form-control-label">size</label>
      <input
        id="plank_size"
        v-model="item.size"
        :class="['form-control', isInvalid('size') ? 'is-invalid' : '']"
        type="text"
        required="true"
        placeholder=""
        @input="handleUpdateField('size', $event.target.value)">
      <div
        v-if="isInvalid('size')"
        class="invalid-feedback">{{ violations.size }}</div>
    </div>
    <div class="form-group">
      <label
        for="plank_element"
        class="form-control-label">element</label>
      <input
        id="plank_element"
        v-model="item.element"
        :class="['form-control', isInvalid('element') ? 'is-invalid' : '']"
        type="text"
        placeholder=""
        @input="handleUpdateField('element', $event.target.value)">
      <div
        v-if="isInvalid('element')"
        class="invalid-feedback">{{ violations.element }}</div>
    </div>
    <div class="form-group">
      <label
        for="plank_woodType"
        class="form-control-label">woodType</label>
      <input
        id="plank_woodType"
        v-model="item.woodType"
        :class="['form-control', isInvalid('woodType') ? 'is-invalid' : '']"
        type="text"
        placeholder=""
        @input="handleUpdateField('woodType', $event.target.value)">
      <div
        v-if="isInvalid('woodType')"
        class="invalid-feedback">{{ violations.woodType }}</div>
    </div>
    <div class="form-group">
      <label
        for="plank_count"
        class="form-control-label">count</label>
      <input
        id="plank_count"
        v-model="item.count"
        :class="['form-control', isInvalid('count') ? 'is-invalid' : '']"
        type="number"
        placeholder=""
        @input="handleUpdateField('count', $event.target.value)">
      <div
        v-if="isInvalid('count')"
        class="invalid-feedback">{{ violations.count }}</div>
    </div>
    <div class="form-group">
      <label
        for="plank_description"
        class="form-control-label">description</label>
      <input
        id="plank_description"
        v-model="item.description"
        :class="['form-control', isInvalid('description') ? 'is-invalid' : '']"
        type="text"
        required="true"
        placeholder=""
        @input="handleUpdateField('description', $event.target.value)">
      <div
        v-if="isInvalid('description')"
        class="invalid-feedback">{{ violations.description }}</div>
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
