<template>
    <div>
        <h1>Dashboard</h1>
    </div>
</template>

<script>
    export default {
        data() {
            return {

                // event the logged in user owns
                ownedEvents: [],
                ownedEventsErrors: [],
                editOwnedEvent: {
                    edit: false,
                    eventId: '',
                },
                inviteUserToOwnedEvent: false,

                // event the logged in user is attending
                attendingEvents: [],
                attendingEventsErrors: [],
                viewAttendingEvent: false,

                // users attending a specific event
                usersAttendingEvent: {
                    eventId: '',
                    users: []
                },
                usersAttendingEventErrors: []
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

                    this.ownedEventsErrors = response.data;
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

                    this.attendingEventsErrors = response.data;

                });
            },

            fetchAttendingUsers(event) {
                this.$http.get('/user/getAttendingUsers', event).then(response => {
                    console.log('success retrieving users attending event');
                    console.log(response);

                    this.usersAttendingEvent.eventId = event.id;
                    this.usersAttendingEvent.users = response.data.attendingUsers;

                }, (response) => {
                    console.log('error retrieving users attending event');
                    console.log(response);

                    this.usersAttendingEventErrors = response.data;

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
