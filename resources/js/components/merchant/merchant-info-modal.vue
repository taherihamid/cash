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
                                              @submit.prevent="addMerchantIBAN">
                                            <div class="modal-body">

                                                <div class="form-group filelabel-flex">
                                                    <label style="width: 25%">IBAN</label>
                                                    <textarea name="description" class="form form-control"
                                                              v-model="iban"></textarea>
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
                client:{},
                iban:'',
        },
        props: ['client'],
        methods: {
            addMerchantIBAN() {
                this.$emit('update_merchant_info', this.client,this.iban)

            }
        }
    }
</script>
