<template>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a :href="'/'+notification.data.follower.username" class="dropdown-item" v-for="notification in notifications">
            @{{ notification.data.follower.username }} te ha seguido!
        </a>
    </div>
</template>

<script>
export default {
    props: ['user'],
    data(){
        return {
            notifications: []
        }
    },
    mounted() {
        axios.get('/api/notifications')
            .then(response => {
                this.notifications = response.data;

                Echo.private('App.User.${this.user}')
                    .notifications(notification => {
                        this.notifications.unshift(notification);
                    });
            });
    },
}
</script>
