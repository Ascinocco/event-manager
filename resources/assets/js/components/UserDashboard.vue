<template>
    <div>
        <div id="userDashboard" class="container">
            <div class="row">
                <div v-if="showEventLists === false">
                    <div>
                        <a class="lara-anchor" style="float: left;" v-on:click="back()"><i class="fa fa-arrow-left"></i></a>
                        <h3 class="col-md-4 col-md-offset-5">&nbsp;&nbsp;Dashboard</h3>
                    </div>
                </div>

                <div v-if="showEventLists === true">
                    <div class="text-center">
                        <h3>Dashboard</h3>
                    </div>
                </div>
            </div>

            <div class="row" v-if="showEventLists === true">
                <br>
                <div id="ownedEventsList" class="col-md-6">
                    <div class="text-center">
                        <h5>Events Owned | <a class="lara-anchor" v-on:click="showCreateOwnedEventForm()"><i class="fa fa-plus"></i></a></h5>
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
            <div class="row" v-if="createOwnedEventShowForm === true">
                <br>
                <div id="createOwnedEvent" class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="text-center">
                                <h4>Create Event</h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="title" class="form-label-no-bottom-padding">Title </label>
                                <hr class="create-event-form-hr" style="width: 31px;">
                                <input type="text" id="title" name="title" class="form-control" v-model="ownedEventForm.title" required="required">
                            </div>
                            <div class="form-group">
                                <label for="description" class="form-label-no-bottom-padding">Description </label>
                                <hr class="create-event-form-hr" style="width: 75px;">
                                <textarea type="text" id="description" name="description" class="form-control" rows="6" v-model="ownedEventForm.description" required="required"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="location" class="form-label-no-bottom-padding">Location </label>
                                <hr class="create-event-form-hr" style="width: 57px;">
                                <input type="text" id="location" name="location" class="form-control" v-model="ownedEventForm.location" required="required">
                            </div>
                            <div class="form-group">
                                <label for="attire" class="form-label-no-bottom-padding">Attire </label>
                                <hr class="create-event-form-hr" style="width: 35px;">
                                <input type="text" id="attire" name="attire" class="form-control" v-model="ownedEventForm.attire" required="required">
                            </div>
                            <div class="form-group">
                                <label for="date" class="form-label-no-bottom-padding">Date </label>
                                <hr class="create-event-form-hr" style="width: 31px;">
                                <input type="date" id="date" name="date" class="form-control" v-model="ownedEventForm.date" required="required">
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="text-right">
                                <button type="button" class="btn btn-default" v-on:click="createOwnedEvent(ownedEventForm)">Create</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" v-if="editOwnedEventShowForm === true">
                <br>
                <div id="editOwnedEvent" class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="text-center">
                                <h4>Edit Event</h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="editTitle" class="form-label-no-bottom-padding">Title </label>
                                <hr class="create-event-form-hr" style="width: 31px;">
                                <input type="text" id="editTitle" name="title" class="form-control" v-model="editOwnedEventForm.title" required="required">
                            </div>
                            <div class="form-group">
                                <label for="editDescription" class="form-label-no-bottom-padding">Description </label>
                                <hr class="create-event-form-hr" style="width: 75px;">
                                <textarea type="text" id="editDescription" name="description" class="form-control" rows="6" v-model="editOwnedEventForm.description" required="required"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="editLocation" class="form-label-no-bottom-padding">Location </label>
                                <hr class="create-event-form-hr" style="width: 57px;">
                                <input type="text" id="editLocation" name="location" class="form-control" v-model="editOwnedEventForm.location" required="required">
                            </div>
                            <div class="form-group">
                                <label for="editAttire" class="form-label-no-bottom-padding">Attire </label>
                                <hr class="create-event-form-hr" style="width: 35px;">
                                <input type="text" id="editAttire" name="attire" class="form-control" v-model="editOwnedEventForm.attire" required="required">
                            </div>
                            <div class="form-group">
                                <label for="editDate" class="form-label-no-bottom-padding">Date </label>
                                <hr class="create-event-form-hr" style="width: 31px;">
                                <input type="date" id="editDate" name="date" class="form-control" v-model="editOwnedEventForm.date" required="required">
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="text-right">
                                <button type="button" class="btn btn-default" v-on:click="updateOwnedEvent(editOwnedEventForm)">Update</button>
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

    .form-label-no-bottom-padding {
        padding-bottom: 0px;
        margin-bottom: 0px;
    }

    .create-event-form-hr {
        margin: 0px 0px 10px 0px;
        padding: 0px 0px 0px 0px;
        border-top: 1px solid #A9A9A9;
    }

</style>
<script>
    export default {
        data() {
            return {
                // html and form states
                showEventLists: true,
                editOwnedEventShowForm: false,
                createOwnedEventShowForm: false,
                inviteUserToOwnedEventShowForm: false,

                // form objects
                // edit form
                editOwnedEventForm: {
                    id: '',
                    title: '',
                    description: '',
                    location: '',
                    attire: '',
                    date: '',
                },

                // create event form
                ownedEventForm: {
                    title: '',
                    description: '',
                    location: '',
                    attire: '',
                    date: '',
                },

                // invite user form
                inviteUserForm: {
                    eventId: '',
                    invitedUserEmail: '',
                },

                // event lists and invited users list
                ownedEvents: [],
                attendingEvents: [],
                usersAttendingEvent: {
                    eventId: '',
                    users: []
                },

                // error lists
                ownedEventsErrors: [],
                editOwnedEventsErrors: [],
                createOwnedEventErrors: [],
                attendingEventsErrors: [],
                usersAttendingEventErrors: [],

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

            showOwnedEventEditForm(event) {
                console.log('show owned event edit form');

                console.log(event);
                this.showEventLists = false;
                this.editOwnedEventShowForm = true;
                this.editOwnedEventForm.id = event.id;
                this.editOwnedEventForm.title = event.title;
                this.editOwnedEventForm.description = event.description;
                this.editOwnedEventForm.location = event.location;
                this.editOwnedEventForm.attire = event.attire;
                this.editOwnedEventForm.date = event.date;
            },
            updateOwnedEvent(event) {
                this.$http.put('/user/updateEvent', event).then(response => {
                    console.log('Event updated!');
                    console.log(response.data);

                    this.fetchOwnedEvents();
                    this.fetchAttendingEvents();

                    this.back();

                }, (response) => {
                    console.log('Event update failed...');
                    console.log(response.data);

                    this.editOwnedEventsErrors = response.data;
                    this.back();

                });
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

                    this.createOwnedEventsErrors = response.data;

                });
            },

            // show event hidden content (applies to both owned events and events attending)
            showHiddenEventContent(event) {
                console.log('Show hidden event content');
                console.log(event.id);

                //fetch users attending events
                // display google maps plugin
            },


            showCreateOwnedEventForm() {
                // log that we are creating an event
                console.log('Showing create event form');

                // hide lists
                this.showEventLists = false;

                // show create event form
                this.createOwnedEventShowForm = true;
            },

            createOwnedEvent(event) {
                console.log('creating event...');
                this.$http.post('/user/createEvent', event).then(response => {
                    // log success and data
                    console.log('success creating event!');
                    console.log(response.data);

                    // refresh data
                    this.fetchOwnedEvents();
                    this.fetchAttendingEvents();

                    // back to main dashboard
                    this.back();

                }, (response) => {
                    // log error and data
                    console.log('error creating event');
                    console.log(response.data);

                    this.createOwnedEventErrors = response.data;

                    this.back();

                });
            },

            inviteUserToOwnedEvent() {

            },

            viewAttendingEvent() {

            },

            refreshEvents() {

            },

            back() {
                 // pretend back button functionality ahah
                 this.createOwnedEventShowForm = false;
                 this.editOwnedEventShowForm = false;
                 this.showEventLists = true;
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
