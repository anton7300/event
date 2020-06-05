<template>
    <div class="chat-log">
        <dialog-message v-for="(message, key) in messages" :message="message" :key="key"></dialog-message>
        <div v-show="messages.length === 0">Nothing here yet!</div>
    </div>
</template>

<script>
    export default {
        props: ['messages']
    }
</script>