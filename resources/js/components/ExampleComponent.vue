<template>
    <div class="container">
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        />
        <div class="row">
            <div class="col-md-9">
                <router-view />
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-8 widget">
                        <h5>Forum statics</h5>
                        <h6>Questions:454</h6>
                        <h6>messages:46844</h6>
                        <h6>Members:312</h6>
                        <h6>Last Member:Prasant_sahu</h6>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-8 widget">
                        <h5>Follow Us</h5>
                        <a href="#" target="_blank" class="fa fa-facebook"></a>
                        <a href="#" target="_blank" class="fa fa-instagram"></a>
                        <a href="#" target="_blank" class="fa fa-twitter"></a>
                        <a href="#" target="_blank" class="fa fa-linkedin"></a>
                    </div>
                </div>
                <button class="btn btn-warning btn-lg mt-4"><router-link to="/create">Ask question</router-link></button>
            </div>
        </div>
    </div>
</template>

<script>
export default {};
</script>
<style>
.widget {
    background-color: rgb(255, 255, 255);
    padding: 20px;
    box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
h5 {
    font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
}
h6 {
    margin-left: 5px;
    color: rgb(201, 131, 26);
}
.fa {
    font-size: 20px;
    width: 20px;
    text-align: center;
    text-decoration: none;
    margin: 5px 2px;
}
</style>
