import Customers from "./components/Customers";
import Invoices from "./components/Invoices";
import Products from "./components/Products";

let base_path = "/workproject/public/";

export const routes = [

    {
        name: 'invoices',
        path: base_path,
        component: Invoices,

    },

    {
        name: 'customers',
        path: base_path + 'customers',
        component: Customers,

    },

    {
        name: 'products',
        path: base_path + 'products',
        component: Products,

    },

];


