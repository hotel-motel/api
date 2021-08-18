<template>
    <a class="grid gap-2 alert alert-dark text-gray-900" :href="'/hotels/'+hotel.id">
        <img :src="hotel.image" :alt="hotel.name" class="imageContainer rounded">
        <div class="flex justify-between">
            <span>
                {{ hotel.name }}
            </span>
            <span class="h-3">
                {{ hotel.star }}
                <i class='bx bxs-star'></i>
            </span>
        </div>
    </a>
</template>
<script>
export default{
    props:['hotel'],
}
</script>
<style scoped>
.imageContainer {
    width:100%;
    height: 200px;
}
</style>
