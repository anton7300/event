<template>
    <div>
        <dialog-log :messages="messages"></dialog-log>
        <dialog-composer :user="user" @messagesent="addMessage"></dialog-composer>
    </div>
</template>

<script>
    export default {
        props: ['dialogid', 'user'],
        data() {
            return {
                messages: []
            }
        },
        mounted() {
            axios.post(`/dialog/${this.dialogid}/messages`).then(response => {
                this.messages = response.data;
            });
        },
        methods: {
            addMessage (message) {
                this.messages.push(message);

                axios.post(`/dialog/${this.dialogid}/message-create`, message).then(response => {
                    //
                });
            }
        },
        created () {
            Echo.private(`dialog.${this.dialogid}`)
                .listen('DialogMessageEvent', (e) => {
                    this.messages.push({
                        message: e.message.message,
                        user: e.user
                    });
                });
        }
    }
</script>