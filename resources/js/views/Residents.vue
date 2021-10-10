<template>
  <div id="residents">
    <v-container>
      <v-data-table
        v-if="residents && residents.length"
        :headers="headers"
        :items="residents"
        :items-per-page="550"
        class="elevation-1"
      ></v-data-table>
    </v-container>
  </div>
</template>

<script>
export default {
  name: "Residents",
  data() {
    return {
      apartments: [],
      apartment: {},
      name: "",
      dni: "",
      email: "",
      gender: "",
      birthdate: "",
      saving: false,
      headers: [
        {
          text: "Apartamento",
          align: "start",
          sortable: true,
          value: "apartment.name",
        },
        {
          text: "Nombre",
          align: "start",
          sortable: true,
          value: "name",
        },
        {
          text: "Cedula",
          align: "center",
          sortable: true,
          value: "dni",
        },
        {
          text: "Fecha de nacimiento",
          align: "center",
          sortable: true,
          value: "birthdate",
        },
        {
          text: "Email",
          align: "end",
          sortable: true,
          value: "email",
        },
      ],
    };
  },
  mounted() {
    axios
      .get("/apartments")
      .then((response) => {
        console.log( response )
        this.apartments = [...response.data].map(apt => ({name: apt.name, id: apt.id}))
      });
  },
};
</script>

<style lang="scss" scoped>
</style>