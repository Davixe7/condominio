<template>
  <div id="payments">
    <v-container fluid>
      <v-row>
        <v-col lg="6" class="mx-auto">
          <v-card class="mb-3">
            <v-card-title> Balances </v-card-title>
            <v-card-subtitle>
              <span class="date">{{ formatDate }}</span> - Dolar Paralelo
              {{ usdPrice }} VEF</v-card-subtitle
            >
            <v-row no-gutters>
              <v-col>
                <v-card-title>{{ totalVEF }} VEF</v-card-title>
                <v-card-subtitle>Saldo en Bolivares</v-card-subtitle>
              </v-col>
              <v-col>
                <v-card-title>{{ totalUSD }} USD</v-card-title>
                <v-card-subtitle>Saldo en Divisa</v-card-subtitle>
              </v-col>
              <v-col class="text-right">
                <v-card-title class="justify-end">{{ total }} USD</v-card-title>
                <v-card-subtitle>Total</v-card-subtitle>
              </v-col>
            </v-row>
          </v-card>

          <v-card class="mb-3">
            <v-card-title> Octubre 2021 </v-card-title>
            <v-data-table
              v-if="payments && payments.length"
              :headers="headers"
              :items="payments"
              :items-per-page="100"
              :multi-sort="true"
            >
              <template v-slot:item.date="{ item }">
                {{ item.formatDate }}
              </template>
            </v-data-table>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script>
export default {
  name: "Payments",
  props: {
    payments: {
      type: Array,
      default() {
        return [];
      },
    },
    usdPrice: {
      type: Number,
      default: 0,
    },
    formatDate: {
      type: String,
      default: "Cargando...",
    },
  },
  filters:{
    monthName(date){
      console.log(date)
      return new Date(date).toLocaleString('es-es',{month:'short'})
    }
  },
  computed: {
    totalVEF() {
      if (!this.payments || !this.payments.length) {
        return 0;
      }
      let amount = this.payments
        .filter((payment) => payment.method != "dolares")
        .reduce((sum, payment) => sum + Number(payment.amount), 0);

      return Math.round(Number(amount) * 100) / 100;
    },
    totalUSD() {
      if (!this.payments || !this.payments.length) {
        return 0;
      }
      return this.payments
        .filter((payment) => payment.method == "dolares")
        .reduce((sum, payment) => sum + Number(payment.amount), 0);
    },
    total() {
      let total = this.totalVEF / this.usdPrice + this.totalUSD;
      return Math.round(total * 100) / 100;
    },
  },
  data() {
    return {
      headers: [
        {
          text: "Apartamento",
          align: "start",
          sortable: true,
          value: "apartment.name",
        },
        {
          text: "Método",
          align: "start",
          sortable: true,
          value: "method",
        },
        {
          text: "Monto",
          align: "center",
          sortable: true,
          value: "amount",
        },
        {
          text: "Pagado el",
          align: "center",
          sortable: true,
          value: "paid_at",
        },
        {
          text: "Mes",
          align: "end",
          sortable: true,
          value: "date",
        },
        {
          text: "REF",
          align: "end",
          sortable: false,
          value: "reference",
        },
      ],
    };
  },
};
</script>

<style lang="scss" scoped>
.date {
  text-transform: capitalize;
}
</style>