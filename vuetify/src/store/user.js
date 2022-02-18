export default {
    state: {
      user_id: '',
      user_name: '',
      user_email: 'hello@yandex.ru',
      user_score: ''
    },
    mutations: {
      SET_USER_ID: (state, payload) => {
        state.user_id = payload;
      },
      SET_USER_NAME: (state, payload) => {
        state.user_name = payload;
      },      
      SET_USER_EMAIL: (state, payload) => {
        state.user_email = payload;
      },
      SET_USER_SCORE: (state, payload) => {
        state.user_score = payload;
      },
    },
    actions: {},
    getters: {
        USER_ID (state) {
          return state.user_id
        },
        USER_NAME (state) {
          return state.user_name
        },
        USER_EMAIL (state) {
          return state.user_email
        },
        USER_SCORE (state) {
          return state.user_score
        },
    }
  }