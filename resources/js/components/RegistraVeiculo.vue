<template>
    <div>
        <h2>Cadastro de Veículo</h2>
        <form @submit.prevent="submitForm" class="needs-validation">
            <div class="form-group">
                <label for="marca">Marca:</label>
                <input
                    type="text"
                    id="marca"
                    v-model="marca"
                    class="form-control"
                    required
                />
            </div>
            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input
                    type="text"
                    id="modelo"
                    v-model="modelo"
                    class="form-control"
                    required
                />
            </div>
            <div class="form-group">
                <label for="placa">Placa:</label>
                <input
                    type="text"
                    id="placa"
                    v-model="placa"
                    class="form-control"
                    required
                />
            </div>
            <div class="form-group">
                <label for="proprietario">Proprietário:</label>
                <select
                    class="form-control"
                    id="id_proprietario"
                    v-model="id_proprietario"
                    required
                >
                    <option
                        v-for="proprietario in proprietarios"
                        :key="proprietario.id"
                        :value="proprietario.id"
                    >
                        {{ proprietario.nome }}
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
            proprietarios: [],
            marca: "",
            modelo: "",
            placa: "",
            id_proprietario: "",
        };
    },

    mounted() {
        // Buscar os dados dos proprietários do servidor
        axios
            .get("/api/proprietarios") // Certifique-se de ajustar a rota corretamente
            .then((response) => {
                // Armazenar os dados dos proprietários na variável proprietarios
                this.proprietarios = response.data;
            })
            .catch((error) => {
                // Tratar erros, se necessário
                console.log(error);
            });
    },

    methods: {
        submitForm() {
            const formData = {
                marca: this.marca,
                modelo: this.modelo,
                placa: this.placa,
                id_proprietario: this.id_proprietario,
            };

            // Envia os dados do veículo para o servidor através de uma requisição POST
            axios
                .post("/veiculos", formData)
                .then((response) => {
                    // Lógica de redirecionamento ou tratamento da resposta do servidor
                    console.log(response.data);
                })
                .catch((error) => {
                    // Tratar erros, se necessário
                    console.log(error);
                });
        },
    },
};
</script>
