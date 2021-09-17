<template>
    <div>
        <input class="d-none" type="file" name="thumbnail" ref="input" @change="fileChange">
        <img ref=previewImg style="max-width: 250px;">
        <button class="btn btn-default border" @click.prevent="openFileSelect">Select image</button>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    methods: {
        openFileSelect(){
           this.$refs.input.click();
        },
        fileChange(){
            let file = this.$refs.input.files[0];
            this.$refs.previewImg.src = URL.createObjectURL(file);

            let formData = new FormData();
            formData.append('thumbnail', file);
            axios.post('/user/upload-thumbnail', formData)
            .then( response => {
                this.$refs.previewImg.src = '/storage/thumbnails/'+ response.data.fileName;
            })
        }
    }
}
</script>

<style scoped>

</style>
