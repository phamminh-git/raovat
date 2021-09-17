<template>
    <div class="form-group">
        <span class="categoryList">
            <span class="categoryItem" v-for="(category, index) in selectedCategories" :key="category.id">
                {{category.name}}
                <span @click="selectedCategories.splice(index, 1)">x</span>
            </span>
        </span>
        <div class="dropdown" style="display: inline-block;">
            <button class="btn btn-secondary dropdown-toggle"
                type="button" id="dropdownMenuButton"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false">
                Vui long chon
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <input type="text" class="form-control" v-model="keyword" v-on:input="debounceInput">
                <a class="dropdown-item"
                v-for="category in categories"
                :key="category.id" href="#"
                @click.prevent="selectedCategories.push(category)">{{category.name}}</a>
            </div>
        </div>
        <input type="hidden" name="category_ids[]" v-for="category in selectedCategories" :key="category.id" :value="category.id"/>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data(){
        return{
            keyword: '',
            categories: [],
            selectedCategories: []
        }
    },
    methods:{
        getCategories(){
            axios.get('/resource/categories?keyword='+this.keyword).then(response=>{
                this.categories=response.data;
            });
        },
        debounceInput: _.debounce(function(){
            this.getCategories()
        }, 500)
    },
    watch:{
    }
}
</script>

<style scoped>
.categoryItem {
    border: 1px solid black;
    border-radius: 3px;
    padding: 5px 10px;
}
</style>
