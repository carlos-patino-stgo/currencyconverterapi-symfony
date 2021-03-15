import axios from "axios";

const state = () => ({
  conversions: [],
  from_currencies: [
    { name: 'USD' },
    { name: 'PLN' }
  ],
  to_currencies: [
    { name: 'MXN' },
    { name: 'ERN' },
    { name: 'DZD' },
    { name: 'CDF' },
    { name: 'MAD' },
    { name: 'SYP' },
  ],
})

const getters = {
  from_currency(state) {
    return state.from_currency;
  },
  from_currencies(state) {
    return state.from_currencies;
  },
  to_currencies(state) {
    return state.to_currencies;
  },
  conversions(state) {
    return state.conversions;
  }
}

const mutations = {
  SET_CONVERSIONS(state, payload) {
    state.conversions = payload;
  }
}

const actions = {
  async convertCurrency({commit}, form) {
    return await axios.post('/api/convertor', form);
  },
  async getConversions({commit}) {
    return await axios.get('/api/conversions');
  }
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}
