<template>
    <div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Update Record</div>
                <div class="card-body">
                    <div class="form-group">
                        <label>IR No</label>
                        <input

                            type="text"
                            name="ir_no"
                            v-model="record.ir_no"
                            class="form-control form-control-sm"
                        />
                    </div>
                    <div class="form-group">
                        <label>Date Received</label>
                        <input

                            type="date"
                            name="date_received"
                            v-model="record.date_received"
                            class="form-control form-control-sm"
                        />
                    </div>
                    <div class="form-group">
                        <label>Date Occurred</label>
                        <input

                            type="date"
                            name="date_occurred"
                            v-model="record.date_occurred"
                            class="form-control form-control-sm"
                        />
                    </div>
                    <div class="form-group">
                        <label>Date Occurred</label>
                        <input

                            type="date"
                            name="date_occurred"
                            v-model="record.date_occurred"
                            class="form-control form-control-sm"
                        />
                    </div>
                    <div class="form-group">
                        <label>Informant</label>
                        <input

                            type="text"
                            name="informant"
                            v-model="record.informant"
                            class="form-control form-control-sm"
                        />
                    </div>
                    <div class="form-group">
                        <label>Date Received</label>
                        <input

                            type="date"
                            name="date_occurred"
                            v-model="record.date_occurred"
                            class="form-control form-control-sm"
                        />
                    </div>
                    <div class="form-group">
                        <label>Offence</label>
                        <input

                            type="text"
                            name="offence"
                            v-model="record.offence"
                            class="form-control form-control-sm"
                        />
                    </div>
                    <div class="form-group">
                        <label>Accussed</label>
                        <input

                            type="text"
                            name="accussed"
                            v-model="record.accussed"
                            class="form-control form-control-sm"
                        />
                    </div>

                    <div class="form-group">
                        <label>Currency</label>
                        <input

                            type="text"
                            name="currency"
                            v-model="record.currency"
                            class="form-control form-control-sm"
                        />
                    </div>

                    <div class="form-group">
                        <label>Value Involved</label>
                        <input

                            type="number"
                            @keyup="rate"
                            name="value"
                            v-model="record.value"
                            class="form-control form-control-sm"
                        />
                    </div>
                    <div class="form-group">
                        <label>Bank Rate</label>
                        <input

                            type="number"
                            @keyup="rate"
                            name="value"
                            v-model="record.bank_rate"
                            class="form-control form-control-sm"
                        />
                    </div>
                    <div class="form-group">
                        <label>ZWL Equivalent</label>
                        <input type="number"  name="zwlEquivalent" v-model="record.zwlEquivalent"  class="form-control form-control-sm" placeholder="0" disabled>
                    </div>


                    <div class="form-group">
                        <label>Case Position & Outcome</label>
                        <textarea

                            class="form-control"
                            name="case_position"
                            v-model="record.case_position"
                            rows="5"
                        >
            </textarea>
                    </div>
                    <div class="form-group">
                        <label>Loss Type</label>
                        <select

                            class="form-control select2"
                            name="loss_type"
                            v-model="record.loss_type"
                            data-toggle="select2"
                        >
                            <option>Select</option>
                            <option value="LTA">LTA(Loss To Agribank)</option>
                            <option value="LTO">LTO(Loss To Other)</option>
                            <option value="NL">NL(No Loss)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Investigating Officer</label>
                        <select class="form-control select2" v-model="record.officer" data-toggle="select2" required>
                            <option>Select</option>
                            <option value="Alois Koffi">Alois Koffi</option>
                            <option value="Ashton Masango">Ashton Masango</option>
                            <option value="Norest Kagande">Norest Kagande</option>
                            <option value="IT Audit">IT Audit</option>
                            <option value="Operations Audit">Operations Audit</option>
                        </select>
                    </div>
                    <div>
                        <button @click.prevent="updateRecord" class="btn btn-primary" type="submit">Edit Record</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            record: {},



        };
    },
    methods:{
        rate(){
            this.record.zwlEquivalent = this.form.value * this.record.bank_rate;
        },
        updateRecord() {
            window.Swal.fire({
                title: 'Edit Record?',
                text: "Are You Sure You Want To Edit Record?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, edit record!'
            }).then((result) => {
                if (result.value) {
                    window.axios.post(`/updateRecord/${this.record.id}`, this.record).then((response) => {
                        console.log("record updated");
                        this.$router.push('/')
                    }).catch((error) => {
                    })
                    Swal.fire(
                        'Updated!',
                        'Your record has been updated.',
                        'success'

                    )
                }
            })
        },
    },
    mounted() {
        //return a specific record to component
        window.axios.get("viewRecord/" + this.$route.params.id).then((response) => {
            this.record = response.data.body.record;
        })
            .catch((errors) => {
                console.log(errors);
            });

    },
};
</script>


