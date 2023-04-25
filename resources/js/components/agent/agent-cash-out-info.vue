<template>
    <div class="modal" id="myModal" style="display: block;background-color: rgba(0, 0, 0, 0.3);">
        <div class="modal-dialog" style="width: 90%;height: 82vh;top:10%;overflow-y: auto;">
            <div class="modal-content" style="border-radius:3%!important">
                <div class="modal-header" style="height: 40px">
                    <button type="button" class="close"  @click="$emit('close')" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <div class=" line">
                        <div class="text-center" style="padding: 8px">
                            <div class="appointment-form">
                                <div class="form">
                                    <fieldset>

                                        <h3>Confirmation</h3>


                                            <div class="modal-body">
                                                <div class="row mb-5">

                                                    The requested amount will be sent to the account with the following IBAN

                                                </div>
                                                <div class="row mb-5">

                                                    <div class="col" style="color: #8B91A0">IBAN</div>
                                                    <strong class="col"
                                                            style="text-align: left">{{agent.IBAN}}</strong>
                                                    <hr style="border-width:0; margin: 10px">

                                                </div>

                                                <div class="row mb-5">

                                                    <div class="col" style="color: #8B91A0">Personal ID</div>
                                                    <strong class="col"
                                                            style="text-align: left">{{requested_amount}} $</strong>
                                                    <hr style="border-width:0; margin: 10px">

                                                </div>


                                            </div>
                                        <div class="col-xs-1" align="center" style="margin-bottom: 50px">
                                            <button @click="sendAgentRequest" class="btn btn-outline-primary" style="width: 200px; border-radius: 20px;">Confirm</button>
                                            <button @click="closeModal" type="button" class="btn btn-outline-primary" style="width: 200px; border-radius: 20px;">Cancel</button>
                                        </div>


                                    </fieldset>
                                </div>
                            </div>

                        </div>
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

        props: ['agent','requested_amount'],
        methods: {
            sendAgentRequest() {

                this.$emit('agent_cash_info_sent', this.agent,this.requested_amount)

            },
            closeModal() {
                this.$emit('close_modal')

            }
        }
    }
</script>
