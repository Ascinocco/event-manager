<html>
    <body>
        <form id="userSettingsForm">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div id="name">
                <label for="name">Name:</label>
                <br>
                <input type="text" name="name" value="{{ $user->name }}">
            </div>

            <div id="email">
                <label for="email">Email:</label>
                <br>
                <input type="email" name="email" value="{{ $user->email }}">
            </div>

            {{--<div id="checkToken"></div>--}}

            <button id="userSettingsForm" type="button">Submit</button>
        </form>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
               $("button#userSettingsForm").on("click", function (event) {

                   // setup token
                   $.ajaxSetup({
                       header: $("input[name='_token']").val(),
                   });

                   // prevent form submission
                   event.preventDefault();

                   // send ajax request
                   // serialize gets the form data
                   $.ajax({
                       type: "POST",
                       url: "/user/settings",
                       data: $("form#userSettingsForm").serialize(),
                       dataType: "json",
                       success: function (data) {
                           console.log('success!');
                           console.log(data);
                       },
                       error: function (data) {
                           console.error('error!');
                           console.log(data);
                       }
                   });
               });
            });
        </script>
    </body>
</html>