<template>
    <div>
        <div class="form-group">
            <lable for="name"> Name:</lable>
            <input
                class="form-control"
                type="text"
                id="name"
                name="name"
                placeholder="Enter your name"
                v-model="item.name"
            />
        </div>
        <div class="form-group">
            <lable for="tel"> Phone:</lable>
            <input
                class="form-control"
                type="text"
                id="tel"
                name="phone"
                placeholder="Enter your phone"
                v-model="item.phone"
            />
        </div>
        <button class="btn btn-success btn-block mt-4" v-on:click="save">
            {{ isEditing ? "Update" : "Save" }}
        </button>
        <div
            class="col-md-12 mt-3"
            style="margin-top: 10px"
            v-if="lists.length > 0"
        >
            <h2 class="text-center">telephones</h2>
            <ul class="list-group">
                <li
                    class="list-group-item"
                    v-for="item in lists"
                    :key="item.id"
                >
                    {{ item.name }}-{{ item.phone }}
                    <span class="float-right" style="float: right">
                        <button
                            class="btn btn-warning btn-sm mr-2"
                            @click="EditTel(item)"
                        >
                            edit
                        </button>
                        <button
                            class="btn btn-danger btn-sm mr-2"
                            @click="deleteTel(item.id)"
                        >
                            delete
                        </button>
                    </span>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
import axios from "axios";

export default {
    name: "Directory",
    data() {
        return {
            lists: [],
            item: {
                name: "",
                phone: "",
            },
            isEditing: false,
            temp_id: null,
        };
    },
    mounted() {
        this.fetchAll();
    },
    methods: {
        fetchAll() {
            axios
                .get("api/tel")
                .then((response) => (this.lists = response.data));
        },
        save() {
           let  method = axios.post;
           let url = "/api/tel/";
            if (this.isEditing) {
                method = axios.put;
                url = `/api/tel/${this.temp_id}`;
            }
            try {
                method(url, this.item).then((response) => {
                    this.fetchAll();
                });
            } catch (e) {
                console.log(e);
            }
        },
        deleteTel(id) {
            try {
                axios
                    .delete(`api/tel/${id}`)
                    .then((response) => this.fetchAll());
            } catch (e) {}
        },
        EditTel(tel) {
            this.item = {
                name: tel.name,
                phone: tel.phone,
            };
            (this.temp_id = tel.id), (this.isEditing = true);
        },
    },
};
</script>
