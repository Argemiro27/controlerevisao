<template>
    <div>
        <h2>Registrar revisão</h2>
        <form @submit.prevent="submitForm">
            <div class="form-group">
                <label for="data">Data:</label>
                <input
                    type="date"
                    id="data"
                    class="form-control"
                    v-model="data"
                    required
                />
            </div>
            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <input
                    type="text"
                    id="tipo"
                    v-model="tipo"
                    class="form-control"
                    required
                />
            </div>
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input
                    type="text"
                    id="descricao"
                    v-model="descricao"
                    class="form-control"
                    required
                />
            </div>
            <div class="form-group">
                <label for="carro">Veículo:</label>
                <select
                    class="form-control"
                    id="id_carro"
                    v-model="id_carro"
                    required
                >
                    <option
                        v-for="carro in carros"
                        :key="carro.id"
                        :value="carro.id"
                    >
                        {{ carro.modelo }}
                    </option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Salvar</button>
        </form>
    </div>
</template>

<script>
export default {
  data() {
    return {
      data: "",
      tipo: "",
      descricao: "",
      id_carro: "",
      carros: [], // Alterado de 'veiculos' para 'carros'
    };
  },
  
  methods: {
    submitForm() {
      const formData = {
        data: this.data,
        tipo: this.tipo,
        descricao: this.descricao,
        id_carro: this.id_carro,
      };

      axios
        .post("/revisoes", formData)
        .then((response) => {
          console.log(response.data);
        })
        .catch((error) => {
          console.log(error);
          console.log(formData)
        });
    },
  },

  mounted() {
    axios
      .get("/api/veiculos")
      .then((response) => {
        this.carros = response.data; // Alterado de 'veiculos' para 'carros'
      })
      .catch((error) => {
        console.log(error);
      });
  },


};
</script>

