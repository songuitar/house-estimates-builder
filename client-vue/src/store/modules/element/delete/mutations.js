import * as types from './mutation_types'

export default {
  [types.ELEMENT_DELETE_SET_DELETED] (state, deleted) {
    Object.assign(state, { deleted })
  },

  [types.ELEMENT_DELETE_SET_ERROR] (state, error) {
    Object.assign(state, { error })
  },

  [types.ELEMENT_DELETE_TOGGLE_LOADING] (state) {
    Object.assign(state, { isLoading: !state.isLoading })
  },

  [types.ELEMENT_DELETE_RESET] (state) {
    Object.assign(state, {
      deleted: null,
      error: '',
      isLoading: false
    })
  }
}
