<template>
    <el-menu :router="true"
             background-color="#545c64"
             text-color="#fff"
             active-text-color="#ffd04b"
             mode="horizontal" :default-active="activeIndex">
        <el-menu-item :route="{name: 'index'}" index="0">NUNTIUS</el-menu-item>
    </el-menu>
</template>

<script>
    import {siteName} from './../../../config'
    import {mapState} from 'vuex'

    export default {
        name: 'top-menu',
        data() {
            return {
                activeIndex: null,
                siteName: siteName
            }
        },
        computed: {
            //@todo auth
        },
        methods: {
            logout() {
                //@todo logout
            }
        }
    }
</script>