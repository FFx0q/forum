<template>
  <div class="container">
    <section class="block" v-for="category in categories" v-bind:key="category.id">
      <div class="title">
        <h2 class="title__name">{{ category.name }}</h2>
      </div>
      <div class="forum-list">
        <div class="forum forum-row" v-for="sub in category.subcategories" v-bind:key="sub.id">
          <div class="forum-info">
            <h3 class="forum-title">
              <a href>{{ sub.name }}</a>
            </h3>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>
<script>
export default {
    data() {
        return {
            categories: []
        };
    },
    methods: {
        fetchCategories() {
            fetch("http://localhost:8000/category")
                .then(response => response.json())
                .then(response => {
                    let data = []
                    
                    response.forEach(category => {
                        if (category.root_category === null) {
                            category["subcategories"] = []
                            data.push(category)
                        }

                        if (data.find(x => x.id === category.root_category)) {
                            const index = data.findIndex(x => 
                                x.id === category.root_category
                            )

                            data[index]["subcategories"].push(category);
                        }
                    })
                    this.categories = data
                })
        }
    },
    created: function() {
        this.fetchCategories();
    }
};
</script>
<style lang="scss" scoped>
.block {
  margin-bottom: 30px;
}
.title {
  background: #444;
  color: #ffffff;
  border: 0;
  padding: 8px 12px;
  margin-bottom: 0;
  border-radius: 4px;
  &__name {
    font-size: 1.2em;
    font-family: "Asap", sans-serif;
    font-weight: bold;
    padding: 0;
    margin: 0;
  }
}

.forum {
  display: flex;
  justify-content: space-between;
  flex-direction: row;
  padding: 12px 12px;
  &-info {
    padding: 5px 0 5px 38px;
    box-sizing: border-box;
  }
  &-title {
    margin: 0;
    font-size: 1em;
  }
}
</style>
