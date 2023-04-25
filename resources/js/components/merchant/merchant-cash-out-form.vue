<template>



    <div class=" container " style="background-color: white">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-10">

                    <div class="col">
                        <div style="background-color: #EEF0F8; border-radius: 10px; margin-top:30px; padding: 20px">

                            <div style="color: orangered; font-size: 16px">
                                <i class="bi bi-exclamation-circle"
                                   style="color: orangered"></i>
                                The requested amount will be sent to the account with the
                                following IBAN
                            </div>

                        </div>
                    </div>


                    <div class="col" style="margin-top:40px; margin-bottom: 50px">
                        <div class="row">

                            <div class="col-6" style="padding:30px">

                                <div class="row mb-5">

                                    <div class="col" style="color: #8B91A0">IBAN
                                    </div>
                                    <strong class="col"
                                            style="text-align: right"></strong>


                                </div>

                                <hr style="border-width:0; margin: 10px">

                                <form name="contact" role="form" method="POST"
                                      @submit.prevent="addMerchantCashRequest">
                                <div class="row">

                                    <label for="requested_amount">Requested Amount</label>
                                    <div class="form mb-5" style="width: 100%"><input v-model="rq_amount"
                                            type="number"
                                            name="requested_amount"
                                            class="form-control form-input"
                                            placeholder="Requested Amount"></div>

                                    <button
                                            class="btn btn-outline-primary"
                                            style="width: 100%; border-radius: 20px;">
                                        Confirm
                                    </button>


                                </div>
                                </form>


                            </div>
                            <div class="col-4" style="margin-left: 10%">


                                <div class="sidbarBottom">

                                    <div class="container">
                                        <div class="row">

                                            <div class="col-sm-12 mb-3" style="margin-left: 10px;">

                                                <p style="font-size: 15px; color: rgb(36, 36, 36); ">Wallet Amount</p>

                                            </div>
                                            <div class="col-sm-12 mb-3" style="margin-left: 10px;">

                                                <p style="font-size: 25px; color: rgb(36, 36, 36); ">{{merchant.total_balance}} $</p>

                                            </div>
                                            <div class="col-sm-12" style="margin-left: 10px;">

                                                <p style="font-size: 11px; color: rgb(36, 36, 36); ">Your Last Cash Out : March 12, 2021</p>

                                            </div>

                                        </div>

                                    </div>
                                </div>



                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <!----------------------------------------------------------------------------------------------------------------------------------------------------->
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {


        },
        data() {
            return {
                rq_amount: this.requested_amount,
            };
        },
        props: ['requested_amount','merchant'],
        methods: {

            addMerchantCashRequest: function() {
                console.log(this.requested_amount);
                this.$emit('merchant_cash_info',this.merchant, this.rq_amount);


            }

        }
    }
</script>
