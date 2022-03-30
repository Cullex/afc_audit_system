<template>
  <div class="py-9">
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-5">
            <div class="min-h-135px card cta-box bg-primary text-white">
              <div class="card-body">
                <div class="media align-items-center">
                  <div class="media-body">
                    <h3 class="m-0 font-weight-normal cta-box-title">
                      Welcome back ,
                      <b>
                        {{ user.name }}
                        {{ user.last_name }}</b
                      >
                      <br />
                      AFC Investigations Register
                    </h3>
                    <p class="mt-2">Investigations Simplified <br /></p>
                  </div>
                  <img
                    class="ml-3"
                    src="/assets/images/email-campaign.svg"
                    width="120"
                    alt="Generic placeholder image"
                  />
                </div>
              </div>
              <!-- end card-body -->
            </div>
          </div>
          <div class="col-lg-7">
            <div class="row">
              <div class="col-lg-5">
                <div class="card widget-flat">
                  <div class="card-body">
                    <div class="float-right">
                      <i class="mdi mdi-account-multiple widget-icon"></i>
                    </div>
                    <h5
                      class="text-muted font-weight-normal mt-0"
                      title="Number of Customers"
                    >
                      Total Users
                    </h5>
                    <h3 class="mt-3 mb-3">{{ total.users }}</h3>
                  </div>
                  <!-- end card-body-->
                </div>
                <!-- end card-->
              </div>
              <div class="col-lg-6">
                <div class="row">
                  <div class="col-lg-11">
                    <div class="card widget-flat">
                      <div class="card-body">
                        <div class="float-right">
                          <i class="mdi mdi-account-multiple widget-icon"></i>
                        </div>
                        <h5
                          class="text-muted font-weight-normal mt-0"
                          title="Number of Customers"
                        >
                          Total Records
                        </h5>
                        <h3 class="mt-3 mb-3">{{ stats.records }}</h3>
                      </div>
                      <!-- end card-body-->
                    </div>
                    <!-- end card-->
                  </div>
                  <!-- end col-->
                </div>
              </div>
            </div>
            <!-- end col-->
          </div>
        </div>
      </div>
    </div>




    <div class="col-lg-12">
      <div style="height: 360px; overflow-y: auto" class="card">
        <div class="">
          <h6 class="text-muted px-3 py-2 text-uppercase">Recent Records</h6>
        </div>
        <div class="table-responsive font-12">
          <table class="table table-centered">
            <thead class="thead-light">
              <tr>
                <th />
                <th />
                <th>#</th>
                <th>Reference</th>
                <th>Date Occurred</th>
                <th>Loss Type</th>
                <th>Value</th>
                  <th>Investigating Officer</th>
                  <th>Due Date</th>
                <th />
                <th />
              </tr>
            </thead>
            <tbody>
              <tr v-for="record in records" :key="record.id">
                <td />
                <td class="text-primary"></td>
                <td>
                  {{ record.id }}
                </td>
                <td class="font-weight-bolder">
                  {{ record.ir_no }}
                </td>
                <td class="font-weight-bolder">
                  {{ record.date_received }}
                </td>
                <td>
                  <span class="badge badge-light p-2">
                    {{ record.loss_type}}</span
                  >
                </td>
                <td>
                  <span class=""> {{ record.value }}</span>
                </td>
                <td>
                  <span class="text-primary font-weight-bolder">
                     {{ record.offence }}</span
                  >
                </td>
                  <td>
                  <span class="text-danger font-weight-bolder">
                     {{ record.dueDate }}</span
                  >
                  </td>
                <td>
                  <router-link
                    :to="`/admin/viewRecord/${record.id}`"
                    class="action-icon text-muted"
                  >
                    <i class="mdi mdi-eye mdi-24px" />
                  </router-link>
                </td>
                <td />
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-12">
      <div class="row font-15">
        <div class="col-lg-4">
          <div class="card text-white bg-primary overflow-hidden">
            <div class="card-body">
              <div class="toll-free-box text-center">
                <div>
                  <i class="mdi mdi-headset"></i> srichards@agribank.co.zw
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card text-white bg-primary overflow-hidden">
            <div class="card-body">
              <div class="toll-free-box text-center">
                <div>
                  <i class="mdi mdi-deskphone"></i> Need help ? Call : 071 376
                  4301
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card text-white bg-primary overflow-hidden">
            <div class="card-body">
              <div class="toll-free-box text-center">
                <div>
                  <i class="mdi mdi-headset"></i>071 376 4301 | 0774 935 699
                </div>
              </div>
            </div>
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
      records: [],
      stats: {},
      user: window.user,
      total: {},
    };
  },
  mounted() {
    //return records from DB
    window.axios
      .get("/records")
      .then((response) => (this.records = response.data.body.records.data));

    //total # of records
    window.axios
      .get("/loadStats")
      .then((response) => (this.stats = response.data.body));

    //return loggedIn User Info

    //total # of users
    window.axios
      .get("/totalUsers")
      .then((response) => (this.total = response.data.body));
  },
};
</script>

