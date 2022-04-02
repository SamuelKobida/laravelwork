import Customers from "./components/Customers";
import Invoices from "./components/Invoices";
import Products from "./components/Products";

let base_path = "/workproject/public/";

export const routes = [

    {
        name: 'customers',
        path: base_path,
        component: Customers,

    },

    {
        name: 'invoices',
        path: base_path,
        component: Invoices,

    },

    {
        name: 'products',
        path: base_path,
        component: Products,

    },

];


