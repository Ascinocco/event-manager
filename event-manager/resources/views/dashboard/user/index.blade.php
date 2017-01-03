<html>
    <body>
        <h1>User Dashboard!!!</h1>

        <button type="button" id="createEventShowFormButton" name="createEvent">Create Event</button>

        <div id="eventsOwned">
            <h3>Events Owned</h3>
            <div id="ownedEvents">

            </div>
        </div>

        <div id="eventsAttending">
            <h3>Events Attending</h3>
        </div>

        <div id="createEventForm">
            <form id="createEventForm">
                <input type="hidden" name="_method" value="POST">
                <input type="hidden" id="createEventFormToken" name="_token" value="{{ csrf_token() }}">
                <div id="createEventTitle">
                    <label for="createEventTitle">Title:</label>
                    <br>
                    <input type="text" id="createEventTitle" name="title" required="required">
                </div>
                <div id="createEventDescription">
                    <label for="createEventDescription">Description</label>
                    <br>
                    <input type="text" id="createEventDescription" name="description" required="required">
                </div>
                <div id="location">
                    <label for="createEventLocation">Location:</label>
                    <br>
                    <input type="text" id="createEventLocation" name="location" required="required">
                </div>
                <div id="createEventAttire">
                    <label for="createEventAttire">Attire:</label>
                    <br>
                    <input type="text" id="createEventAttire" name="attire" required="required">
                </div>
                <div id="createEventDate">
                    <label for="createEventDate">Date:</label>
                    <br>
                    <input type="datetime" id="createEventDate" name="date" required="required">
                </div>

                <button type="button" id="createEventSubmitButton" name="submitCreateEventButton">Create Event</button>
            </form>
        </div>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                /**
                 * Hide forms and other functionality
                 */
                // hide create event form
                $("div#createEventForm").hide();
                /** Hide forms and other functionality END */

                /**
                 * Load dashboard data
                 */
                // load owned events
                (function () {
                    // setup headers
                    $.ajaxSetup({
                        header: "{{ csrf_token() }}"
                    });

                    // get users owned events
                    $.ajax({
                        type: "GET",
                        url: "/user/getOwnedEvents",
                        dataType: "JSON",
                        success: function (data) {
                            console.log('success!');
                            for (var i = 0; i < data.length; i++) {
                                $("div#ownedEvents").append('<div id="ownedEvent" data-owned-event-id="' + data[i][id] + '"');
                                for (eventData in data[i]) {
                                    if(data[i].hasOwnProperty(eventData)){
                                        $("div#ownedEvents").append(eventData + ": " + data[i][eventData]);
                                        $("div#ownedEvents").append("<br>");
                                    }
                                }

                                $("div#ownedEvents").append('<button type="button" id="editEventButton" data-owned-event-id="' + data[i]['id'] + '">Edit</button>');
                                $("div#ownedEvents").append('<button type="button" id="deleteEvent" data-owned-event-id="' + data[i]['id'] + '">Delete</button>');
                                $("div#ownedEvents").append('<button type="button" id="invitePeopleToEvent" data-event-id="' + data[i]['id'] + '">Invite People</button>');
                                $("div#ownedEvents").append("<hr>");
                            }

                        },
                        error: function (data) {
                            console.log('error!');
                            console.log(data);
                        }
                    });
                })();

                // TODO: load attending events

                /** Load Dashboard data END */

                /**
                 * Event Listeners
                 */
                // show create event form
                $("button#createEventShowFormButton").on("click", function (event) {
                    // stop default actions
                    event.preventDefault();

                    // show the form
                    $("div#createEventForm").show();
                });

                // submit create event form
                $("button#createEventSubmitButton").on("click", function (event) {
                    // stop default actions
                    event.preventDefault();

                    // setup headers for ajax request
                    $.ajaxSetup({
                        header: $("input#createEventFormToken").val(),
                    });

                    // send ajax request
                    $.ajax({
                        type: "POST",
                        url: "/user/createEvent",
                        data: $("form#createEventForm").serialize(),
                        dataType: "json",
                        success: function (data) {
                            console.log('success!');
                            console.log(data);
                        },
                        error: function (data) {
                            console.log('error!');
                            console.log(data);
                        }
                    });
                });

                /** -------------------- Button Listeners --------------------------- */


                /** Event Listeners END */

            });
        </script>
    </body>
</html>