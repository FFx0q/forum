<template>
    <header class="header">
        <div class="container container--header">
            <h1 class="header__title">
                <a href="/">phpBoard</a>
            </h1>
            <nav class="top-menu">
                <ul class="top-menu__list">
                    <li class="top-menu__item">
                        <a class="top-menu__link">Member list</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
</template>
<script>
export default {
    name: "Header"
}
</script>
<style lang="scss" scoped>
    .header {
        display: flex;
        flex-direction: row;
        height: 75px;
        background: #1a1a1a;

        .container--header {
            position: relative;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
        &__title {
            height: 100%;


            h1 {
                font-size: 2em;
            }
        }
        .top-menu {
            height: 100%;
            flex-grow: 1;
            &__list {
                display: flex;
                list-style: none;
                padding: 0;
                justify-content: flex-end;
            
            }
            &__item {
                flex-shrink: 0;
            }
            &__link {
                color: #fff;
            }
        }
    }
</style>