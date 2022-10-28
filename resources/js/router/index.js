import Vue from 'vue'
import Router from 'vue-router'
import EventsIndex from '../components/events/index'
import EventsCreate from '../components/events/create'

Vue.use(Router)

export default new Router({
    routes: [
        { path: '/', component: EventsIndex,  name: 'list', },
        { path: '/create', component: EventsCreate,  name: 'create', },
    ]
})
