import Customers from "./components/Customers";
import Invoices from "./components/Invoices";
import Products from "./components/Products";
import Invoice_items from "./components/Invoice_items";

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

    {
        name: 'invoice_items',
        path: base_path + 'invoice_items/:id',
        component: Invoice_items,
        props: true,
    }

];


