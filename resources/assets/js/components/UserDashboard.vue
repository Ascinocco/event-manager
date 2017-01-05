<template>
    <div>
        <h1>Dashboard</h1>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                ownedEvents: [],
                ownedEventsErrors: [],
                editOwnedEvent: {
                    edit: false,
                    id: '',
                },
                inviteUserToOwnedEvent: false,

                attendingEvents: [],
                attendingEventsErrors: [],
                viewAttendingEvent: false,
            }
        },

        methods: {
            fetchOwnedEvents() {
                this.$http.get('/user/getOwnedEvents').then(response => {
                    console.log('owned event success!');
                    console.log(response);
                    this.ownedEvents = response.data.ownedEvents;
                }, (response) => {
                    console.log('owned event error!');
                    console.log(response);
                });
            },

            fetchAttendingEvents() {
                this.$http.get('/user/getAttendingEvents').then(response => {
                    console.log('attending event success!');
                    console.log(response);
                    this.attendingEvents = response.data.attendingEvents;
                }, (response) => {
                    console.log('attending event error!');
                    console.log(response);
                });
            },

            updateOwnedEvent() {

            },

            deleteOwnedEvent() {

            },

            inviteUserToOwnedEvent() {

            },

            viewAttendingEvent() {

            },

            refreshEvents() {

            },
        },

        beforeMount() {
            this.fetchOwnedEvents();
            this.fetchAttendingEvents();
        },

        mounted() {
            console.log('Dashboard Component ready.')
        },
    }
</script>
