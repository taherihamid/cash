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
                                After transferring the required amount to the following IBAN, enter the tracking
                                Number and click the send button
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
                                      @submit.prevent="addAgentTopRequest">
                                    <div class="row">

                                        <label for="requested_amount">Requested Amount</label>
                                        <div class="form mb-5" style="width: 100%">
                                            <input v-model="rq_amount"
                                                   type="number"
                                                   name="requested_amount"
                                                   class="form-control form-input"
                                                   placeholder="Requested Amount">
                                        </div>
                                        <label for="tracking_number">Tracking Number</label>
                                        <div class="form mb-5" style="width: 100%">
                                            <input v-model="tr_number"
                                                   type="text"
                                                   name="tracking_number"
                                                   class="form-control form-input"
                                                   placeholder="Tracking Number">
                                        </div>

                                        <button
                                                class="btn btn-outline-primary"
                                                style="width: 100%; border-radius: 20px;">
                                            Confirm
                                        </button>


                                    </div>
                                </form>


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
                rq_amount:this.requested_amount,
                tr_number: this.tracking_number,
            };
        },
        props: ['requested_amount', 'agent','tracking_number'],
        methods: {

            addAgentTopRequest: function () {
                console.log(this.requested_amount);
                this.$emit('agent_top_info', this.agent, this.rq_amount,this.tr_number);


            }

        }
    }
</script>
