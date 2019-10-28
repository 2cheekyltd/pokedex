<template>
    <div>
        <header>
            <div class="row align-items-center no-gutters default-width-container">
                <div class="col-10">
                This is a test.
                </div>
                <div class="col-2">
                This is a test.
                </div>
            </div>
        </header>
    </div>
</template>

<script>
    export default {
        name: "headComponent.vue"
    }
</script>

<style scoped>

</style>
<a href="{{ route('home') }}">
<!--<img src="{{ asset('images/logo.png') }}" alt="Pokemon Logo"/>-->
</a>
<a href="{{ route('search') }}">
<!--<i class="fas fa-search"></i>-->
</a>
