<template>
    <nav class="navbar navbar-expand-md bg-custom">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fa-solid fa-car"></i></a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/home">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/proprietarios">Proprietários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/veiculos">Veículos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/revisoes">Revisões</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name: "Nav",
    props: ["selectedPage"],
};
</script>

<style scoped>
.bg-custom {
    background-color: #74ad09;
}
</style>
