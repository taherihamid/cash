<template>
    <div class="col" style="margin-top:40px; margin-bottom: 50px">
        <div class="row">

            <div class="col-12">
                <div class="col">
                    <div class="row">

                        <div class="col" style="color: #8B91A0">Agent</div>
                        <strong class="col" style="text-align: right">{{top_request.agent.full_name}}</strong>
                        <hr style="border-width:0; margin: 10px">

                    </div>
                    <hr>
                    <div class="row mb-2">

                        <div class="col" style="color: #8B91A0">Credit Limit</div>
                        <strong class="col" style="text-align: right">{{top_request.agent.credit_limit}} $ </strong>
                        <hr style="border-width:0; margin: 10px">

                    </div>
                    <hr>
                    <div class="row mb-2">

                        <div class="col" style="color: #8B91A0">Remaining Credit</div>
                        <strong class="col" style="text-align: right">{{top_request.agent.remaining_credit}} $ </strong>
                        <hr style="border-width:0; margin: 10px">

                    </div>
                    <hr>
                    <div class="row mb-2">

                        <div class="col" style="color: #8B91A0">Available Credit (Today)</div>
                        <strong class="col" style="text-align: right">{{top_request.agent.credit_limit +
                            top_request.requested_amount}} $ </strong>
                        <hr style="border-width:0; margin: 10px">

                    </div>
                    <hr>
                    <div class="row mb-2">

                        <div class="col" style="color: #8B91A0">Request Date & Time</div>
                        <strong class="col" style="text-align: right">{{top_request.created_at}}</strong>
                        <hr style="border-width:0; margin: 10px">

                    </div>
                    <hr>
                    <div class="row mb-2">

                        <div class="col" style="color: #8B91A0">Requested Amount</div>
                        <strong class="col" style="text-align: right;color:red">{{top_request.requested_amount}}
                            $ </strong>
                        <hr style="border-width:0; margin: 10px">

                    </div>
                    <hr>
                    <div class="row mb-5">

                        <div class="col" style="color: #8B91A0">Tracking Number</div>
                        <strong class="col" style="text-align: right">{{top_request.tracking_number}} </strong>
                        <hr style="border-width:0; margin: 10px">

                    </div>

                    <button class="btn btn-primary" v-on:click="updateTopRequest(1)"
                            style="margin-bottom:3%;border-radius: 20px;width: 90%;margin-left: 5%;"
                            type="submit">Top-Up
                    </button>

                    <button class="btn btn-primary" v-on:click="updateTopRequest(2)"
                            style="margin-bottom:10%;border-radius: 20px;width: 90%;margin-left: 5%;color:#3699FF!important;background: transparent;">
                        Ignore
                    </button>
                </div>
            </div>


        </div>


    </div>
</template>

<script>
    export default {
        mounted() {
        },

        props: ['top_request'],
        methods: {
            updateTopRequest(status) {
                this.$emit('update-top-request', this.top_request.id, status);
            },
        }
    }
</script>
