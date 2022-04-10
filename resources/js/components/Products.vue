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
                        <label class="m-1">Price</label>
                        <input class="form-control" v-model="fields.price" placeholder="Enter price">
                    </div>

                    <button type="submit" class="btn btn-primary" @click="submit">Submit</button>


                </form>



    <table class="table table-responsive-lg">
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Price</th>
        <th></th>
    </tr>
    </thead>

    <tbody>
    <tr v-for="product in products" :value="product.id">
        <td>{{ product.id }}</td>
        <td>{{ product.name }}</td>
        <td>{{ product.price }}</td>
        <td>
            <button class="btn btn-danger" @click="deleteProduct(product.id)">Delete</button>
        </td>
    </tr>
    </tbody>
    </table>

            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: "Products",

    data() {
        return {
            products: [],

            fields: {
                name: '',
                price: '',
            }
        }
    },

    mounted() {
        this.loadProducts();

    },

    methods: {
        loadProducts: function () {
            axios.get("http://localhost/workproject/public/api/products").then(response => {
                this.products = response.data;
            }).catch(function (error) {
                console.log(error);
            });
        },

        submit() {
            axios.post("./api/products", this.fields).then(() => {
                window.location.reload()
            }).catch(function (error) {
                console.log(error);
            });
        },
        deleteProduct(){
            //
        }

    }
}
</script>

<style scoped>

</style>
