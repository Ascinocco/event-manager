export default class UserSettings {

    updateSettings(event) {
        // stop form submission
        event.preventDefault();

        // get data
        let data = $("form#settingsForm").serialize();

        if (this.validateSettings(data)) {
            $.ajax({
                type: "POST",
                dataType: "json",
                url:  "/user/settings",
                data: data,
                success: this.displaySuccess(),
                error: this.displayErrors()
            });
        } else {
            // need to figure out a good way to output errors
            console.log('validation errors');
        }
    }

    validateSettings() {
        console.log('validate')
    }

    displaySuccess(messages) {
        console.log('success')
    }

    displayErrors(messages) {
        console.log('error')
    }
}