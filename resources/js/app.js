/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('./bootstrap');

window.Vue = require('vue');


import VueAxios from 'vue-axios';
import axios from 'axios';

Vue.use(VueAxios, axios);
import agentTemplate from './components/agent/agent-template.vue';
import merchantTemplate from './components/merchant/merchant-template.vue';
import merchantInfoModal from './components/merchant/merchant-info-modal.vue';
import merchantAcceptedInfoModal from './components/merchant/merchant-accepted-info-modal.vue';
import agentInfoModal from './components/agent/agent-info-modal.vue';
import agentAcceptedInfoModal from './components/agent/agent-accepted-info-modal.vue';


import merchantCashOutForm from './components/merchant/merchant-cash-out-form.vue';
import merchantCashOutInfo from './components/merchant/merchant-cash-out-info.vue';

import agentCashOutForm from './components/agent/agent-cash-out-form.vue';
import agentTopUpForm from './components/agent/agent-top-up-form.vue';
import agentCashOutInfo from './components/agent/agent-cash-out-info.vue';
import topRequestTemplate from './components/topUp/top-request-template.vue';
import merchantIndex from './components/merchant/merchant-index.vue';



import agentSettlementTemplate from './components/settlement/agent-template';
import merchantSettlementTemplate from './components/settlement/merchant-template';
import merchantSettlementInfo from './components/settlement/merchant-settlement-info';
import agentSettlementInfo from './components/settlement/agent-settlement-info';


const Swal = SweetAlert;

var vt = new Vue({
    el: '#kt_wrapper_agent',
    components: {

        'agent-cash-out-form': agentCashOutForm,
        'agent-top-up-form': agentTopUpForm,
        'agent-cash-out-info': agentCashOutInfo,


    },
    data: {
        clients: [],
        requested_amount: '',
        tracking_number: '',
        agent_cash_out_modal: false,

        agent: {}
    },
    mounted() {

    },
    methods: {
        AgentCashInfo(agent, requested_amount) {

            this.agent = agent;
            this.requested_amount = requested_amount;
            this.agent_cash = false;
            this.agent_cash_out_modal = true;

        },
        AgentCashInfoSent(agent, cash_request) {

            this.agent_cash_out_modal = false;
            let currentObj = this;
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            };
            let formData = new FormData();
            formData.append('agent_id', this.agent['id']);
            formData.append('requested_amount', this.requested_amount);

            axios.post('/addAgentCashRequest', formData, config)
                .then(function (response) {
                    const res = response.data.data.code;
                    if(res == 650){
                        Swal.fire(
                            'Error',
                            'The amount You Requested is Higher Than The Wallet limit',
                            'error'
                        );
                    }else{
                        Swal.fire(
                            'Success',
                            'You Request Registered Successfully',
                            'success'
                        );

                    }
                }.bind(this))
                .catch(function (error) {
                    currentObj.output = error;
                });

        },
        AgentTopInfoSent(agent, top_request,tr_number) {


            let currentObj = this;
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            };
            let formData = new FormData();

            formData.append('agent_id', agent['id']);
            formData.append('requested_amount', top_request);
            formData.append('tracking_number', tr_number);

            axios.post('/addAgentTopRequest', formData, config)
                .then(function (response) {

                        Swal.fire(
                            'Success',
                            'You Top Up Request Registered Successfully',
                            'success'
                        );
                    window.location.reload();

                }.bind(this))
                .catch(function (error) {
                    currentObj.output = error;
                });

        },
        closeModal() {
            this.agent_cash_out_modal = false;
        }

    },
});
var vt = new Vue({
    el: '#kt_wrapper_merchant',
    components: {

        'merchant-cash-out-form': merchantCashOutForm,
        'merchant-cash-out-info': merchantCashOutInfo,
        'merchant-index': merchantIndex,


    },
    data: {

        clients: [],
        requested_amount: '',
        merchant_cash_out_modal: false,
        merchant: {}
    },
    mounted() {


    },
    methods: {
        MerchantCashInfo(merchant, requested_amount) {

            this.merchant = merchant;
            this.requested_amount = requested_amount;
            this.merchant_cash_out_modal = true;
        },
        MerchantCashInfoSent(merchant, cash_request) {

            this.merchant_cash_out_modal = false;

            let currentObj = this;
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            };
            let formData = new FormData();

            formData.append('merchant_id', this.merchant['id']);
            formData.append('requested_amount', this.requested_amount);

            axios.post('/addMerchantCashRequest', formData, config)
                .then(function (response) {
                    const res = response.data.data.code;
                    console.log(res)
                    if(res == 650){
                        Swal.fire(
                            'Error',
                            'The amount You Requested is Higher Than The Wallet limit',
                            'error'
                        );
                    }else{
                        Swal.fire(
                            'Success',
                            'You Request Registered Successfully',
                            'success'
                        );
                        window.location.reload();
                    }



                }.bind(this))
                .catch(function (error) {
                    currentObj.output = error;
                });

        },
        closeModal() {
            this.merchant_cash_out_modal = false;
        }

    },
});

var vm = new Vue({
    el: '#kt_wrapper',
    components: {
        'agent-template': agentTemplate,
        'merchant-template': merchantTemplate,
        'merchant-info-modal': merchantInfoModal,
        'merchant-accepted-info-modal': merchantAcceptedInfoModal,

        'merchant-cash-out-form': merchantCashOutForm,
        'merchant-cash-out-info': merchantCashOutInfo,

        'agent-info-modal': agentInfoModal,
        'agent-accepted-info-modal': agentAcceptedInfoModal,
        'top-request-template': topRequestTemplate,

        'agent-settlement-template': agentSettlementTemplate,
        'agent-settlement-info': agentSettlementInfo,
        'merchant-settlement-template': merchantSettlementTemplate,
        'merchant-settlement-info': merchantSettlementInfo,
    },
    data: {
        merchants: [],
        agents: [],

        agent_template: true,
        merchant_template: false,
        agent_template_info: false,
        merchant_template_info: false,
        agent: {},
        merchant: {},
        status_categories: [
            {id: 0, name: "New"},
            {id: 1, name: "Approved"},
            {id: 2, name: "Processing"},
            {id: 3, name: "Rejected"},

        ],
        clients: [],
        topRequests: [],
        selected_status: '',
        agent_client: 0,
        agent_top_request:false,
        merchant_client: 0,
        merchant_info_modal: false,
        merchant_accepted_info_modal: false,
        agent_info_modal: false,
        agent_accepted_info_modal: false,
        merchant_cash_out_modal: true,
        client: {},
        topRequest: {}
    },
    mounted() {

        this.fetchPartnershipRequests();
        this.fetchTopRequests();
    },
    methods: {
        change_status(id) {
            console.log('app : ' + id);
            this.selected_status = id;

        },
        fetchTopRequests() {
            axios.get('/dashboard/top-request-list')
                .then(response => {
                    console.log(response);
                    this.topRequests = response.data.data;

                }).catch(error => {
            });

        },
        fetchPartnershipRequests() {
            axios.get('/dashboard/partnership-request-list')
                .then(response => {
                    console.log(response);
                    this.clients = response.data.data;

                }).catch(error => {
            });

        },
        changeClientStatus(id, partnership_type) {
            var client = this.clients.find(item => item.id === id && item.partnership_type === partnership_type);
            this.client = client;

            if (partnership_type === 0) {
                this.agent_client = 1;
                this.merchant_client = 0;
            } else {
                this.agent_client = 0;
                this.merchant_client = 1;
            }
        },
        changeTopRequestStatus(id) {

            var req = this.topRequests.find(item => item.id === id );
            this.topRequest = req;
            this.agent_top_request = true;

        },
        updateTopRequest(request_id,status){


            let currentObj = this;
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            };
            let formData = new FormData();

            formData.append('top_id', request_id);
            formData.append('status', status);


            axios.post('/dashboard/updateTopRequestStatus', formData, config)
                .then(function (response) {
                    Swal.fire(
                        'Success',
                        'Top Up Status Updated Successfully',
                        'success'
                    );
                    this.fetchTopRequests();
                    this.agent_top_request = false;

                }.bind(this))
                .catch(function (error) {
                    currentObj.output = error;
                });


        },
        ignoreTopRequest(request_id){
            console.log(request_id);

        },
        updateClient(item) {

            let currentObj = this;
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            };
            let formData = new FormData();

            formData.append('client_id', item.id);
            formData.append('partner_type', item.partnership_type);
            formData.append('status', this.selected_status);


            axios.post('/dashboard/updateClientStatus', formData, config)
                .then(function (response) {
                    Swal.fire(
                        'Success',
                        'Partner Status Updated Successfully',
                        'success'
                    );
                    this.fetchPartnershipRequests();
                }.bind(this))
                .catch(function (error) {
                    currentObj.output = error;
                });
        },

        showModalMerchantIBAN(c) {
            this.client = c;
            this.merchant_info_modal = true;

        },
        showModalAgentInfo(c) {
            this.client = c;
            this.agent_info_modal = true;

        },
        /**************** */
        updateMerchantInfo(c, i) {
            let currentObj = this;
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            };
            let formData = new FormData();

            formData.append('client_id', c.id);
            formData.append('IBAN', i);


            axios.post('/dashboard/merchant/updateMerchantInfo', formData, config)
                .then(function (response) {

                    console.log(response);
                    this.client = response.data.data;
                    this.merchant_accepted_info_modal = true;
                    this.merchant_info_modal = false;
                }.bind(this))
                .catch(function (error) {
                    currentObj.output = error;
                });
        },
        /**
         * Send merchant info with email
         * @param  {Object} Merchant object

         * @return
         */
        sentMerchantEmail() {
            this.merchant_accepted_info_modal = false;
            console.log(this.client);
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                body: this.client
            };
            axios.post('/dashboard/merchant/sentMerchantEmail', config)
                .then(function (response) {
                    this.fetchPartnershipRequests();
                    Swal.fire(
                        'Success',
                        'Merchant Information Sent By Email Successfully',
                        'success'
                    );

                }.bind(this))
                .catch(function (error) {
                    currentObj.output = error;
                });

        },
        /**************** */
        updateAgentInfo(c, i, com, ct) {
            let currentObj = this;
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            };
            let formData = new FormData();

            formData.append('client_id', c.id);
            formData.append('IBAN', i);
            formData.append('commission', com);
            formData.append('commission_type', ct);


            axios.post('/dashboard/agent/updateAgentInfo', formData, config)
                .then(function (response) {

                    console.log(response);
                    this.client = response.data.data;
                    this.agent_accepted_info_modal = true;
                    this.agent_info_modal = false;
                }.bind(this))
                .catch(function (error) {
                    currentObj.output = error;
                });
        },
        /**
         * Send merchant info with email
         * @param  {Object} agent object

         * @return
         */
        sentAgentEmail() {
            this.agent_accepted_info_modal = false;
            console.log(this.client);
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                body: this.client
            };
            axios.post('/dashboard/agent/sentAgentEmail', config)
                .then(function (response) {
                    this.fetchPartnershipRequests();
                    Swal.fire(
                        'Success',
                        'Agent Information Sent By Email Successfully',
                        'success'
                    );

                }.bind(this))
                .catch(function (error) {
                    currentObj.output = error;
                });

        },
        showAgentSettInfo(agentRequest){
            this.agent = agentRequest;
            this.agent_template_info = true;

        },
        updateAgentCashRequest(id){
            let currentObj = this;
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            };
            let formData = new FormData();

            formData.append('cash_id',id);

            axios.post('/dashboard/agent/updateSettlementRequest', formData, config)
                .then(function (response) {

                    Swal.fire(
                        'Success',
                        'Settlement Request Status Updated Successfully',
                        'success'
                    );
                    this.agent_template_info = false;
                    window.location.reload();
                }.bind(this))
                .catch(function (error) {
                    currentObj.output = error;
                });

        }
        ,
        showAgentTemplate(){
            console.log('showAgentTemplate');
                    this.agent_template = true;
                    this.merchant_template = false;
            // axios.get('/dashboard/merchant/fetchSettlementRequest')
            //     .then(function (response) {
            //         console.log(response.data)
            //         this.merchants = response.data.data;
            //         this.agent_template = false;
            //         this.merchant_template = true;
            //
            //     }.bind(this))
            //     .catch(function (error) {
            //         currentObj.output = error;
            //     });

        },
        showMerchantTemplate(){
             console.log('showMerchantTemplate');
            axios.get('/dashboard/merchant/fetchSettlementRequest')
                .then(function (response) {
                    console.log(response.data)
                    this.merchants = response.data.data;
                    this.agent_template = false;
                    this.merchant_template = true;

                }.bind(this))
                .catch(function (error) {
                    currentObj.output = error;
                });

        },
        showMerchantSettInfo(merchantRequest){
            this.merchant = merchantRequest;
            this.merchant_template_info = true;
        },
        updateMerchantCashRequest(id){
            let currentObj = this;
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            };
            let formData = new FormData();

            formData.append('cash_id',id);

            axios.post('/dashboard/merchant/updateSettlementRequest', formData, config)
                .then(function (response) {

                    Swal.fire(
                        'Success',
                        'Settlement Request Status Updated Successfully',
                        'success'
                    );
                    this.agent_template_info = false;
                    window.location.reload();
                }.bind(this))
                .catch(function (error) {
                    currentObj.output = error;
                });
        }
    },
});
