<template>
    <div class="container w-100 m-auto  mt-3">
        <list-view :events="events" class="text-center"/>
    </div>
</template>

<script>
// import addItemForm from "./addItemForm";
import listView from "./events/index";

export default {
    components: {
        // addItemForm,
        listView
    },

    data: function () {
        return {
            events: []
        };
    },
    methods: {
        getEvents() {
            axios
                .get("api/events")
                .then(res => {
                    console.log(res.data)
                    this.events = res.data.data;
                })
                .catch(error => {
                    console.log(error);
                });
        }
    },
    created() {
        this.getEvents();
    }
};
</script>

<style scoped></style>
