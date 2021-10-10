<template>
  <div id="payments">
    <v-container fluid>
      <v-row>
        <v-col lg="6" class="mx-auto">
          <v-card class="mb-3">
            <v-card-title> Balances </v-card-title>
            <v-card-subtitle> Dom 03 de Octubre - Dolar Paralelo 5.14 VEF</v-card-subtitle>
            <v-row no-gutters>
              <v-col>
                <v-card-title>13.00 VEF</v-card-title>
                <v-card-subtitle>Saldo en Bolivares</v-card-subtitle>
              </v-col>
              <v-col>
                <v-card-title>02.00 USD</v-card-title>
                <v-card-subtitle>Saldo en Divisa</v-card-subtitle>
              </v-col>
              <v-col class="text-right">
                <v-card-title class="justify-end">04.50 USD</v-card-title>
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
          ></v-data-table>
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
</style>