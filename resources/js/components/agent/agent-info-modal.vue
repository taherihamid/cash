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

                                        <h3>Complete Information</h3>

                                        <form id="contactForm" name="contact" role="form" method="POST"
                                              @submit.prevent="addAgentIBAN">
                                            <div class="modal-body">

                                                <div class="row">
                                                    <label style="width: 25%">IBAN</label>
                                                    <div class="col-md-10 mb-1">
                                                        <input class="form-control h-auto-a form-control-solid py-4 px-8"
                                                               type="text" placeholder="IBAN" name="iban" v-model="iban"
                                                               required/>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label style="width: 35%">Commission</label>
                                                    <div class="col-md-10 mb-1">

                                                        <input class="form-control h-auto-a form-control-solid py-4 px-8"
                                                               type="text" placeholder="Commission" v-model="commission"
                                                               name="commission" required/>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-sm-4" style="margin-left: -17%">
                                                        <select class="form-control" name="commission_type"
                                                                v-model="commission_type" required>
                                                            <option value="0">$</option>
                                                            <option value="1">%</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

                                            <button class="btn btn-primary"
                                                    style="margin-bottom:10%;border-radius: 20px;width: 90%;margin-left: 5%;"
                                                    type="submit">Confirm
                                            </button>

                                        </form>
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
            iban: '',
            commission: '',
            commission_type: '',
        },
        props: ['client'],
        methods: {
            addAgentIBAN() {
                this.$emit('update_agent_info', this.client, this.iban, this.commission, this.commission_type)

            }
        }
    }
</script>
