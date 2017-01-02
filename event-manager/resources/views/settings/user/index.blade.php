<html>
    <body>
        <form id="userSettingsForm">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" id="updateToken" name="_token" value="{{ csrf_token() }}">

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
        <form id="userDeleteForm">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button id="deleteAccountForm" type="button">Delete Account</button>
        </form>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                 // update user info
                 $("button#userSettingsForm").on("click", function (event) {

                    // prevent form submission
                    event.preventDefault();

                   // setup token
                   $.ajaxSetup({
                       header: $("input#updateToken").val(),
                   });

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

               // delete user account
               $("button#deleteAccountForm").on('click', function (event) {
                    //prevent form submission
                    event.preventDefault();

                    //setup token
                   $.ajaxSetup({
                       header: $("input#updateToken").val(),
                   });

                   // send ajax request
                   // serialize gets the form data
                   $.ajax({
                       type: "POST",
                       url: "/user/delete",
                       data: $("form#deleteAccountForm").serialize(),
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