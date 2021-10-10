<template>
  <div id="storeApartment">
    <v-container>
      <v-row>
        <v-col cols="5" class="mx-auto">
          <v-card>
            <form @submit.prevent="store">
              <v-card-title primary-title>
                {{ currentResident.id ? 'Actualizar' : 'Registrar'}} Residente
              </v-card-title>
              <v-card-text>
                <v-autocomplete
                  v-model="apartment"
                  :items="apartments"
                  :item-text="'name'"
                  label="Apartamento"
                  return-object
                >
                </v-autocomplete>
                <v-radio-group v-model="gender" row>
                  <v-radio label="Masculino" value="M"></v-radio>
                  <v-radio label="Femenino" value="F"></v-radio>
                </v-radio-group>
                <v-text-field
                  name="dni"
                  label="Cédula"
                  placeholder="Cédula"
                  id="dni"
                  v-model="dni"
                ></v-text-field>
                <v-text-field
                  name="name"
                  label="Nombre"
                  placeholder="Nombre"
                  id="name"
                  v-model="name"
                ></v-text-field>
                <v-text-field
                  name="email"
                  label="Email"
                  id="email"
                  v-model="email"
                ></v-text-field>
                <v-text-field
                  name="birthdate"
                  label="Fecha de nacimiento"
                  id="birthdate"
                  v-model="birthdate"
                ></v-text-field>
              </v-card-text>
              <v-card-actions>
                <v-btn type="submit" :loading="saving" dark class="ml-auto">
                  Registrar
                </v-btn>
              </v-card-actions>
            </form>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script>
  export default {
    data(){return{
      currentResident: {
        gender: '',
        dni: '',
        name: '',
        birthdate: '',
        email: ''
      }
    }},
    methods: {
      store(){
      let data = {
        name: this.name,
        gender: this.gender,
        birthdate: this.birthdate,
        email: this.email,
        apartment_id: this.apartment.id,
        dni: this.dni,
      }
      console.log(data)
      axios.post('/residents', data).then(response=>{
        console.log(response)
      })
    },
    mounted(){
      if( this.resident?.id ){
        this.currentResident = {...this.resident}
      }
    }
  }
</script>

<style lang="scss" scoped>
</style>