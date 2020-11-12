import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
      info : {
        title: 'ناجز',
        logo: '/assets/images/logo.svg',
        url: document.head.querySelector('meta[name="url"]').content,
      },
      user : {},
      errors: [],
    },
    mutations: {
      updateUser (state, data) {
        state.user = data
      },
      setErrors (state, data) {
        state.errors = data
      },
      clearErrorKey (state, data) {
        state.errors[data] = null
      },
    }
  })
 