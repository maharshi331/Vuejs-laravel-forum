<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>Forum</h3></div>

                    <div class="form-group pt-3">
                        <lable for="tel" style="font-size: 18px">
                            Enter your questions?</lable
                        >
                        <textarea
                            class="form-control mt-1"
                            type="textarea"
                            id="question"
                            name="question"
                            cols="50"
                            v-model="item.question"
                            placeholder="Enter your Question"
                            required
                        />
                    </div>
                    <div class="form-group pt-2">
                        <lable for="tel" style="font-size: 18px">
                            Enter your questions description</lable
                        >
                        <textarea
                            class="form-control mt-1"
                            type="textarea"
                            id="description"
                            name="description"
                            cols="50"
                            v-model="item.description"
                            placeholder="Enter more about question"
                        />
                    </div>
                    <button
                        class="btn btn-danger btn-block mt-4"
                        v-on:click="save"
                    >
                        {{ isEditing ? "Update" : "Save" }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "forum",
    data() {
        return {
            lists: [],
            item: {
                question: "",
                description: "",
            },
        };
    },
    mounted() {
        this.fetchAll();
    },
    methods: {
        fetchAll() {
            axios
                .get("api/question")
                .then((response) => (this.lists = response.data));
        },
        save() {
            axios.post("api/question", this.item).then((response) => {
                this.fetchAll();
               this.$router.push("/forum");
            });
        },
    },
};
</script>
<style>
.card {
    border: 1px solid;
    padding: 8px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
</style>
