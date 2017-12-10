<template>
    <div>
        <top-menu></top-menu>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex'
    import TopMenu from './pages/shared/TopMenu.vue'

    export default {
        name: 'app',
        components: {
            TopMenu
        }
    }
</script>
