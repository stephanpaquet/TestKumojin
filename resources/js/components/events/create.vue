<template>
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <router-link :to="{ name: 'list'}">
                        Événements
                    </router-link>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Créer un événement</li>
            </ol>
        </nav>
        <h1>Créer un événement</h1>

        <div v-for="errorList in validationErrors">
            <div v-for="error in errorList" class="alert alert-danger" role="alert" style="margin-top: 20px">
                {{ error }}
            </div>
        </div>

        <form>
            <div class="form-group">
                <label for="name">Nom de l'événement</label>
                <input v-model="event.name" type="name" class="form-control" id="name">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea v-model="event.description" class="form-control" id="name"/>
            </div>
            <div class="form-group">
                <label for="date">Date de début de l'événement</label>
                <datepicker class="form-control" v-model="event.dateBegin" format="yyyy-MM-dd"></datepicker>
            </div>
            <div class="form-group">
                <label for="date">Date de fin de l'événement</label>
                <datepicker class="form-control" v-model="event.dateEnd" format="yyyy-MM-dd"></datepicker>
            </div>

            <button class="btn btn-primary mt-4  float-end" @click="postEvent">
                Créer l'événement
            </button>
            <router-link class="btn btn-default mt-4  float-end" tag="button" :to="{ name: 'list'}">
                Annuler
            </router-link>
        </form>


    </div>
</template>

<script>

// https://www.npmjs.com/package/vuejs-datepicker
import Datepicker from 'vuejs-datepicker';

export default {
    components: {
        Datepicker
    },
    data() {
        return {
            event: {
                name: '',
                description: '',
                dateBegin: '',
                dateEnd: '',
            },
            validationErrors: []
        }
    },
    methods: {
        postEvent() {
            this.errors = [];

            this.event.dateBegin = this.event.dateBegin ? this.event.dateBegin : ''
            axios
                .post("api/events", this.event)
                .then(res => {
                    this.$router.push({name: 'list'})
                })
                .catch(error => {

                    if (error.response && error.response.status === 422) {
                        this.validationErrors = error.response.data.errors
                    }
                });
        }
    },
};
</script>

