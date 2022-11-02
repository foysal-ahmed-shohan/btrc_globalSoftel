<template>
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
<!--                                <p>{{ message.date }} {{ message.time }}</p>-->
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

<!--            <div class="page-content">-->
<!--                <section>-->
<!--                    <div class="row">-->
<!--                        <div class="col-xxl-12 col-lg-12">-->
<!--                            <div class="card sticky-top">-->
<!--                                <div class="card-body">-->
<!--                                    <form action="">-->
<!--                                        <div class="form-floating mb-3">-->
<!--                                            <input type="text" class="form-control" v-model="mail.mail_title" name="mail_title" id="title" placeholder="Title">-->
<!--                                            <label for="title">Title</label>-->
<!--                                        </div>-->
<!--                                        <div class="form-floating mb-3">-->
<!--                                            <textarea class="form-control" v-model="mail.mail_content" placeholder="Message" name="mail_content" id="message" style="height: 150px"></textarea>-->
<!--                                            <label for="message">Message</label>-->
<!--                                        </div>-->
<!--                                        <button type="submit" class="btn btn-primary">Send Mail</button>-->
<!--                                    </form>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </section>-->

        </div>
</template>

<script>
export default {
    name: "admin-message",
    data() {
        return {
            lists: [],
            user_info:"",
            item: {
                message: "",
                user_info: "",
                user_id: this.user_id,
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
            let base_url='http://localhost/project/voice_pro_llc/public';
            axios.get(base_url+'/admin/adminMessage')
                .then((res)=>{
                     //console.log(res.data);
                    if(res.data){
                        this.lists = res.data.message;
                        this.user_info = res.data.user_info;
                        this.item.user_id = res.data.user_id;
                    }
                })
                .catch(error => {
                    // this.loaderStartStop('stop');
                    //document.getElementById("main-search-content").innerHTML = this.setErrorMsg(null);
                });
        },
        //****************save
        save() {
            // alert("I am an alert box!");
            let method = axios.post
            let base_url='http://localhost/project/voice_pro_llc/public';
            let url = base_url+"/admin/adminMessage"
            // toastr.success('you are logged in');
            if (this.temp_id) {
                method = axios.put
                url = base_url+`/admin/adminMessage/${this.temp_id}`
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







<!--// try {-->
<!--//     axios.get('http://localhost/project/voice_pro_llc/public/admin/adminMessage')-->
<!--//         .then(res => this.lists = res.data.message)-->
<!--// } catch (e) {-->
<!--//     console.log(e)-->
<!--// }-->
<!--// try {-->
<!--//     axios.get('http://localhost/project/voice_pro_llc/public/admin/adminMessage')-->
<!--//         .then(res => this.user_info = res.data.user_info)-->
<!--// } catch (e) {-->
<!--//     console.log(e)-->
<!--// }-->
<!--// try {-->
<!--//     axios.get('http://localhost/project/voice_pro_llc/public/admin/adminMessage')-->
<!--//         .then(res => this.item.user_id = res.data.user_id)-->
<!--// } catch (e) {-->
<!--//     console.log(e)-->
<!--// }-->

