<template>
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Message</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Message</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-content">
            <div class="card">
                <div class="card-header shadow py-3">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
<!--                            {{&#45;&#45;                  <img src="{{asset('user/assets/public/images/faces/7.jpg')}}" width="40" class="rounded-circle" alt="face">&#45;&#45;}}-->
                            <div class="ms-3">
                                <h6 class="mb-0">{{ user_info.f_name }} {{ user_info.l_name }}</h6>
                                <p class="text-muted mb-0"><small>Last message 10 mins ago</small></p>
                            </div>
                        </div>
                        <div class="dropdown me-3">
                            <button class="icon-item icon-item-sm" type="button" data-bs-toggle="dropdown" aria-expanded="true">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu shadow" style="min-width: 10rem;" data-popper-placement="bottom-end">
                                <li><a class="dropdown-item" href="#!">Mute</a></li>
                                <li><a class="dropdown-item" href="#!">Archive</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><button class="dropdown-item text-danger" href="#!">Delete</button></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body chat-body d-flex flex-column w-100 pt-4 overflow-auto">
                    <div class="w-100 d-flex flex-column" v-for="message in lists" :key="message.id">
                        <!-- Opponent Text -->
<!--                        <div class="mb-3" v-if="message.user_id == Auth::user()->id && message.message_type == '0'">-->
                        <div class="mb-3" v-if="message.user_id === user_info.id  && message.message_type === 1">
                            <div class="bg-200 px-3 py-2 rounded-pill d-inline-block">
<!--                                Hello! How are you? 😊-->
                                {{ message.message }}
                            </div>
                        </div>
                        <!-- My Text -->
                        <div class="mb-3 ms-auto" v-if="message.user_id === user_info.id && message.message_type === 0">
                            <div class="bg-primary text-white px-3 py-2 rounded-pill d-inline-block">
                                {{ message.message }}
                            </div>
                        </div>
                        <!-- Outside the loop -->
                        <div id="last-message"></div>
                    </div>
                </div>
                <div class="card-footer border-top-0">
<!--                    action="{{route('userMessage.store')}}" @csrf methode="GET"-->
                    <form>
                        <div class="bg-100 rounded-pill ps-3 pe-5 py-2 position-relative">
                            <input type="text" required v-model="item.message" name="message" class="form-control bg-transparent border-0" placeholder="Type a message">
                            <button type="button"  @click="save" class="btn btn-link position-absolute end-0 top-50 translate-middle-y me-2"><i class="fas fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "user-message",
    data() {
        return {
            lists: [],
            user_info:"",
            item: {
                message: "",
                success: "",
                user_info: "",
            },
            //isEditing: false,
            temp_id: null
        }
    },
    mounted() {
        this.fetchAll()
    },
    methods: {
        //all data get
        fetchAll() {
            let base_url;
            try {
                axios.get(base_url+'/user/userMessage')
                     .then(res => this.lists = res.data.message, res => this.user_info = res.data.user_info)
                    // .then(res => this.user_info = res.data.user_info)
            } catch (e) {
                console.log(e)
            }
            try {
                axios.get(base_url+'/user/userMessage')
                    .then(res => this.user_info = res.data.user_info)
                // .then(res => this.user_info = res.data.user_info)
            } catch (e) {
                console.log(e)
            }
        },
        //****************save
        save() {
            // alert("I am an alert box!");
            let method = axios.post
            let base_url;
            let url = base_url+"/user/userMessage"
            if (this.temp_id) {
                method = axios.put
                url = base_url+`/user/userMessage/${this.temp_id}`
            }
            try {
                method(url, this.item)
                    .then(res => {
                        this.fetchAll()
                        this.item = {
                            message: "",
                        }
                        this.temp_id = null
                        this.isEditing = false
                    })
            } catch (e) {
                console.log(e)
            }
        },
        //end
    }
}
</script>
<style scoped>
</style>

