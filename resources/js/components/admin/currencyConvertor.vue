<template>
    <div class="row justify-content-center">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header">Convert Currency</div>
                    <div class="card-body">
                        <div class="form-group">
                           <label >Amount</label>
                           <input type="number" id="amount" name="amount" @keyup="rate" v-model="formData.amount"  class="form-control form-control-sm" placeholder="Enter amount">
                        </div>
                        <div class="form-group">
                           <label >Rate</label>
                           <input type="number" id="rate" @keyup="rate" name="rate" v-model="formData.rate"  class="form-control form-control-sm" placeholder="rate">
                        </div>
                        <div class="form-group">
                            <label >Currency</label>
                                <select class="form-control form-control-sm"  name="currency" v-model="formData.currency" data-toggle="select2" required>
                                        <option>Select</option>
                                            <option value="USD">USD</option>
                                            <option value="ZAR">ZAR</option>
                                            <option value="GBP">GBP</option>
                                            <option value="EURO">EURO</option>
                                             <option value="ZWL">ZWL</option>
                                </select>
                         </div>.
                        <div class="form-group">
                            <label >ZWL Equivalent</label>
                            <input type="number" name="zwlEquivalent" v-model="formData.zwlEquivalent"  class="form-control form-control-sm" placeholder="zwlEquivalent" disabled>
                        </div>

                        <div class="form-group">
                            <button @click.prevent="convert" class="btn btn-primary" type="submit">Set Rate</button>
                        </div>
                   </div>
               </div>
           </div>
    </div>
</template>
<script>
export default{
        data(){
            return{
                formData:{
                        amount : 0,
                        rate : 0,
                        currency : '',
                        zwlEquivalent : 0
                }
            };
        },
        methods:{
                rate(){
                    this.formData.zwlEquivalent = this.formData.amount * this.formData.rate;
                },
                convert(){
                    axios.post("/convert", this.formData).then((response) =>{
                    Swal.fire(
                    'Conversation set!',
                    'You have successfully set your rate',
                    'success'
                     )
                    this.$router.push('/')
                }).then((errors) =>{
                    console.log(errors)
                });
                }
        }
}

</script>
