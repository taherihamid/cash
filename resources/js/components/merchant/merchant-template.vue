<template>
    <div class="col" style="margin-top:40px; margin-bottom: 50px">
        <div class="row">

            <div class="col-12">
                <div class="col">
                    <div class="row">

                        <div class="col" style="color: #8B91A0">Partnership Type</div>
                        <strong class="col" style="text-align: right">As an Merchant</strong>
                        <hr style="border-width:0; margin: 10px">

                    </div>


                    <strong class="col" style="margin-left:30%; text-align: right">Personal Data</strong>


                    <div class="row">

                        <div class="col" style="color: #8B91A0">Full Name</div>
                        <strong class="col" style="text-align: right">{{client.full_name}}</strong>
                        <hr style="border-width:0; margin: 10px">

                    </div>
                    <hr>
                    <div class="row">

                        <div class="col" style="color: #8B91A0">Phone number</div>
                        <strong class="col" style="text-align: right">{{client.phone}}</strong>
                        <hr style="border-width:0; margin: 10px">

                    </div>
                    <hr>
                    <div class="row">

                        <div class="col" style="color: #8B91A0">Email</div>
                        <strong class="col" style="text-align: right">{{client.email}}</strong>
                        <hr style="border-width:0; margin: 10px">

                    </div>


                    <hr>


                    <form method="POST" @submit.prevent="clientUpdate" enctype="multipart/form-data">


                        <select  @input="setCategoryId($event.target.value)" class="form-control form-input">
                            <option v-for="cat in status_categories"
                                    :value="cat.id"
                                    :selected="cat.id == client.status"
                                    >
                                {{cat.name}}
                            </option>

                        </select>

                        <div v-show="client.status != 2" class="row" style="margin-top: 10px">
                            <button class="btn btn-primary"
                                    style="margin-bottom:10%;border-radius: 20px;width: 90%;margin-left: 5%;"
                                    type="submit">Confirm
                            </button>
                        </div>
                    </form>

                    <div v-show="client.status == 2" class="row" style="margin-top: 10px">
                        <button class="btn btn-primary" v-on:click="updateMerchantIban(client)"
                                style="margin-bottom:10%;border-radius: 20px;width: 90%;margin-left: 5%;">
                            Complete Information
                        </button>
                    </div>

                    <strong class="col" style="margin-top:2% ;margin-left:30%; text-align: right">Business Data</strong>
                    <div class="row">

                        <div class="col" style="color: #8B91A0">Business</div>
                        <strong class="col" style="text-align: right">{{client.business}}</strong>
                        <hr style="border-width:0; margin: 10px">

                    </div>
                    <hr>
                    <div class="row">

                        <div class="col" style="color: #8B91A0">Business Detail</div>
                        <strong class="col" style="text-align: right">{{client.business_detail}}</strong>
                        <hr style="border-width:0; margin: 10px">

                    </div>
                </div>
            </div>


        </div>


    </div>
</template>

<script>
    export default {
        mounted() {


        },
        data() {
            return {
                client,

            };
        },
        props: ['client','status_categories','selected_status'],
        methods: {
            clientUpdate() {
                this.$emit('update', this.client);
            },
            setCategoryId: function(categoryId) {

                this.$emit('change_status', parseInt(categoryId))
            }
            ,
            updateMerchantIban: function(client) {

                this.$emit('show_merchant_info_modal', client)
            }

        }
    }
</script>
