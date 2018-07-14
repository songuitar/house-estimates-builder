<template>
  <div>
    <h1>Show {{ item && item['@id'] }}</h1>

    <div
      v-if="isLoading"
      class="alert alert-info"
      role="status">Loading...</div>
    <div
      v-if="error"
      class="alert alert-danger"
      role="alert">
      <span
        class="fa fa-exclamation-triangle"
        aria-hidden="true" /> {{ error }}
    </div>
    <div
      v-if="deleteError"
      class="alert alert-danger"
      role="alert">
      <span
        class="fa fa-exclamation-triangle"
        aria-hidden="true" /> {{ deleteError }}
    </div>
    <div
      v-if="item"
      class="table-responsive">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Field</th>
            <th>Value</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>size</td>
            <td>{{ item['size'] }}</td>
          </tr>
          <tr>
            <td>element</td>
            <td>{{ item['element'] }}</td>
          </tr>
          <tr>
            <td>woodType</td>
            <td>{{ item['woodType'] }}</td>
          </tr>
          <tr>
            <td>count</td>
            <td>{{ item['count'] }}</td>
          </tr>
          <tr>
            <td>description</td>
            <td>{{ item['description'] }}</td>
          </tr>
          <tr>
            <td>price</td>
            <td>{{ item['price'] }}</td>
          </tr>
          <tr>
            <td>itemPrice</td>
            <td>{{ item['itemPrice'] }}</td>
          </tr>
          <tr>
            <td>woodVolume</td>
            <td>{{ item['woodVolume'] }}</td>
          </tr>
          <tr>
            <td>sizeName</td>
            <td>{{ item['sizeName'] }}</td>
          </tr>
          <tr>
            <td>elementName</td>
            <td>{{ item['elementName'] }}</td>
          </tr>
          <tr>
            <td>woodTypeName</td>
            <td>{{ item['woodTypeName'] }}</td>
          </tr>
        </tbody>
      </table>
    </div>

    <router-link
      v-if="item"
      :to="{ name: 'PlankList' }"
      class="btn btn-default">Back to list</router-link>
    <button
      class="btn btn-danger"
      @click="deleteItem(item)">Delete</button>
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
  computed: mapGetters({
    deleteError: 'plank/del/error',
    error: 'plank/show/error',
    isLoading: 'plank/show/isLoading',
    item: 'plank/show/retrieved'
  }),

  beforeDestroy () {
    this.reset()
  },

  created () {
    this.retrieve(decodeURIComponent(this.$route.params.id))
  },

  methods: {
    ...mapActions({
      del: 'plank/del/del',
      reset: 'plank/show/reset',
      retrieve: 'plank/show/retrieve'
    }),

    deleteItem (item) {
      if (window.confirm('Are you sure you want to delete this item?')) {
        this.del(item).then(() => this.$router.push({ name: 'PlankList' }))
      }
    }
  }
}
</script>
