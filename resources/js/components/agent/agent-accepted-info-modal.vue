<template>
    <div class="modal" id="myModal" style="display: block;background-color: rgba(0, 0, 0, 0.3);">
        <div class="modal-dialog" style="width: 80%;height: 82vh;top:10%;overflow-y: auto;">
            <div class="modal-content" style="border-radius:3%!important">
                <div class="modal-header" style="height: 40px">
                    <button type="button" class="close" @click="$emit('close')" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <div class=" line">
                        <div class="text-center" style="padding: 8px">
                            <div class="appointment-form">
                                <div class="form">
                                    <fieldset>

                                        <h3>Personal ID & Password generated</h3>


                                            <div class="modal-body">

                                                <div class="row">

                                                    <div class="col" style="color: #8B91A0">Agent</div>
                                                    <strong class="col"
                                                            style="text-align: right">{{client.full_name}}</strong>
                                                    <hr style="border-width:0; margin: 10px">

                                                </div>
                                                <hr>
                                                <div class="row">

                                                    <div class="col" style="color: #8B91A0">Personal ID</div>
                                                    <strong class="col"
                                                            style="text-align: right">{{client.personal_id}}</strong>
                                                    <hr style="border-width:0; margin: 10px">

                                                </div>
                                                <hr>
                                                <div class="row">

                                                    <div class="col" style="color: #8B91A0">Password</div>
                                                    <strong class="col"
                                                            style="text-align: right">{{client.pass_key}}</strong>
                                                    <hr style="border-width:0; margin: 10px">

                                                </div>
                                                <hr>


                                            </div>

                                            <button @click="sendAgentEmail"class="btn btn-primary"
                                                    style="margin-bottom:10%;border-radius: 20px;width: 90%;margin-left: 5%;"
                                                    >Send SMS & Email
                                            </button>

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
        data: {
            client: {},

        },
        props: ['client'],
        methods: {
            sendAgentEmail() {
                this.$emit('sent_agent_email', this.client)

            }
        }
    }
</script>
