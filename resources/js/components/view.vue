<template>
    <div class="container-fluid">
        <h2 class="mt-4 text-center">Discussion</h2>
        <h2 class="mt-4 text-center">{{ url_data }}</h2>
    </div>
</template>
<script>
export default {
    name: "view",
    mounted() {
        this.url_data = this.$route.params.id;
        this.fetchData();
    },
    data() {
        return {
            url_data: null,
            post: {},
            name: "",
        };
    },
    methods: {
        fetchData() {
            axios
                .get("/api/question/" + this.$route.params.id)
                .then((response) => (this.post = response.data));

        },
    },
};
</script>
