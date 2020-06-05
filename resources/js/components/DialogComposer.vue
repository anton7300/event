<template>
    <div class="composer">
        <input placeholder="Start typing your message..." v-model="messageText" @keyup.enter="sendMessage">
        <button @click="sendMessage">Send</button>
    </div>
</template>

<script>
    export default {
        props: ['user'],
        data () {
            return {
                messageText: ''
            }
        },
        methods: {
            sendMessage () {
                this.$emit('messagesent', {
                    message: this.messageText,
                    user: {
                        name: this.$options.propsData.user.name
                    }
                });
                this.messageText = '';
            }
        }
    }
</script>