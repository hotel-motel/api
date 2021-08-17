<template>
    <div>
        <a class="text-gray-900" :href="'/hotels/'+hotel.id">
            <div class="imageContainer rounded" v-bind:style="{ 'background-image': 'url(' + hotel.image + ')'}" @mouseenter="mouseEntered()" @mouseleave="mouseLeft()">
                <div class="content fs-5 text-center">
                    <button class="btn btn-dark" v-bind:style="{display:mouseOnItem}">
                        {{ hotel.name }}
                    </button>
                </div>
            </div>
        </a>
    </div>
</template>
<script>
export default{
    props:['hotel'],
    data(){
        return{
            mouseOnItem:'none'
        }
    },
    methods:{
        mouseEntered(){
            this.mouseOnItem=''
        },
        mouseLeft(){
            this.mouseOnItem='none'
        }
    }
}
</script>
<style scoped>
.imageContainer {
    width:100%;
    height: 200px;
    background-size: 100% 100%;
}
.content{
    padding-top: 30%;
}
</style>
