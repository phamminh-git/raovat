<template>
    <div class="form-group row">
        <div class="col">
            <select name="province_id" v-model="province_id" class="form-control">
                <option value="null">----Vui long chon----</option>
                <option v-for="province in provinces" :key="province.id" :value="province.id">{{province.name}}</option>
            </select>
        </div>

        <div class="col">
            <select name="district_id" v-model="district_id" v-if="province_id!=null" class="form-control">
                <option value="null">----Vui long chon----</option>
                <option v-for="district in districts" :key="district.id" :value="district.id">{{district.name}}</option>
            </select>
        </div>

        <div class="col">
            <select name="ward_id" v-model="ward_id" v-if="district_id!=null" class="form-control">
                <option value="null">----Vui long chon----</option>
                <option v-for="ward in wards" :key="ward.id" :value="ward.id">{{ward.name}}</option>
            </select>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data(){
        return{
            provinces: [],
            province_id: null,
            districts: [],
            district_id: null,
            wards: [],
            ward_id: null
        };
    },
    mounted(){
        this.getProvinces();
    },
    methods: {
        getProvinces(){
            axios.get('/location/provinces').then(response=>{
                this.provinces = response.data;
            });
        },
        getDistricts(){
            axios.get('/location/province/'+this.province_id+'/districts').then(response=>{
                this.districts = response.data;
            });
        },
        getWards(){
            axios.get('/location/district/'+this.district_id+'/wards').then(response=>{
                this.wards = response.data;
            });
        }
    },
    watch: {
        province_id(){
            this.getDistricts();
        },
        district_id(){
            this.getWards();
        }
    }
}
</script>

<style scoped>

</style>
