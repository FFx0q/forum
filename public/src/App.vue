<template>
    <div id="app">
        <Header />
        <main id="layoutBody" class="container">
            <div class="layoutContent">
                <router-view></router-view>
            </div>
        </main>
    </div>
</template>

<script>
    import Header from '@/components/Header.vue'
    export default {
        name: 'App',
        components: {
            Header,
        },
    }
</script>

<style lang="scss">
    body {
        color: #ddd;
        word-wrap: break-word;
        margin: 0;
        font: 16px/26px 'Open Sans', sans-serif;
        background: #222;
    }

    #layoutBody {
        margin: 0 auto;
    }

    .layoutContent {
        display: table;
        width: 100%;
        border-top: 0;
    }
    .container {
        max-width: 1340px;
        padding: 0 15px;
        margin: 0 auto;
        position: relative;
    }

    .dataList {
        position: relative;
        width: 100%;
        display: table;
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .dataItem {
        position: relative;
        width: 100%;
    }

    a {
        color: #fff;
        & {
            text-decoration: none;
        }
    }
</style>
