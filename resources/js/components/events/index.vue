<template>
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Événements</li>
            </ol>
        </nav>
        <h1>Liste des événements <small>({{ events.length }})</small>
            <router-link class="btn btn-primary btn-sm" tag="button" :to="{ name: 'create'}">
                Créer un événement
            </router-link>
        </h1>

        <table class="table">
            <thead>
            <tr>
                <th>Nom</th>
                <th class="w-25">Description</th>
                <th>Date de l'événement</th>
                <th>Timezone</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="event in events" :key="event.id">
                <td>{{ event.name }}</td>
                <td>{{ event.description }}</td>
                <td>

                    <ul>
                        <li>
                            Début: {{ formatDate(event.dateBeginLocal) }}
                        </li>
                        <li>
                            Fin: {{ formatDate(event.dateEndLocal) }}
                        </li>
                        <li>
                            Date dans la BD: {{ formatDate(event.dateBegin) }}
                        </li>
                    </ul>
                <td>{{ event.timezone }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

export default {
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
        }, formatDate(date) {
            return window.moment(date).format('lll');
        }
    },
    created() {
        this.getEvents();
    }
};
</script>

