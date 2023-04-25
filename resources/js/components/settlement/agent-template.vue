<template>
    <table class="table table-hover table-checkable" id="kt_datatable"
           style="margin-top: 13px !important">
        <thead>
        <tr>


            <th>Agents</th>
            <th>Wallet Amount</th>

            <th>Request Status</th>

            <th>Request</th>
            <th>Actions</th>

        </tr>
        </thead>

        <tbody>
                <template v-for="req in s_reqs">

                    <tr v-on:click="showAgentSett(req)"
                        style="cursor: pointer">


                        <td style="text-align: center">{{req.agent.full_name}}</td>
                        <td style="text-align: center">{{req.agent.wallet}}</td>
                        <td style="text-align: center">


                            <template v-if="req.status == 0">
                                                        <span class="label label-gray label-inline mr-2 scan-button"
                                                              style="border-radius: 20px;height: 35px;font-size: 13px">In Progress
                                                        </span>
                            </template>
                            <template v-if="req.status == 1">
                                                        <span class="label label-gray label-inline mr-2 scan-button"
                                                              style="border-radius: 20px;height: 35px;font-size: 13px">Paid
                                                        </span>
                            </template>
                            <template v-if="req.status == 2">
                                                        <span class="label label-gray label-inline mr-2 scan-button"
                                                              style="border-radius: 20px;height: 35px;font-size: 13px">Ignored
                                                        </span>
                            </template>

                        </td>
                        <td style="text-align: center">{{req.requested_amount}}</td>
                        <td style="text-align: center"><i
                                class="menu-icon flaticon2-menu-1"></i>
                        </td>

                    </tr>
                </template>

        </tbody>
    </table>
</template>

<script>
    export default {
        mounted() {


        },
        data() {
            return {


            };
        },
        props: ['s_reqs'],
        methods: {
            showAgentSett: function(agentRequest) {

                this.$emit('agent-show-sett-info',agentRequest)
            }

        }
    }
</script>
