import Vue from "vue";
import { BootstrapVue } from "bootstrap-vue";
import ConvertorComponent from "./components/ConvertorComponent";
import ConversionsComponent from "./components/ConversionsComponent";
import store from "./store";

import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";

Vue.use(BootstrapVue);

new Vue({
  components: { ConvertorComponent, ConversionsComponent },
  store,
}).$mount("#app");

