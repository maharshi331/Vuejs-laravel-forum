<template>
    <div class="container-fluid">
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css"
        />
        <div class="row">
            <div class="col-md-12">
                <div
                    class="col-md-12 mt-3"
                    style="margin-top: 10px"
                    v-if="lists.length > 0"
                ></div>

                <h2 class="text-center mt-4" style="background-color: #e2e2e2">
                    Here is all Questions
                </h2>

                <ul class="list-group">
                    <li
                        class="list-group-item"
                        v-for="item in lists"
                        :key="item.id"
                    >
                        <i
                            class="bi bi-chat-dots-fill"
                            style="padding-right: 10px; font-size: 18px"
                        ></i>
                        {{ item.question }}
                        <span class="float-right" style="float: right">
                            <router-link
                                :to="{
                                    name: 'view',
                                    params: { id: item.id },
                                }"
                                ><button class="btn btn-warning btn-sm mr-2">
                                    view
                                </button>
                            </router-link>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "forum_view",
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
    },
};
</script>
<style>
.list-group {
    border-bottom: 1px solid black;
}
.create {
    float: right;
}
</style>
