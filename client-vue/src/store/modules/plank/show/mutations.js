import * as types from './mutation_types'

export default {
  [types.PLANK_SHOW_RESET] (state) {
    Object.assign(state, {
      error: '',
      isLoading: false,
      retrieved: null
    })
  },

  [types.PLANK_SHOW_SET_ERROR] (state, error) {
    Object.assign(state, { error })
  },

  [types.PLANK_SHOW_SET_RETRIEVED] (state, retrieved) {
    Object.assign(state, { retrieved })
  },

  [types.PLANK_SHOW_TOGGLE_LOADING] (state) {
    Object.assign(state, { isLoading: !state.isLoading })
  }

}
