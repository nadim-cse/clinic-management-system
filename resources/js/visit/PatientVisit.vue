<template>

        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <vue-confirm-dialog></vue-confirm-dialog>
            <div class="intro-y col-span-12 lg:col-span-12">
                        <!-- BEGIN: Input -->
                        <div class="intro-y box">
                            <div class="p-5" id="input">
                                <div class="preview">
                                   
                                            <div class="mt-3 border-t border-gray-200" v-for="(patient_info, index) in patient_infos" :key="index">
                                                <div class="font-medium text-base">Patient Details</div>
                                                <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">
                                                    <div class="intro-y col-span-12 sm:col-span-6">
                                                        <div class="mb-2">Name</div>
                                                        <input type="text" readonly class="input w-full border flex-1" :value="patient_info.name" >
                                                    </div>
                                                    <div class="intro-y col-span-12 sm:col-span-6">
                                                        <div class="mb-2">Address</div>
                                                        <input type="text" readonly class="input w-full border flex-1" :value="patient_info.address" >
                                                    </div>
                                                    <div class="intro-y col-span-12 sm:col-span-6">
                                                        <div class="mb-2">Mobile</div>
                                                        <input type="text" readonly class="input w-full border flex-1" :value="patient_info.mobile" >
                                                    </div>
                                                    <div class="intro-y col-span-12 sm:col-span-6">
                                                        <div class="mb-2">Select Age</div>
                                                        <select class="input w-full border flex-1"  v-model="FormData.age">
                                                            <option :value="n" v-for="n in 150"> {{ n}}</option>
                                                        </select>
                                                         <div class="text-xs text-gray-600 mt-2" v-if="FormData.age != ''"> Selected Age:- {{ FormData.age }} Years</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br><br><br>
                                          <div class="border-t border-gray-200"></div>  
                                       <h2 class="text-lg font-medium mr-auto">Patient History</h2>
                                       <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">
                                                    <div class="intro-y col-span-12 sm:col-span-6">
                                                        <textarea name="" v-model="FormData.history" id="" cols="100" rows="5" class="input border mt-2"></textarea>
                                                    </div>
                                                    
                                                </div>
                                            
                                          <div class="border-t border-gray-200"></div>  
                                       <h2 class="text-lg font-medium mr-auto">Select Medicine</h2>
                                        <form @submit.prevent="submit">
                                       <span v-for="(md, index) in MedicineData" :key="index">
                                            <div class="mt-3 border-t border-gray-200">
                                                <div class="mt-2">
                                                    <select :id="'name-'+index" v-model="md.medicine_name" class="input border mt-2">
                                                        <option selected>---- Select Medicine ----</option>
                                                        <option :value="product.name" v-for="(product, n) in products" :key="n">{{ product.name}}</option>
                                                    </select>
                                                    <select :id="'power-'+index" v-model="md.power" class="input border mt-2">
                                                        <option selected >---- Select Power ----</option>
                                                        <option :value="product.power" v-for="(product, p) in products" :key="p">{{ product.power}}</option>
                                                    </select>
                                                    <select :id="'amount-'+index" v-model="md.amount" class="input border mt-2">
                                                        <option :value="n" v-for="n in 10"> {{ n}}</option>
                                                    </select>
                                                    <select :id="'shift-'+index" v-model="md.shift" class="input border mt-2">
                                                        <option selected >---- Select a Shift ----</option>
                                                        <option value="moring" >Morning</option>
                                                        <option value="day" >Day</option>
                                                        <option value="night" >Night</option>
                                                    </select>
                                                    <a v-on:click.prevent="addNewFileds()" style="cursor: pointer;color: blue;font-weight: bold;"> Add New (+)</a>
                                                    <a  v-if="index > 0" v-on:click.prevent="removeTemplate(index)" style="cursor: pointer;color: red;font-weight: bold;"> Remove (-)</a>
                                                </div>
                                            </div>
                                        </span>
                                            <div class="mt-3">
                                                <i class="fa fa-ticket"></i><input type="submit" class="button w-24 justify-center block bg-theme-1 text-white ml-2" value="Done"> 
                                                
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- END: Input -->
                    
                    </div>
                       
        </div>

</template>

<script>
import Vue from 'vue';
    export default {
        props: ['patient_id', 'booking_id', 'patient_info'],
        data(){
            return{
                patient_infos: [],
                FormData: {
                    id: '',
                    age: ''
                },
                MedicineData: [],
                products: []
            }
        },
        mounted() {
           
             this.patient_infos = JSON.parse(this.patient_info);
               this.addNewFileds();
             this.LoadData()
            // console.log(this.patient_infos)
            console.log('Component mounted.')
        },
        
        methods:{

            LoadData(){
           
                  axios.get('/bookings/getProductList') 
                    .then(response => {
            
                            console.log(response)
                            this.products = response.data.data
                            
                    
                        })
                        .catch(e => {
            
                            console.log(e)
                        
                    })
            },
            addNewFileds(){
               if(this.MedicineData.length >= 1){
   
                      Vue.$toast.open({
                                    message: 'New Field Added',
                                    type: 'success',
                                    position: 'top'
                                    // all of other options may go here
                                });
               }
               let data = {
   
                   medicine_name: '',
                   power:'',
                   shift:'',
                   amount:'',
   
               };
               
                this.MedicineData.push(data);
                
   
           },
            removeTemplate(index) {
               this.MedicineData.splice(index, 1);
               
                                Vue.$toast.open({
                                    message: 'Field Removed',
                                    type: 'success',
                                    position: 'top'
                                    // all of other options may go here
                                });
           },
           submit(){

               this.FormData.patient_id = this.patient_id;
               this.FormData.booking_id = this.booking_id;
               axios.post('/bookings/prescription',{
                   form:  this.FormData,
                   medicine: this.MedicineData
               }).then(response => {
                                console.log(response)
            
                                Vue.$toast.open({
                                    message: 'Prescription created and transferred to pharmacist successfully',
                                    type: 'success',
                                    position: 'top'
                                    // all of other options may go here
                                });
                                //   this.LoadData();
                                
                            }).catch(error => {
                                
                                console.log(error)
                            });
           },

            Confrim(id){

                this.$confirm(
                        {
                        message: `Are you sure?`,
                        button: {
                            no: 'No',
                            yes: 'Yes'
                        },
                        /**
                         * Callback Function
                         * @param {Boolean} confirm 
                         */
                        callback: confirm => {
                            if (confirm) {
                            // ... do something
                            this.FormData.id = id
                            axios.post('/bookings/confirm', this.FormData).then(response => {
                                console.log(response)
            
                                Vue.$toast.open({
                                    message: 'Booking Confrim Successfully',
                                    type: 'success',
                                    position: 'top'
                                    // all of other options may go here
                                });
                                  this.LoadData();
                                
                            }).catch(error => {
                                
                                console.log(error)
                            });

                            }
                        }
                        }
                    )
            },
            Cancel(id){

                this.$confirm(
                        {
                        message: `Are you sure?`,
                        button: {
                            no: 'No',
                            yes: 'Yes'
                        },
                        /**
                         * Callback Function
                         * @param {Boolean} confirm 
                         */
                        callback: confirm => {
                            if (confirm) {
                            // ... do something
                            this.FormData.id = id
                            axios.post('/bookings/cancel', this.FormData).then(response => {
                                console.log(response)
            
                                Vue.$toast.open({
                                    message: 'Booking Canceled Successfully',
                                    type: 'success',
                                    position: 'top'
                                    // all of other options may go here
                                });
                                  this.LoadData();
                                
                            }).catch(error => {
                                
                                console.log(error)
                            });

                            }
                        }
                        }
                    )
            }
        }
        
    }
</script>
