<template>
  <div id="payments">
    <v-container fluid>
      <v-row>
        <v-col cols="12">
          <v-card>
            <v-row>
              <v-col lg="4" class="mx-auto">
                <v-card-text>
                  <v-autocomplete
                    v-model="apartment"
                    :items="apartments"
                    :item-text="'name'"
                    label="Apartamento"
                    return-object
                  >
                  </v-autocomplete>

                  <v-chip-group
                    v-model="method"
                    active-class="deep-purple--text text--accent-4"
                    mandatoryd
                  >
                    <v-chip
                      v-for="method in methods"
                      :key="method.name"
                      :value="method.value"
                    >
                      {{ method.name }}
                    </v-chip>
                  </v-chip-group>

                  <v-text-field
                    label="Monto"
                    placeholder="Monto"
                    id="amount"
                    v-model="amount"
                  ></v-text-field>

                  <v-row>
                    <v-col cols="6">
                      <v-dialog
                        ref="dialog"
                        v-model="modal"
                        :return-value.sync="date"
                        persistent
                        width="290px"
                      >
                        <template v-slot:activator="{ on, attrs }">
                          <v-text-field
                            v-model="paidAt"
                            label="Pagado el"
                            readonly
                            v-bind="attrs"
                            v-on="on"
                          ></v-text-field>
                        </template>
                        <v-date-picker v-model="paidAt">
                          <v-spacer></v-spacer>
                          <v-btn text color="primary" @click="modal = false">
                            Cancel
                          </v-btn>
                          <v-btn
                            text
                            color="primary"
                            @click="$refs.dialog.save(paidAt)"
                          >
                            OK
                          </v-btn>
                        </v-date-picker>
                      </v-dialog>
                    </v-col>
                    <v-col cols="6">
                      <v-dialog
                        ref="dialog_2"
                        v-model="modal_2"
                        :return-value.sync="date"
                        persistent
                        width="290px"
                      >
                        <template v-slot:activator="{ on, attrs }">
                          <v-text-field
                            v-model="date"
                            label="Mes a cancelar"
                            readonly
                            v-bind="attrs"
                            v-on="on"
                          ></v-text-field>
                        </template>
                        <v-date-picker v-model="date" type="month" scrollable>
                          <v-spacer></v-spacer>
                          <v-btn text color="primary" @click="modal_2 = false">
                            Cancel
                          </v-btn>
                          <v-btn
                            text
                            color="primary"
                            @click="$refs.dialog_2.save(date)"
                          >
                            OK
                          </v-btn>
                        </v-date-picker>
                      </v-dialog>
                    </v-col>
                  </v-row>

                  <v-text-field
                    v-if="method != 'dolares' && method != 'efectivo'"
                    label="Referencia"
                    placeholder="Referencia"
                    id="reference"
                    v-model="reference"
                  ></v-text-field>

                  <v-card-actions>
                    <v-btn
                      @click="storePayment"
                      type="submit"
                      :loading="saving"
                      dark
                      class="ml-auto"
                    >
                      Registrar
                    </v-btn>
                  </v-card-actions>
                </v-card-text>
              </v-col>
            </v-row>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script>
export default {
  name: "payments",
  props: {
    apartments: {
      type: Array,
      default() {
        return [];
      },
    },
  },
  data() {
    return {
      modal: false,
      modal_2: false,
      saving: false,
      apartment: null,
      reference: null,
      method: "transferencia",
      methods: [
        { name: "Transferencia", value: "transferencia" },
        { name: "PagoMóvil", value: "pagomovil" },
        { name: "Efectivo", value: "efectivo" },
        { name: "Dólares", value: "dolares" },
      ],
      amount: 0,
      date: "2021-10-02",
      paidAt: null,
    };
  },
  methods: {
    storePayment() {
      let data = {
        apartment_id: this.apartment.id,
        method: this.method,
        amount: this.amount,
        date: this.date + "-01",
        paid_at: this.paidAt,
        reference: this.reference,
      };
      this.saving = true;
      axios.post("/payments", data).then((response) => (this.saving = false));
    },
  },
};
</script>