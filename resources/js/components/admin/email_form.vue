<template>
    <div id="main-content">
<!--       <div class="page-heading">-->
<!--           <div class="page-title">-->
<!--               <div class="row">-->
<!--                   <div class="col-12 col-md-12 order-md-1 order-last">-->
<!--                       <h3>Email</h3>-->
<!--                   </div>-->
<!--                   <div class="col-12 col-md-6 order-md-2 order-first">-->
<!--                       <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">-->
<!--                           <ol class="breadcrumb">-->
<!--                               <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>-->
<!--                               <li class="breadcrumb-item active" aria-current="page">Email</li>-->
<!--                           </ol>-->
<!--                       </nav>-->
<!--                   </div>-->
<!--               </div>-->
<!--           </div>-->
<!--       </div>-->
       <div class="page-content">
           <section>
               <div class="row">
                   <div class="col-xxl-12 col-lg-12">
                       <div class="card sticky-top">
                           <div class="card-body">
                               <form action="">
                                   <div class="form-floating mb-3">
                                       <input type="text" class="form-control" v-model="mail.mail_title" name="mail_title" id="title" placeholder="Title">
                                       <label for="title">Title</label>
                                   </div>
                                   <div class="form-floating mb-3">
                                       <textarea class="form-control" v-model="mail.mail_content" placeholder="Message" name="mail_content" id="message" style="height: 150px"></textarea>
                                       <label for="message">Message</label>
                                   </div>
                                   <button type="button" @click="save" class="btn btn-primary">Send Mail</button>
                               </form>
                           </div>
                       </div>
                   </div>
               </div>
           </section>
       </div>
   </div>
</template>

<script>
    export default {
        name: "admin-email-form",
        data() {
            return {
                mail_title: "",
                mail_content:"",
                mail: {
                    mail_title: "",
                    mail_content: "",
                    user_id: this.user_id,
                },
                //isEditing: false,
                temp_id: null
            }
        },
        mounted() {
            this.fetchAll()
        },
        methods:{
            //all data get
            fetchAll() {
                let base_url;
                axios.get(base_url+'/admin/adminMessage')
                    .then((res)=>{
                        //console.log(res.data);
                        if(res.data){
                            this.mail.user_id = res.data.user_id;
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
                let base_url;
                let url = base_url+"/admin/send-mail"
                toastr.success('Email Send to Customer Successfully');
                try {
                    method(url, this.mail)
                        .then(res => {
                            this.fetchAll()
                            this.mail = {
                               // mail_title: "",
                            }
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



