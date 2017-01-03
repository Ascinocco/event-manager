<html>
    <body>
        <h1>User Dashboard!!!</h1>

        <button type="button" id="createEventButton" name="createEvent">Create Event</button>

        <div id="eventsOwned">
            <h3>Events Owned</h3>
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
                    <input type="text" id="createEventTitle" name="createEventTitle" required="required">
                </div>
                <div id="createEventDescription">
                    <label for="createEventDescription">Description</label>
                    <br>
                    <input type="text" id="createEventDescription" name="createEventDescription" required="required">
                </div>
                <div id="location">
                    <label for="createEventLocation">Location:</label>
                    <br>
                    <input type="text" id="createEventLocation" name="createEventLocation" required="required">
                </div>
                <div id="createEventAttire">
                    <label for="createEventAttire">Attire:</label>
                    <br>
                    <input type="text" id="createEventAttire" name="createEventAttire" required="required">
                </div>
                <div id="createEventDate">
                    <label for="createEventDate">Date:</label>
                    <br>
                    <input type="text" id="createEventDate" name="createEventDate" required="required">
                </div>

                <button type="button" id="submitCreateEventButton" name="submitCreateEventButton">Create Event</button>
            </form>
        </div>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                // on page ready hide all forms
                $("div#createEventForm").hide();

                // event listeners
                $("button#createEventButton").on("click", function (event) {
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

            });
        </script>
    </body>
</html>