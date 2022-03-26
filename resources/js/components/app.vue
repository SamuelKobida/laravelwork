<template>

    <Header/>
    <router-view/>
    <Footer/>

</template>

<script>
import home from "./home";


export default {
    components: {
        home
    }
}
</script>
