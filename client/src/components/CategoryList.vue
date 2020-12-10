<template>
    <div class="layoutMain">
        <section>
            <ol class="forumList">
                <li class="forumRow" v-for="category in categories" v-bind:key="category.id">
                    <h2 class="forumTitle">
                        <router-link
                            :to="{
                                name: 'Category',
                                params: {
                                    id: category.id,
                                },
                            }"
                        >
                            {{ category.name }}
                        </router-link>
                    </h2>
                    <ol class="dataList">
                        <li class="dataItem forumRow" v-for="sub in category.subcategories" v-bind:key="sub.id">
                            <div class="dataItem_main">
                                <router-link
                                    :to="{
                                        name: 'Category',
                                        params: {
                                            id: sub.id,
                                        },
                                    }"
                                >
                                {{ sub.name }}
                                </router-link>
                            </div>
                            <div class="dataItem_stats">
                                
                            </div>
                            <div class="dataItem_post">

                            </div>
                        </li>
                    </ol>
                </li>
            </ol>
        </section>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                categories: [],
            }
        },
        methods: {
            fetchCategories() {
                fetch('http://localhost:8000/category')
                    .then(response => response.json())
                    .then(response => {
                        let data = []

                        response.forEach(category => {
                            if (category.root_category === null) {
                                category['subcategories'] = []
                                data.push(category)
                            }

                            if (data.find(x => x.id === category.root_category)) {
                                const index = data.findIndex(x => x.id === category.root_category)

                                data[index]['subcategories'].push(category)
                            }
                        })
                        this.categories = data
                    })
            },
        },
        created: function() {
            this.fetchCategories()
        },
    }
</script>
<style lang="scss" scoped>
    .layoutMain {
        width: 100%;
        min-height: 350px;
        padding: 0;
    }
    .forum {
        &List {
            display: flex;
            flex-direction: column;
            list-style: none;
        }
        &Row {
            width: 100%;
        }
        &Title {
            background: #444;
            color: #fff;
            border: 0;
            padding: 8px 12px;
            margin-bottom: 0;
            border-radius: 4px;

            font-size: 1.2em;
            font-family: 'Asap' sans-serif;
            font-weight: bold;
        }
    }
    .dataItem {
        &_main {
            display: table-cell;
            width: 100%;
            padding: 15px 10px;
            margin: 0;
        }
        &_stats {
            display: table-cell;
            width: 15%;
            min-width: 150px;
            padding: 15px 10px;
            text-align: center;
        }
        &_post {
            display: table-cell;
            width: 25%;
            min-width: 270px;
            max-width: 25%;
            list-style: none;
            margin: 0;
            padding: 0;
        }
    }
</style>
