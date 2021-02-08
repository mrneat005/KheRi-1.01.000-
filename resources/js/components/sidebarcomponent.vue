<template>
<div class="page-wrapper default-theme sidebar-bg bg1 toggled">

<router-view></router-view>

        
    </div>
    <!-- page-wrapper -->



</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
             closeMenu(){
        $(".page-wrapper").toggleClass("toggled");
      },
        },
    }
</script>
