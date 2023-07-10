<template>
    <div class="container">
        <div class="text-center">
            <a type="button" href="/registra-veiculo" class="btn btn-primary mb-3"
                ><i class="fa-solid fa-plus"></i>
                <p>Adicionar novo veículo</p></a
            >
            <h3>Veículos Cadastrados</h3>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Placa</th>
                    <th>Proprietário</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="carro in carros" :key="carro.id">
                    <td>{{ carro.marca }}</td>
                    <td>{{ carro.modelo }}</td>
                    <td>{{ carro.placa }}</td>
                    <td>{{ getNomeProprietario(carro.id_proprietario) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "Veiculos",
    data() {
        return {
            carros: [],
            proprietarios: [],
        };
    },
    mounted() {
        this.getCarros();
        this.getProprietarios();
    },
    methods: {
        getCarros() {
            axios
                .get("/api/veiculos")
                .then((response) => {
                    this.carros = response.data;
                })
                .catch((error) => {
                    console.error(error);
                });
        },
        getProprietarios() {
            axios
                .get("/api/proprietarios")
                .then((response) => {
                    this.proprietarios = response.data;
                })
                .catch((error) => {
                    console.error(error);
                });
        },
        getNomeProprietario(id_proprietario) {
            const proprietario = this.proprietarios.find(
                (proprietario) => proprietario.id === id_proprietario
            );
            return proprietario ? proprietario.nome : "";
        },
    },
};
</script>
