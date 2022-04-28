<template>
    <!--{{this.$route.params.id}}-->
       <div class=" container-sm p-3">
           <div class="card border-primary ">
               <div class="card-body">


                   <form>

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
                           <td>{{ products[invoice_item.product_id-1].price}}€</td>
                           <td>{{ invoice_item.quantity }}ks</td>
                           <!-- Rovnaka chyba ako je popisana pri invoices -->
                        <td>
                            <button class="btn btn-danger" @click="deleteIi(invoice_item.id)">Delete</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <h2>Total price for this customer is {{total}} €</h2>
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
            counting_total: [],

            data: {
                total:'0',
            },

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
        this.counting();
    },

    computed: {
        total () {
            return this.counting_total.reduce( (sum, counting_total) => {
                return sum + parseInt(((counting_total.price*counting_total.quantity)/100)*(100-counting_total.discount))
            }, 0)
        }
    },

    methods:{

        counting: function () {
            axios.get("http://localhost/workproject/public/api/total/" + this.$route.params.id).then(response => {
                this.counting_total = response.data;
            }).catch(function (error) {
                console.log(error);
            });
        },

        back:function (){
            this.data.total=this.total
            axios.post("http://localhost/workproject/public/api/sendtotal/"+ this.$route.params.id,this.data).then(() => {
                this.$router.push({name: "invoices"});
            }).catch(function (error) {
                console.log(error);
            });
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
