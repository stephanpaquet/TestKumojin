<template>
    <div class="container w-100 m-auto  mt-3">
        <router-view></router-view>

<!--        <list-view :events="events" class="text-center"/>-->
    </div>
</template>

<script>
// import addItemForm from "./addItemForm";
import createView from "./events/create";
// import listView from "./events/index";

// const routes = {
//     '/': Home,
//     '/about': About
// }

export default {
    // components: {
    //     // addItemForm,
    //     listView
    // },


};
</script>

<style scoped></style>
