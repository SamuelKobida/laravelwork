<template>

    <div class=" container-sm p-3">
        <div class="card border-primary ">
            <div class="card-body">

                <form>

                    <div class="form-group">
                        <label class="m-1">Name</label>
                        <input class="form-control" v-model="fields.name" placeholder="Enter name">
                    </div>

                    <div class="form-group">
                        <label class="m-1">Adress</label>
                        <input class="form-control" v-model="fields.adress" placeholder="Enter mail">
                    </div>

                    <div class="form-group">
                        <label class="m-1">Phone</label>
                        <input class="form-control" v-model="fields.phone" placeholder="Enter phone">
                    </div>


                    <button type="submit" class="btn btn-primary" @click="submit">Submit</button>


                </form>

                <table class="table table-responsive-lg">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Adress</th>
                        <th>Phone</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr v-for="customer in customers" :value="customer.id">
                        <td>{{ customer.id }}</td>
                        <td>{{ customer.name }}</td>
                        <td>{{ customer.adress }}</td>
                        <td>{{ customer.phone }}</td>
                        <td>
                            <button class="btn btn-danger" @click="deleteC(customer.id)">Delete</button>
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
    name: "Customers",

    data() {
        return {
            customers: [],

            fields: {
                name: '',
                adress: '',
                phone: '',
            }
        }
    },


    mounted() {
        this.loadCustomers();

    },

    methods: {
        loadCustomers: function () {
            axios.get("http://localhost/workproject/public/api/customers").then(response => {
                this.customers = response.data;
            }).catch(function (error) {
                console.log(error);
            });
        },

        submit() {
            axios.post("./api/customers", this.fields).then(() => {
                window.location.reload()
            }).catch(function (error) {
                console.log(error);
            });
        },

        deleteC(id){
            axios.delete(`./api/customers/delete/${id}`).then(() => {
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
