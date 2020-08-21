<template>

        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <vue-confirm-dialog></vue-confirm-dialog>
                        <table class="table table-report -mt-2">
                            <thead>
                                <tr>
                                    <th class="text-center whitespace-no-wrap">#</th>
                                    <th class="text-center whitespace-no-wrap">Appointment Date</th>
                                    <th class="text-center whitespace-no-wrap">Patient Name</th>
                                    <th class="text-center whitespace-no-wrap">Status</th>
                                    <th class="text-center whitespace-no-wrap">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="intro-x" v-for="(booking, index) in bookings" :key="index">
                                    <td class="text-center">{{ index + 1}}</td>
                                    <td class="text-center">{{ booking.appointment_date | moment("DD/MM/YYYY")}}</td>
                                    <td class="text-center">{{ booking.patient.name}}</td>
                                    <td class="text-center">
                                        <div class="flex items-center justify-center text-theme-6"> <i data-feather="check-square" class="w-4 h-4 mr-2"></i> {{ booking.status}}</div>
                                    </td>
                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                            <a v-if="booking.status == 'confirm'" class="flex items-center mr-3" :href="'/patient/visit/'+ booking.patient.id +'/'+ booking.id"> <i data-feather="eye" class="w-4 h-4 mr-1"></i> Visit Patient </a>
                                            <a v-if="booking.status == 'pending' || booking.status == 'cancel'" class="flex items-center mr-3" href="javascript:;" @click="Confrim(booking.id)"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Confirm </a>
                                            <a v-if="booking.status == 'confirm'" class="flex items-center text-theme-6" href="javascript:;" @click="Cancel(booking.id)"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Cancel </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

</template>

<script>
import Vue from 'vue';
    export default {
        data(){
            return{
                bookings: [],
                FormData: {
                    id: ''
                }
            }
        },
        mounted() {

            this.LoadData()
            console.log('Component mounted.')
        },
        
        methods:{

            LoadData(){
                //  this.bookings = JSON.parse(this.data);
                  axios.get('/bookings/getList') 
                    .then(response => {
            
                            console.log(response)
                            this.bookings = response.data.data
                            
                    
                        })
                        .catch(e => {
            
                            console.log(e)
                        
                    })
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
