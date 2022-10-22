<template>
    <div>
        <h1>Liste des événements <small>({{ events.length }})</small></h1>

        <table class="table">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Date de début</th>
                <th>Date de fin</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="event in events" :key="event.id">
                <td>{{ event.name }}</td>
                <td>{{ event.description }}</td>
                <td>{{ event.dateBegin }}</td>
                <td>{{ event.dateEnd }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

export default {
    components: {},
    props: ["events"]
};
</script>

