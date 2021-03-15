<template>
  <b-card
    title="Historial de conversiones"
    footer-tag="footer"
  >
    <b-card-text>
      <b-table
        striped
        hover
        :fields="fields"
        :items="conversions"
        id="conversions"
        :per-page="perPage"
        :current-page="currentPage"
      >
      </b-table>
    </b-card-text>
    <template #footer>
      <b-pagination
        v-model="currentPage"
        :total-rows="conversions.length"
        :per-page="perPage"
        aria-controls="conversions"
      ></b-pagination>
    </template>
  </b-card>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
  name: 'ConvertorHistory',
  props: {
    perPage: {
      type: Number,
      default: 10
    }
  },
  data() {
    return {
      loading: false,
      currentPage: 1,
      fields: [
        { key: 'id', label: '#'},
        { key: 'amount', label: 'Cantidad'},
        { key: 'fromCurrency', label: 'De la moneda'},
        { key: 'toCurrency', label: 'a la moneda'},
        { key: 'currentValueOfTheCurrency', label: 'Valor de la moneda'},
        { key: 'amountConvertor', label: 'Resultado de conversión'},
        { key: 'createdAt', label: 'Fecha de creación'}
      ]

    }
  },
  mounted() {
    this.fetchData();
  },
  computed: {
    ...mapGetters('convertor', ["conversions"])
  },
  methods: {
    fetchData() {
      this.loading = true;
      this.$store.dispatch('convertor/getConversions')
        .then(res => {
          this.loading = false;
          this.$store.commit('convertor/SET_CONVERSIONS', res.data.data);
        }).catch(err => {
          console.log(err)
          this.loading = false;
      });
    }
  }
}
</script>
