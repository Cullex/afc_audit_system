<template>
  <div>
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Review Record</div>
        <div class="card-body">
          <div class="form-group">
            <label>IR No</label>
            <input
              disabled
              type="text"
              name="ir_no"
              v-model="record.ir_no"
              class="form-control form-control-sm"
            />
          </div>
          <div class="form-group">
            <label>Date Received</label>
            <input
              disabled
              type="date"
              name="date_received"
              v-model="record.date_received"
              class="form-control form-control-sm"
            />
          </div>
          <div class="form-group">
            <label>Date Occurred</label>
            <input
              disabled
              type="date"
              name="date_occurred"
              v-model="record.date_occurred"
              class="form-control form-control-sm"
            />
          </div>
          <div class="form-group">
            <label>Date Occurred</label>
            <input
              disabled
              type="date"
              name="date_occurred"
              v-model="record.date_occurred"
              class="form-control form-control-sm"
            />
          </div>
          <div class="form-group">
            <label>Informant</label>
            <input
              disabled
              type="text"
              name="informant"
              v-model="record.informant"
              class="form-control form-control-sm"
            />
          </div>
          <div class="form-group">
            <label>Date Received</label>
            <input
              disabled
              type="date"
              name="date_occurred"
              v-model="record.date_occurred"
              class="form-control form-control-sm"
            />
          </div>
          <div class="form-group">
            <label>Offence</label>
            <input
              disabled
              type="text"
              name="offence"
              v-model="record.offence"
              class="form-control form-control-sm"
            />
          </div>
          <div class="form-group">
            <label>Accussed</label>
            <input
              disabled
              type="text"
              name="accussed"
              v-model="record.accussed"
              class="form-control form-control-sm"
            />
          </div>

          <div class="form-group">
            <label>Currency</label>
            <input
              disabled
              type="text"
              name="currency"
              v-model="record.currency"
              class="form-control form-control-sm"
            />
          </div>

          <div class="form-group">
            <label>Value Involved</label>
            <input
              disabled
              type="number"
              name="value"
              v-model="record.value"
              class="form-control form-control-sm"
            />
          </div>
          <div class="form-group">
            <label>Bank Rate</label>
            <input
              disabled
              type="number"
              name="value"
              v-model="record.bank_rate"
              class="form-control form-control-sm"
            />
          </div>
          <div class="form-group">
            <label>USD Value</label>
            <input
              disabled
              type="number"
              name="usd_value"
              v-model="record.usd_value"
              class="form-control form-control-sm"
            />
          </div>


          <div class="form-group">
            <label>Case Position & Outcome</label>
            <textarea
              disabled
              class="form-control"

              v-model="record.case_position"
              rows="5"
            >
            </textarea>
          </div>
          <div class="form-group">
            <label>Loss Type</label>
            <select
              disabled
              class="form-control select2"

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
            <input
              disabled
              type="text"

              v-model="record.officer"
              class="form-control form-control-sm"
            />
          </div>
          <div>
                <a v-if="auth.isSuperAdmin" @click="reviewRecord()" class="btn btn-warning">Set As Reviewed</a>
              <router-link
                  v-if="auth.canEdit"
                  :to="`/admin/editRecord/${record.id}`"
                  class="btn btn-warning"
              >Edit Record
              </router-link>
              <router-link
                  v-if="auth.canEdit"
                  :to="`/admin/addComments/${record.id}`"
                  class="btn btn-warning"
              >Add Notes
              </router-link>
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
        auth: window.user,
    };
  },
  methods:{
      reviewRecord() {
          window.Swal.fire({
              title: 'Are you sure you want to review?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, review record!'
          }).then((result) => {
              if (result.value) {
                  axios.post(`reviewRecord/${this.record.id}`).then((response) => {
                      this.record = response.data;
                      this.$router.push('/')
                  }).catch((error) => {
                  })
                  Swal.fire(
                  'Reviewed!',
                  'Your record has been reviewed.',
                 'success'

                  )
              }
          })
      },
  },
  mounted() {
    //return a specific record to component
    window.axios
      .get("viewRecord/" + this.$route.params.id)
      .then((response) => {
        this.record = response.data.body.record;
      })
      .catch((errors) => {
        console.log(errors);
      });

  },
};
</script>

