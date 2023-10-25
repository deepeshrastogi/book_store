<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="loader">
                    <p>Loading...</p>
                    <div class="loader-inner"></div>
                    <div class="loader-inner"></div>
                    <div class="loader-inner"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'LoaderComponent',
}
</script>

<style>

.loader{
    width: 40%;
    height: 70px;
    position:fixed;
    top:25%;
    margin: 0% 0% 0% 28%;
}
.loader p{
    font-size: 16px;
    color: #777;
}
.loader .loader-inner{
    display: inline-block;
    position:relative;
    width: 15px;
    border-radius: 15px;
    background: #74d2ba;
}
.loader .loader-inner:nth-last-child(1){
    -webkit-animation: loading 1.5s 1s infinite;
    animation: loading 1.5s 1s infinite;
}
.loader .loader-inner:nth-last-child(2){
    -webkit-animation: loading 1.5s .5s infinite;
    animation: loading 1.5s .5s infinite;
}
.loader .loader-inner:nth-last-child(3){
    -webkit-animation: loading 1.5s 0s infinite;
    animation: loading 1.5s 0s infinite;
}
@-webkit-keyframes loading{
    0%{
        height: 15px;
    }
    50%{
        height: 35px;
    }
    100%{
        height: 15px;
    }
}
@keyframes loading{
    0%{
        height: 15px;
    }
    50%{
        height: 35px;
    }
    100%{
        height: 15px;
    }
}
</style>