<template>
    <div class="container-fluid">
        <h2 class="mt-4 question">{{ post.question }}</h2>
        <h4 class="mt-2 h">{{ post.description }}</h4>
        <h4 class="mt-2 h">{{ post.image }}</h4>
        <div class="row">
            <div class="col-md-7">
                <h3 class="mt-5">Discussed Answers</h3>
                <div class="ul" v-for="item in data" :key="item.id">
                    <ul>
                        {{
                            item.answer
                        }}
                        {{
                            item.description
                        }}

                        <button id="btn" style="float: right" @click="append">
                            Add comment +
                        </button>
                    </ul>
                    <div id="ap"></div>
                </div>
            </div>
            <div class="col-md-3 pt-5">
                <h5 for="id" class="md-1 answer">Write your answer</h5>
                <input
                    type="text"
                    id="answer"
                    name="answer"
                    v-model="item.answer"
                    class="form-control mt-2 mr-3"
                />
            </div>
            <div class="col-md-2 pt-5">
                <button
                    class="btn btn-danger btn-block"
                    id="submit"
                    @click="save"
                >
                    Post answer
                </button>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
export default {
    name: "view",
    mounted() {
        this.url_data = this.$route.params.id;
        this.fetchData();
        this.fetchAll();
    },
    data() {
        return {
            url_data: null,
            post: {},
            data: [],
            name: "",
            item: {
                answer: "",
                question_id: this.$route.params.id,
            },
            editedTodo: null,
        };
    },
    methods: {
        append() {
            var objTo = document.getElementById("btn");
            var divComment = document.getElementById("ap");
            divComment.innerHTML =
                ' <input type="text" class="form-control" placeholder="Enter your comment">';

            divComment.append(divComment);
        },

        fetchData() {
            axios
                .get("/api/question/" + this.$route.params.id)
                .then((response) => (this.post = response.data));
        },

        save() {
            axios.post("/api/answer", this.item).then((response) => {
                this.fetchAll();
            });
        },

        fetchAll() {
            axios
                .get("/api/answer?question_id=" + this.$route.params.id)
                .then((response) => (this.data = response.data));
        },
    },
};
</script>
<style>
.h {
    margin-top: 0.5rem !important;
    color: #120958;
}

.answer {
    font-size: 21px;
    font-weight: 600;
}
.mt-4 {
    margin-top: 1.5rem !important;
    font-weight: 700;
}
.mt-5 {
    margin-top: 3rem !important;
    font-weight: 600;
}
.btn {
    margin-top: 31px !important;
    font-weight: 700;
}
.ul {
    box-shadow: 1px 0px 3px 0px black;
    color: bloack;
    background-color: #a8bbde7a;
    border-radius: 10px;
    padding: 10px;
    margin-top: 10px;
}
#btn {
    color: #0008187a;
    background-color: #a8bbde7a;
    box-shadow: 1px 0px 3px 0px black;
}
</style>
