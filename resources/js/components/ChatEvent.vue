<template>
    <div>
        <chat-log :messages="messages"></chat-log>
        <chat-composer :user="user" @messagesent="addMessage"></chat-composer>
    </div>
</template>

<script>
    export default {
        props: ['chatid', 'user'],
        data() {
            return {
                messages: []
            }
        },
        mounted() {
            axios.post(`/chat/${this.chatid}/messages`).then(response => {
                this.messages = response.data;
            });
        },
        methods: {
            addMessage (message) {
                this.messages.push(message);

                axios.post(`/chat/${this.chatid}/message-create`, message).then(response => {
                    //
                });
            }
        },
        created () {
            Echo.private(`chat.${this.chatid}`)
                .listen('ChatMessageEvent', (e) => {
                    this.messages.push({
                        message: e.message.message,
                        user: e.user
                    });
                });
        }
    }
</script>