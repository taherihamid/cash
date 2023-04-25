<template>
    <div>
        <label><strong>Filter</strong></label>
        <form class="kt-form kt-form--fit mb-15">
            <div class="row mb-8">
                <div class="col-lg-1  mb-lg-0 mb-6">
                    <label>Status</label>
                </div>
                <div class="col-lg-3  mb-lg-0 mb-6">

                    <select class="form-control datatable-input" data-col-index="6" v-model="status"
                            @change="filterStatus">
                        <option value="1">Done</option>
                        <option value="0">Pending</option>
                    </select>
                </div>
                <div class="col-lg-3  mb-lg-0 mb-6">
                    <button type="submit" class="btn btn-outline-primary" style="width: 200px; border-radius: 20px;">
                        Filter
                    </button>
                </div>
            </div>
        </form>
        <!--begin: Datatable-->

        <!--begin: Datatable-->
        <table class="table table-hover table-checkable" id="kt_datatable"
               style="margin-top: 13px !important">
            <thead>
            <tr>
                <th>Invoice No</th>
                <th>Paid</th>
                <th>Description</th>
                <th>Status</th>
                <th>Amount</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>
            <template v-for="invoice in posts">
                <tr :key="invoice.id">
                    <td>{{invoice.invoice_no}}</td>
                    <td>{{invoice.order_date}}</td>
                    <td>{{invoice.description}}</td>

                    <td> <span :class="{'label-success': invoice.order_status == 1}"
                               class="label label-inline mr-2 scan-button" style="border-radius: 20px">
                                <template v-if="invoice.order_status == 1">
                                    Done
                                </template>
                                <template v-if="invoice.order_status == 0">
                                    Pending
                                </template>
                        </span>
                    </td>
                    <td>{{invoice.amount_to_pay}}</td>
                    <td nowrap></td>
                </tr>
            </template>
            </tbody>

        </table>
    </div>

</template>

<script>
    export default {
        props: ['invoices'],
        data() {
            return {
                posts: this.invoices,
                status: '',
            }
        },
        methods: {

            filterStatus() {
                axios.post('/merchantIndexFilter', {status: this.status})
                    .then(function (response) {
                        this.posts = response.data.data;

                    }.bind(this))
                    .catch(function (error) {
                        currentObj.output = error;
                    });
            }
        },
        mounted() {

        }
    }
</script>
