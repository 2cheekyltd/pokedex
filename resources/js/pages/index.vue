<template>
<div>
    <div class="default-width-container">
        <div class="resultsContainer">
            @include('results')
        </div>
        <div class="loader">
            <i class="fas fa-cog fa-spin"></i>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        name: "index"
    }
</script>

<style scoped>

</style>
