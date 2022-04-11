<template>


    <div class=" container-sm p-3">
        <div class="card border-primary ">
            <div class="card-body">

                <form>

                    <div class="form-group">
                        <label class="m-1">Discount</label>
                        <input class="form-control" v-model="fields.discount" placeholder="Enter discount">
                    </div>

                    <div class="form-group">
                        <label class="m-1">Customer</label>
                        <select class="form-control" v-model="fields.customer_id" >
                            <option v-for="customer in customers" :value="customer.id"> {{ customer.name }}</option>
                        </select>
                    </div>


                    <button type="submit" class="btn btn-primary" @click="submit">Submit</button>


                </form>

                <table class="table table-responsive-lg">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Discount</th>
                        <th></th>
                    </tr>
                    </thead>



                    <tbody>

                    <tr v-for="invoice in invoices" :value="invoice.id" v-on:click="clickList(invoice.id)" >
                        <td>{{ invoice.id }}</td>
                        <td>{{ invoice.customer_id}}</td>
                        <!-- Pokazi sa pri rozhodenom poradi ideciek.. treba fix -->
                        <td>{{ invoice.discount+"%" }}</td>
                        <td>
                            <button class="btn btn-danger" @click="deleteI(invoice.id)">Delete</button>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>


</template>

<script>

import axios from "axios";

export default {

    name: "Invoices",

    data() {
        return {
            invoices: [],
            customers: [],

            fields: {
                discount: '',
                customer_id: '',
            }
        }
    },

    mounted() {
        this.loadInvoices();
        this.loadCustomers();

    },

    methods: {

        loadInvoices:function (){
            axios.get("http://localhost/workproject/public/api/invoices").then(response => {
                this.invoices = response.data;
            }).catch(function (error) {
                console.log(error);
            });
        },

        loadCustomers: function () {
            axios.get("http://localhost/workproject/public/api/customers").then(response => {
                this.customers = response.data;
            }).catch(function (error) {
                console.log(error);
            });
        },

        deleteI:function (id){
            axios.delete(`./api/invoices/delete/${id}`).then(() => {
                window.location.reload()
            }).catch(function (error) {
                console.log(error);
            });
        },

        submit:function () {
            axios.post("./api/invoices", this.fields).then(() => {
                window.location.reload()
            }).catch(function (error) {
                console.log(error);
            });
        },

        clickList:function ($id) {
            axios.get("http://localhost/workproject/public/api/invoice_items/" + $id).then(() => {
                    this.$router.push({name: 'invoice_items', params: {id: $id}})
            }).catch(function (error) {
                console.log(error);
            });
        },
    }
}
</script>

<style scoped>

</style>
