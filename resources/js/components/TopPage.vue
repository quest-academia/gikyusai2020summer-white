<template>
    <div class="text-center">
        <input type="text" v-model="keyword">
        <button class="mb-2" v-on:click="callChildSearchMethod">検索</button>
        <search-result v-show="isSearchResult" ref="result" v-bind:keyword="keyword"></search-result>
        <top-title v-show="!isSearchResult"></top-title>
    </div>
</template>

<script>
    import Search from './Search.vue';
    import TopTitle from './TopTitle.vue';
    import SearchResult from './SearchResult.vue';
    export default {
        data () {
            return {
                keyword :'',
                isSearchResult :false,
            }
        },
        components: {
            Search,
            TopTitle,
            SearchResult
        },
		created () {
			console.log("TopPage");
		},
        methods: {
            callChildSearchMethod () {
                this.isSearchResult = true;
                this.$refs.result.search();
            }
        }
    }
</script>
