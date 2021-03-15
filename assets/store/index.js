import Vue from 'vue';
import Vuex from 'vuex';
import convertor from "./modules/convertor";

Vue.use(Vuex);

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
  modules: {
    convertor
  },
  strict: debug
});