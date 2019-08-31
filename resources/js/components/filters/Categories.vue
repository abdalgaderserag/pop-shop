<template>
    <div class="right-section" style="width: 20%;">
        <div style="margin-left: 12%">
            <div class="flex-box mark-title">
                <div></div>
                <div>Categories</div>
            </div>
            <div style="margin-top: 8px">
                <!--@foreach(config('pop.category') as $type)-->
                <!--<a href="dashboard?{{ $type }}" class="link-clear">{{ $type }}</a><span>,</span>-->
                <!--@endforeach-->
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Categories"
    }
</script>

<style scoped>

</style>