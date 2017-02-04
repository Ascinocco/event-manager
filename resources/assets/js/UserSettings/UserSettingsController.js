import UserSettings from './UserSettings.js';
let settings = new UserSettings();

// update user based click
$("form#settingsForm").on("submit", function (event) {
    settings.updateSettings(event);
});
