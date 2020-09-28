<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Private Chat App</div>

                    <ul class="list-group">
                        <a href="" @click.prevent="openChat(friend)" v-for="friend in friends" :key="friend.name">
                            <li class="list-group-item" >
                                {{ friend.name }}
                            </li>
                        </a>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <span  v-for="friend in friends" :key="friend.name" v-if="friend.session">
                    <message-component
                        v-if="friend.session.open"
                        @closeChat="close(friend)"
                        :friend="friend"
                    ></message-component>
                </span>

            </div>
        </div>
    </div>
</template>

<script>
    import MessageComponent from "./MessageComponent";
    export default {
        components: {MessageComponent},
        data(){
            return{
                friends:[],
            }
        },
        created(){
            this.getFriends();
        },
        methods: {
            close(friend){
                friend.session.open = false;
            },
            getFriends(){
                axios.post('/get-friends')
                .then(res => {
                    this.friends = res.data.data;
                })
            },
            openChat(friend){
                this.friends.forEach(friend=>{
                    if (friend.session){
                        friend.session.open = false;
                    }
                })
                if (friend.session){
                    friend.session.open=true;
                }else{
                    this.createSession(friend);
                }
            },
            createSession(friend){
                axios.post('/session/create', {friend_id:friend.id})
                .then(response=> {
                    friend.session = response.data.data;
                    friend.session.open=true;
                })
            }
        }
    }
</script>
