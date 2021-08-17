<template>
    <li class="nav-item mx-3 my-auto dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fas fa-bell"></i>
            <span class="badge badge-danger" v-if="notifications.length">{{ notifications.length }}</span>
        </a>
        <ul class="dropdown-menu" v-if="notifications.length">
            <li class="px-3" v-for="(notification, index) in notifications" :key="index">
                <a @click="markAsRead(notification)" :href="notification.data.link">{{ notification.data.text }}</a>
            </li>

            <li>
                <hr>
                <a href="#" @click="markAllAsRead">Marcar todo como leído</a>
            </li>
        </ul>
    </li>
</template>

<script>
    export default {
        data() {
            return {
                notifications: []
            }
        },
        mounted () {
            axios.get('/notificaciones')
                .then(res => this.notifications = res.data);
        },
        methods: {
            markAsRead(notification) {
                axios.patch('notificaciones/'+notification.id)
                    .then(res => this.notifications = res.data);
            },
            markAllAsRead(){
                this.notifications.forEach(notification => this.markAsRead(notification)         )
            }
        },
    }
</script>
