<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3>Froum</h3></div>

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
                <div
            class="col-md-12 mt-3"
            style="margin-top: 10px"
            v-if="lists.length>0"></div>

                  <h2 class="text-center mt-4" style="background-color:#e2e2e2;">Questions</h2>
            <ul class="list-group">
                <li
                    class="list-group-item"
                    v-for="item in lists"
                    :key="item.id"
                >
                    {{ item.question }}
                    <span class="float-right" style="float: right">
                        <button
                            class="btn btn-warning btn-sm mr-2"
                            @click="view(item)"
                        >
                            view
                        </button>


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
    mounted () {
        this.fetchAll();
    },
    methods: {
        fetchAll(){
            axios.get('api/question').then((response) =>(this.lists=response.data))
        },
        save() {
            axios.post("api/question", this.item).then((response) => {    this.fetchAll();});
        },
    },
};
</script>
