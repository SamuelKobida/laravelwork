<template>

    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-primary">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <li>
                    <router-link :to="{  name: 'invoices' }" class="nav-link text-light font-weight-bold">Invoices</router-link>
                </li>
                <li>
                    <router-link :to="{  name: 'products' }" class="nav-link text-light font-weight-bold">Products
                    </router-link>
                </li>
                <li>
                    <router-link :to="{  name: 'customers' }" class="nav-link text-light font-weight-bold">Customers
                    </router-link>
                </li>
            </div>
        </div>

    </nav>

</template>


<script>
import Invoices from "./Invoices";
import Products from "./Products";
import Customers from "./Customers";

export default {
    name: "Header",

    components: {
        Invoices,
        Products,
        Customers
    },

}

</script>

<style scoped>

</style>
