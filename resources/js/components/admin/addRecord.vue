<template>
    <div class="row justify-content-center">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header">Create New Record</div>
                    <div class="card-body">
                       <div class="form-group">
                           <label>IR No</label>
                          <input type="text"   v-model="formData.ir_no"  class="form-control form-control-sm" placeholder="ir_no" >
                           <p class="text-danger" v-text="errors.ir_no"></p>
                        </div>
                        <div class="form-group">
                            <label>Due Date</label>
                            <input type="date"  v-model="formData.dueDate"  class="form-control form-control-sm" placeholder="Due Date">
                            <p class="text-danger" v-text="errors.dueDate"></p>
                        </div>
                        <div class="form-group">
                           <label>Date Received</label>
                           <input type="date" v-model="formData.date_received"  class="form-control form-control-sm" placeholder="date_received">
                            <p class="text-danger" v-text="errors.date_received"></p>
                        </div>
                        <div class="form-group">
                           <label>Date Occurred</label>
                           <input type="date" v-model="formData.date_occurred"  class="form-control form-control-sm" placeholder="date_occured">
                            <p class="text-danger" v-text="errors.date_occurred"></p>
                        </div>
                        <div class="form-group">
                           <label>Complainant/Informant</label>
                           <input type="text" v-model="formData.informant"  class="form-control form-control-sm" placeholder="informant">
                            <p class="text-danger" v-text="errors.informant"></p>
                        </div>
                        <div class="form-group">
                           <label>offence</label>
                           <input type="text" v-model="formData.offence"  class="form-control form-control-sm" placeholder="offence">
                            <p class="text-danger" v-text="errors.offence"></p>
                        </div>
                        <div class="form-group">
                           <label>Accussed/Suspect</label>
                           <input type="text"  v-model="formData.accussed"  class="form-control form-control-sm" placeholder="accussed">
                            <p class="text-danger" v-text="errors.accussed"></p>
                        </div>
                        <div class="form-group">
                            <label>Currency</label>
                                <select class="form-control form-control-sm"  v-model="formData.currency" data-toggle="select2" >
                                        <option>Select</option>
                                            <option value="USD">USD</option>
                                            <option value="ZAR">ZAR</option>
                                            <option value="GBP">GBP</option>
                                            <option value="EURO">EURO</option>
                                             <option value="ZWL">ZWL</option>
                                </select>
                            <p class="text-danger" v-text="errors.currency"></p>
                         </div>
                         <div class="form-group">
                           <label>ZWL Value</label>
                           <input type="number" @keyup="rate" v-model="formData.value"  class="form-control form-control-sm" placeholder="value">
                             <p class="text-danger" v-text="errors.value"></p>
                        </div>
                        <div class="form-group">
                           <label>Bank Rate</label>
                           <input type="number" @keyup="rate"  v-model="formData.bank_rate"  class="form-control form-control-sm" placeholder="bank_rate">
                            <p class="text-danger" v-text="errors.bank_rate"></p>
                        </div>
                        <div class="form-group">
                           <label>Calculated Equivalent</label>
                           <input type="number" v-model="formData.zwlEquivalent"  class="form-control form-control-sm" placeholder="0" disabled>
                            <p class="text-danger" v-text="errors.zwlEquivalent"></p>
                        </div>
                        <div class="form-group">
                                <label>Brief Circumstances</label>
                                    <textarea class="form-control" v-model="formData.brief" rows="5"  placeholder="Enter some brief about record.."></textarea>
                            <p class="text-danger" v-text="errors.brief"></p>
                        </div>
                        <div class="form-group">
                                <label>Case Position & Outcome</label>
                                    <textarea class="form-control" v-model="formData.case_position" rows="5" placeholder="Enter outcome and case position" >
                                    </textarea>
                            <p class="text-danger" v-text="errors.case_position"></p>
                        </div>
                        <div class="form-group">
                            <label>Loss Type</label>
                                <select class="form-control select2"  v-model="formData.loss_type" data-toggle="select2" >
                                        <option>Select</option>
                                            <option value="LTA">LTA</option>
                                            <option value="LTO">LTO</option>
                                            <option value="NL">NL</option>
                                </select>
                            <p class="text-danger" v-text="errors.loss_type"></p>
                         </div>
                         <div class="form-group">
                            <label>Investigating Officer</label>
                                <select class="form-control select2"  v-model="formData.officer" data-toggle="select2" >
                                        <option>Select</option>
                                            <option value="Alois Koffi">Alois Koffi</option>
                                            <option value="Ashton Masango">Ashton Masango</option>
                                            <option value="Norest Kagande">Norest Kagande</option>
                                            <option value="IT Audit">IT Audit</option>
                                            <option value="Operations Audit">Operations Audit</option>
                                </select>
                             <p class="text-danger" v-text="errors.officer"></p>
                         </div>
                        <div class="form-group">
                            <button @click.prevent="create" class="btn btn-primary" type="submit">Submit Record</button>
                        </div>
                   </div>
               </div>
           </div>
    </div>
</template>
<script>
export default {
    data () {
        return {
            formData: {
                ir_no: '',
                dueDate: '',
                date_received: '',
                date_occured: '',
                informant: '',
                offence: '',
                accussed: '',
                loss_type: '',
                currency: '',
                value : 0,
                bank_rate: 0,
                zwlEquivalent: 0,
                brief: '',
                case_position: '',
                officer: ''
            },
            errors:{},
        };
    },



    methods:{
        rate(){
            this.formData.zwlEquivalent = (this.formData.value * this.formData.bank_rate)
        },
        create() {
            axios.post('addRecord', this.formData).then((response) =>  {
                Swal.fire(
                'Record Added!',
                'You have successfully added your record',
                'success'
                 )
                this.$router.push('/')
            }).catch((errors) => {
                console.log(errors.response.data.errors)
                this.errors = errors.response.data.errors
            });
        },
    }
}

</script>
