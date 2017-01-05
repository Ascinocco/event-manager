<template>
    <div>
        <div id="userDashboard" class="container">
            <div class="row">
                <div class="text-center">
                    <h3>Dashboard</h3>
                </div>
            </div>

            <div class="row">
                <br>
                <div id="ownedEventsList" class="col-md-6">
                    <div class="text-center">
                        <h5>Events Owned | <a class="lara-anchor" v-on:click="createOwnedEvent()"><i class="fa fa-plus"></i></a></h5>
                        <br>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default" v-for="ownedEvent in ownedEvents">
                            <div class="panel-heading">
                                <h4 class="text-center">{{ ownedEvent.title }}</h4>
                            </div>
                            <div class="panel-body">
                                <ul class="event-list-style">
                                    <li class="list-space">
                                        <div>
                                            <div>
                                                Description
                                                <hr class="event-list-hr" style="width: 75px;">
                                            </div>
                                            {{ ownedEvent.description }}
                                        </div>
                                    </li>
                                    <li class="list-space">
                                        <div>
                                            <div>
                                                Location
                                                <hr class="event-list-hr" style="width: 57px;">
                                            </div>
                                            {{ ownedEvent.location }}
                                        </div>
                                    </li>
                                    <li class="list-space">
                                        <div>
                                            <div>
                                                Attire
                                                <hr class="event-list-hr" style="width: 35px;">
                                            </div>
                                            {{ ownedEvent.attire }}
                                        </div>
                                    </li>
                                    <li class="list-space">
                                        <div>
                                            <div>
                                                Date
                                                <hr class="event-list-hr" style="width: 31px;">
                                            </div>
                                            {{ ownedEvent.date }}
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="panel-footer">
                                <div class="button-left">
                                    <button type="button" class="btn btn-default" v-on:click="showHiddenEventContent(ownedEvent)"><i class="fa fa-plus fa-lg"></i></button>
                                </div>
                                <div class="text-right">
                                    <button type="button" class="btn btn-default" v-on:click="showOwnedEventEditForm(ownedEvent)">Edit</button>
                                    <button type="button" class="btn btn-default" v-on:click="deleteOwnedEvent(ownedEvent)">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="attendingEventsList" class="col-md-6">
                    <div class="text-center">
                        <h5>Events Attending</h5>
                        <br>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default" v-for="attendingEvent in attendingEvents">
                            <div class="panel-heading">
                                <h4 class="text-center">{{ attendingEvent.title }}</h4>
                            </div>
                            <div class="panel-body">
                                <ul class="event-list-style">
                                    <li class="list-space">
                                        <div>
                                            <div>
                                                Description
                                                <hr class="event-list-hr" style="width: 75px;">
                                            </div>
                                            {{ attendingEvent.description }}
                                        </div>
                                    </li>
                                    <li class="list-space">
                                        <div>
                                            <div>
                                                Location
                                                <hr class="event-list-hr" style="width: 57px;">
                                            </div>
                                            {{ attendingEvent.location }}
                                        </div>
                                    </li>
                                    <li class="list-space">
                                        <div>
                                            <div>
                                                Attire
                                                <hr class="event-list-hr" style="width: 35px;">
                                            </div>
                                            {{ attendingEvent.attire }}
                                        </div>
                                    </li>
                                    <li class="list-space">
                                        <div>
                                            <div>
                                                Date
                                                <hr class="event-list-hr" style="width: 31px;">
                                            </div>
                                            {{ attendingEvent.date }}
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="panel-footer">
                                <div class="text-left">
                                    <button type="button" class="btn btn-default" v-on:click="showHiddenEventContent(ownedEvent)"><i class="fa fa-plus fa-lg"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
    .lara-anchor {
        color: #636b6f;
    }

    .lara-anchor:hover {
        color: #A9A9A9;
    }

    .button-left {
        float: left;
    }

    .button-right {
        float: right;
    }

    .list-space {
        margin-top: 15px;
        margin-bottom: 15px;
    }

    .event-list-style {
        list-style-type: none;
    }

    .event-list-hr {
        margin: 0px 0px 5px 0px;
        padding: 0px 0px 0px 0px;
        border-top: 1px solid #A9A9A9;
    }

</style>
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

            fetchUsersAttendingEvent(eventId) {
                this.$http.post('/user/getAttendingUsers', eventId).then(response => {
                    console.log('success retrieving users attending event');
                    console.log(response);

                    this.usersAttendingEvent.eventId = eventId;
                    this.usersAttendingEvent.users = response.data.usersAttendingEvent;

                }, (response) => {
                    console.log('error retrieving users attending event');
                    console.log(response);

                    this.usersAttendingEventErrors = response.data;

                });
            },

            showOwnedEventEditForm(ownedEvent) {
                console.log('show owned event edit form');
                console.log(ownedEvent.id);
            },
            updateOwnedEvent() {

            },

            deleteOwnedEvent(ownedEvent) {
                console.log('deleting owned event...');
                console.log(ownedEvent.id);

                this.$http.delete('/user/deleteEvent/' + ownedEvent.id).then(response => {
                    console.log('Event Successfully Delete');
                    console.log(response.data);

                    // grab events again and refresh
                    this.fetchOwnedEvents();
                    this.fetchAttendingEvents();

                }, (response) => {

                    console.log('Error deleting event');
                    console.log(response.data);

                    this.ownedEventsErrors = response.data;

                });
            },

            // show event hidden content (applies to both owned events and events attending)
            showHiddenEventContent(event) {
                console.log('Show hidden event content');
                console.log(event.id);
            },

            createOwnedEvent() {
                // logic to show event creation form here
                // for now, just log that the button was clicked
                console.log('create event anchor clicked!');
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
