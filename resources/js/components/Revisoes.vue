<template>
  <div class="container">
    <div class="text-center">
      <a type="button" href="/registra-revisao" class="btn btn-primary mb-3">
        <i class="fa-solid fa-plus"></i>
        <p>Adicionar nova revisão</p>
      </a>
      <h3>Revisões Cadastradas</h3>
    </div>
    <ul class="list-group">
      <li v-for="revisao in revisoes" :key="revisao.id" class="list-group-item">
        <h4 class="mb-3">Revisão ID: {{ revisao.id }}</h4>
        <p><strong>Data:</strong> {{ revisao.data }}</p>
        <p><strong>Tipo:</strong> {{ revisao.tipo }}</p>
        <p><strong>Descrição:</strong> {{ revisao.descricao }}</p>
        <p><strong>Carro ID:</strong> {{ revisao.id_carro }}</p>
        <p><strong>Proprietário:</strong> {{ revisao.carro.proprietario.nome }}</p>
        <p><strong>Marca do Carro:</strong> {{ revisao.carro.marca }}</p>
        <p><strong>Modelo do Carro:</strong> {{ revisao.carro.modelo }}</p>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: 'ListaRevisoes',
  data() {
    return {
      revisoes: []
    }
  },
  mounted() {
    this.fetchRevisoes();
  },
  methods: {
    fetchRevisoes() {
      axios.get('api/revisoes')
        .then(response => {
          this.revisoes = response.data;
        })
        .catch(error => {
          console.error(error);
        });
    }
  }
};
</script>
