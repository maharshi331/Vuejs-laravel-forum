<template>
    <div class="container-fluid">
        <h2 class="mt-4 question">{{ post.question }}</h2>
        <h4 class="mt-2 h">{{ post.description }}</h4>
        <h4 class="mt-2 h">{{ post.image }}</h4>
        <div class="row">
            <div class="col-md-7">
                <h3 class="mt-5">Discussed Answers</h3>
                <div class="ul" v-for="item in data" :key="item.id">
                    <input
                        v-if="comment.answer_id == item.id"
                        class="form-control-sm"
                        type="text"
                        v-model="comment.comment"
                        ref="anyName"
                        style="float: right"
                        placeholder="Add Comment"
                    />

                    <button
                        class="btn btn-warning btn-sm"
                        v-if="comment.answer_id == item.id"
                        @click="addCommentToAnswer"
                    >
                        save
                    </button>
                    <ul>
                        {{
                            item.answer
                        }}
                        {{
                            item.description
                        }}
                        <h6 @click.prevent="CallToComments(item.id)">All Comments</h6>
                        <div v-for="items in variableOne" :key="items.id">
                            <p v-if="comment.answer_id == item.id">
                                {{ items.comment }}
                            </p>
                        </div>
                    </ul>

                    <button class="btn" id="green" @click="like(item.id)">
                        <i class="fa fa-thumbs-up fa-lg" aria-hidden="true"></i>
                        <i v-if="comment.answer_id == item.id"> {{ likes }} </i>
                    </button>
                    <button class="btn" id="red">
                        <i
                            class="fa fa-thumbs-down fa-lg"
                            aria-hidden="true"
                        ></i>
                    </button>
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
        this.fetchComment();
        this.myFunction();
    },
    data() {
        return {
            url_data: null,
            post: {},
            CommentData: [],
            likes: 0,
            comment: {
                comment: "",
                answer_id: 0,
            },
            data: {
                data: "",
                id: "1",
            },
            name: "",
            item: {
                answer: "",
                question_id: this.$route.params.id,
            },
            editedTodo: null,
            variableOne: [],
        };
    },
    methods: {
        like(id) {
            this.likes = this.likes + 1;
            this.comment.answer_id = id;

        },

        fetchData() {
            axios
                .get("/api/question/" + this.$route.params.id)
                .then((response) => (this.post = response.data));
        },

        save() {
            axios.post("/api/answer", this.item).then((response) => {
                this.fetchAll();
                this.item.answer = "";
            });
        },

        fetchAll() {
            axios
                .get("/api/answer?question_id=" + this.$route.params.id)
                .then((response) => (this.data = response.data));
        },
        addComment(id) {
            this.comment.comment = "";
            this.comment.answer_id = id;
        },
        addCommentToAnswer() {
            axios.post("/api/comment/", this.comment).then((response) => {});
            this.comment.comment = "";
        },
        fetchComment() {
            axios
                .get("/api/comment")
                .then((response) => (this.CommentData = response.data));
        },
        CallToComments(id) {
            this.comment.answer_id = id;
            this.variableOne = this.CommentData.filter(
                (itemInArray) => itemInArray.answer_id == this.comment.answer_id
            );
            console.log(variableOne);
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

    box-shadow: 1px 0px 3px 0px rgb(0, 0, 0);
}
.btn-sm {
    float: right;
    align-items: center;
}
</style>
