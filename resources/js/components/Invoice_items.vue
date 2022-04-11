<template>

    <div class=" container-sm p-3">
        <div class="card border-primary ">
            <div class="card-body">


                <form @submit.prevent="submit">

                    <div class="form-group">
                        <label class="m-1">Product</label>
                        <select class="form-control" v-model="fields.product_id" >
                            <option v-for="product in products" :value="product.id"> {{ product.name }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="m-1">Quantity</label>
                        <input class="form-control" v-model="fields.quantity" placeholder="Enter quantity">
                    </div>

                    <button type="submit" class="btn btn-primary" @click="submit">Submit</button>


                </form>

                <table class="table table-responsive-lg">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th><button class="btn btn-primary" @click="back">Back</button></th>
                    </tr>
                    </thead>


                    <tbody>
                    <tr v-for="invoice_item in invoice_items" :value="invoice_item.id" >
                        <td>{{ products[invoice_item.product_id-1].name}}</td>
                        <td>{{ (products[invoice_item.product_id-1].price)*invoice_item.quantity+"€"}}</td>
                        <td>{{ invoice_item.quantity }}</td>
                        <td>
                            <button class="btn btn-danger" @click="deleteIi(invoice_item.id)">Delete</button>
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
    name: "Invoice_items",

    data() {
        return {
            invoice_items: [],
            products: [],

            fields: {
                quantity: '',
                product_id: '',
                invoice_id: this.$route.params.id,

            }
        }
    },

    mounted() {
        this.reciveData();
        this.loadProducts();
    },
    methods:{

        back($total){
            this.$router.push({name: "invoices", params: {total: $total}});
        },

        reciveData:function (){
            axios.get("http://localhost/workproject/public/api/invoice_items/" + this.$route.params.id).then(response => {
                this.invoice_items = response.data;
            }).catch(function (error) {
                console.log(error);
            });
        },

        loadProducts: function () {
            axios.get("http://localhost/workproject/public/api/products").then(response => {
                this.products = response.data;
            }).catch(function (error) {
                console.log(error);
            });
        },

        deleteIi:function (id){
            axios.delete(`http://localhost/workproject/public/api/invoice_items/delete/${id}`).then(() => {
                window.location.reload()
            }).catch(function (error) {
                console.log(error);
            });
        },

        submit:function () {
            axios.post("http://localhost/workproject/public/api/invoice_items", this.fields).then(() => {
                window.location.reload()
            }).catch(function (error) {
                console.log(error);
            });
        },

    }
}
</script>

<style scoped>

</style>
