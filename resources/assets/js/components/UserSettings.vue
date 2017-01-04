<template>
    <div>
        <div id="userSettings" class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h3>Settings</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <form id="updateUserForm">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" id="updateToken" name="_token" value="">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" v-model="editUserForm.name" required="required">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" v-model="editUserForm.email" required="required">
                        </div>

                        <div class="form-group">
                            <label for="oldPassword">Current Password</label>
                            <input type="password" id="oldPassword" name="oldPassword" class="form-control" v-model="editUserForm.oldPassword">
                        </div>

                        <div class="form-group">
                            <label for="newPassword">New Password</label>
                            <input type="password" id="newPassword" name="newPassword" class="form-control" v-model="editUserForm.newPassword">
                        </div>

                        <div class="form-group">
                            <label for="confirmPassword">Confirm New Password</label>
                            <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" v-model="editUserForm.confirmPassword">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        props: ['user'],

        data() {
            return {
                edit: false,
                editUserForm: {
                    name: '',
                    email: '',
                    oldPassword: '',
                    newPassword: '',
                    confirmPassword: ''
                }
            }
        },

        methods: {
            fetchUser() {
                this.$http.get('/user/getUser').then(response => {
                    console.log(response.data);
                    this.editUserForm.name = response.data.name;
                    this.editUserForm.email = response.data.email;
                });
            }
        },

        beforeMount() {
            this.fetchUser();
        },

        mounted() {
            console.log('UserSettings Component Mounted.');
        }
    }
</script>
