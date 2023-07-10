<template>
  <div>
    <h2>Registrar Proprietário</h2>
    <form @submit.prevent="submitForm">
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" v-model="nome" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" v-model="email" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" v-model="telefone" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="idade">Idade:</label>
        <input type="text" id="idade" v-model="idade" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="sexo">Sexo:</label>
        <select id="sexo" v-model="sexo" class="form-control" required>
          <option value="Masculino">Masculino</option>
          <option value="Feminino">Feminino</option>
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
      nome: '',
      email: '',
      telefone: '',
      idade: '',
      sexo: 'Masculino'
    };
  },
  methods: {
    submitForm() {
      const formData = {
        nome: this.nome,
        email: this.email,
        telefone: this.telefone,
        idade: this.idade,
        sexo: this.sexo
      };
      
      // Envia os dados do proprietário para o servidor através de uma requisição POST
      axios.post('/proprietarios', formData)
        .then(response => {
          // Lógica de redirecionamento ou tratamento da resposta do servidor
          console.log(response.data);
        })
        .catch(error => {
          // Tratar erros, se necessário
          console.log(error);
        });
    }
  }
};
</script>
