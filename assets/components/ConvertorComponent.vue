<template>
  <b-form @submit.prevent="convertCurrency()" class="w-100 p-4 shadow bg-light">
    <b-row>
      <AlertHandlerError :errMsg="errMsg" :show-error="showError"/>
      <b-col cols="12">
        <box-input>
          <input-currency :amount.sync="form.amount" :is-required="true"/>
          <slot name="drop-down">
            <dropdown-currency
              :currency.sync="form.from_currency"
              :currencies="from_currencies"
            />
          </slot>
        </box-input>
      </b-col>
      <b-col cols="12" class="p-2">
        <round-button :loading="loading"/>
      </b-col>
      <b-col cols="12">
        <box-input>
          <input-currency
            :read-only="true"
            :amount.sync="amount_convertor"
          />
          <slot name="drop-down">
            <dropdown-currency
              :currency.sync="form.to_currency"
              :currencies="to_currencies"
            />
          </slot>
        </box-input>
      </b-col>
    </b-row>
  </b-form>
</template>

<script>
import { mapGetters } from 'vuex';
import InputCurrency from "./convertor/InputCurrency";
import RoundButton from "./convertor/RoundButton";
import BoxInput from "./convertor/BoxInput";
import DropdownCurrency from "./convertor/DropdownCurrency";
import AlertHandlerError from './convertor/AlertHandlerError';

export default {
  name: "ConvertorComponent",
  components: {
    AlertHandlerError,
    RoundButton,
    BoxInput,
    InputCurrency,
    DropdownCurrency
  },
  data() {
    return {
      errMsg: [],
      loading: false,
      showError: false,
      amount_convertor: '',
      form: {
        amount: 0,
        from_currency: '',
        to_currency: ''
      }
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
      this.loading = true;
      this.showError = false;
      this.amount_convertor = '';
      this.errMsg = '';
      this.$store.dispatch('convertor/convertCurrency', this.form)
        .then(res => {
          this.loading = false;
          this.amount_convertor = res.data.data;
        }).catch(err => {
          this.showError = true;
          this.loading = false;
          if (err.response.data) {
            this.errMsg = err.response.data.errors.detail;
          }
        });
    }
  }
}
</script>
