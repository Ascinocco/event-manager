<html>
    <body>
        <form id="userSettingsForm">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" id="updateToken" name="_token" value="{{ csrf_token() }}">

            <div id="name">
                <label for="name">Name:</label>
                <br>
                <input type="text" id="name" name="name" value="{{ $user->name }}">
            </div>

            <div id="email">
                <label for="email">Email:</label>
                <br>
                <input type="email" id="email" name="email" value="{{ $user->email }}">
            </div>

            <div id="oldPassword">
                <label for="oldPassword">Old Password:</label>
                <br>
                <input type="password" id="oldPassword" name="oldPassword">
            </div>

            <div id="newPassword">
                <label for="newPassword">New Password:</label>
                <br>
                <input type="password" id="newPassword" name="newPassword">
            </div>

            <div id="confirmPassword">
                <label for="confirmPassword">Confirm Password:</label>
                <br>
                <input type="password" id="confirmPassword" name="confirmPassword">
            </div>

            <button id="userSettingsForm" type="button">Submit</button>
        </form>
        <form id="deleteAccountForm">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" id="deleteToken" name="_token" value="{{ csrf_token() }}">
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

                    // confirm deletion
                    var result = confirm("Are you sure you want to delete your account?");

                    if (result){
                        //setup token
                        $.ajaxSetup({
                            header: $("input#deleteToken").val(),
                        });

                        // send ajax request
                        // serialize gets the form data
                        $.ajax({
                            type: "POST",
                            url: "/user/delete",
                            dataType: "json",
                            data: $("form#deleteAccountForm").serialize(),
                            success: function (data) {
                                console.log('success!');
                                console.log(data);
                                // replace window location with dynamic url from blade
                                window.location.replace("http://localhost/");
                            },
                            error: function (data) {
                                console.error('error!');
                                console.log(data);
                            }
                        });
                    } else {
                        $("input#name").focus();
                    }
               });
            });
        </script>
    </body>
</html>