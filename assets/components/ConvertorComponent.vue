<template>
  <b-form @submit.prevent="convertCurrency()" class="w-100 p-4 shadow bg-light">
    <b-row>
      <AlertHandlerError :errMsg="errMsg" :show-error="showError"/>
      <b-col cols="12">
        <box-input>
          <input-currency :amount.sync="form.amount" :is-required="true" min="1"/>
          <slot name="drop-down">
            <div class="d-flex justify-content-between align-items-center">
              <dropdown-currency
                :currency.sync="form.from_currency"
                :currencies="from_currencies"
              />
              <span class="mr-2 ml-2">a</span>
              <dropdown-currency
                :currency.sync="form.to_currency"
                :currencies="to_currencies"
              />
              <b-button type="submit" class="ml-2" variant="primary">Convertir</b-button>
            </div>
          </slot>
        </box-input>
      </b-col>
      <b-col class="mt-4">
        <b-list-group v-for="(conversion, key) in conversions" v-bind:key="key">
          <b-list-group-item>
            {{ conversion.amount }} {{ conversion.from_currency }} = {{ conversion.result }} {{ conversion.to_currency }}
          </b-list-group-item>
        </b-list-group>
      </b-col>
    </b-row>
  </b-form>
</template>

<script>
import { mapGetters } from 'vuex';
import InputCurrency from "./convertor/InputCurrency";
import BoxInput from "./convertor/BoxInput";
import DropdownCurrency from "./convertor/DropdownCurrency";
import AlertHandlerError from './convertor/AlertHandlerError';

export default {
  name: "ConvertorComponent",
  components: {
    AlertHandlerError,
    BoxInput,
    InputCurrency,
    DropdownCurrency
  },
  data() {
    return {
      errMsg: [],
      showError: false,
      amount_convertor: '',
      form: {
        amount: 1,
        from_currency: '',
        to_currency: ''
      },
      conversions: []
    }
  },
  computed: {
    ...mapGetters('convertor', [
      'from_currencies',
      'to_currencies'
    ])
  },
  methods: {
    convertCurrency() {
      this.showError = false;
      this.amount_convertor = '';
      this.errMsg = '';
      this.$store.dispatch('convertor/convertCurrency', this.form)
        .then(res => {
          this.conversions.push({
            result: res.data.data,
            ...this.form
          })
        }).catch(err => {
          this.showError = true;
          if (err.response.data) {
            this.errMsg = err.response.data.errors.detail;
          }
        });
    }
  }
}
</script>
