<template>
    <div>
        <div class="text-center">
            <a
                type="button"
                href="/registra-proprietario"
                class="btn btn-primary mb-3"
                ><i class="fa-solid fa-plus"></i>
                <p>Adicionar novo proprietário</p></a
            >
            <h3>Proprietários cadastrados</h3>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Idade</th>
                    <th>Sexo</th>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="proprietario in proprietarios"
                    :key="proprietario.id"
                >
                    <td>{{ proprietario.id }}</td>
                    <td>{{ proprietario.nome }}</td>
                    <td>{{ proprietario.email }}</td>
                    <td>{{ proprietario.telefone }}</td>
                    <td>{{ proprietario.idade }}</td>
                    <td>{{ proprietario.sexo }}</td>
                    <td>
                        <button
                            class="btn btn-danger"
                            @click="excluirProprietario(proprietario.id)"
                        >
                            <i class="fa-solid fa-trash"></i>
                            Excluir
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            proprietarios: [],
        };
    },
    mounted() {
        axios
            .get("/api/proprietarios") 
            .then((response) => {
                this.proprietarios = response.data;
            })
            .catch((error) => {
                console.log(error);
            });
    },
    methods: {
        excluirProprietario(id) {
            axios
                .delete(`/api/proprietarios/${id}`)
                .then((response) => {
                    const index = this.proprietarios.findIndex((proprietario) => proprietario.id === id);
                    if (index !== -1) {
                        this.proprietarios.splice(index, 1);
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>
