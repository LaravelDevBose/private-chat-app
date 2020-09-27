<template>
    <div class="card card-default chat-box" >
        <div class="card-header">
            <b :class="{'text-danger': session_block}">
                User name
                <span v-if="session_block">(Blocked)</span>
            </b>
            <a href="" @click.prevent="close()" >
                <i class="fas fa-times float-right"></i>
            </a>
            <div class="dropdown float-right mr-4">
                <a href="" class="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#" v-if="session_block" @click.prevent="unBlock()">Unblock</a>
                    <a class="dropdown-item" href="#" v-else @click.prevent="block()">Block</a>
                    <a class="dropdown-item" href="#" @click.prevent="clearChat()">Clear Chat</a>
                </div>
            </div>

        </div>
        <div class="card-body" v-chat-scroll>
            <p class="card-text" v-for="(chat, index) in chats" :key="index">{{ chat.message }}</p>
        </div>
        <form action="" class="card-footer" @submit.prevent="send">
            <div class="form-group">
                <input type="text" name="" class="form-control" id="" :disabled="session_block" placeholder="Write your message..">
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "MessageComponent",
    data(){
      return{
          chats: [],
          session_block: false,
      }
    },
    methods:{
        send(){
            console.log('yeeee');
        },
        close(){
            this.$emit('closeChat');
        },
        clearChat(){
            this.chats = [];
        },
        block(){
            this.session_block = true;
        },
        unBlock(){
            this.session_block = false;
        }
    },
    created() {
        this.chats.push(
            {message: 'hi'},
            {message: 'Hlw'},
            {message: 'how are You?'},
            {message: 'fine'},
            {message: 'Hlw'},
            {message: 'how are You?'},
            {message: 'fine'},
            {message: 'Hlw'},
            {message: 'how are You?'},
            {message: 'fine'},
            {message: 'Hlw'},
            {message: 'how are You?'},
            {message: 'fine'},
            {message: 'Hlw'},
            {message: 'how are You?'},
            {message: 'fine'},
            {message: 'bottom'},
        )
    }
}
</script>

<style scoped>
    .chat-box{
        height: 400px;
    }
    .card-body{
        overflow-y: scroll;
    }
</style>
