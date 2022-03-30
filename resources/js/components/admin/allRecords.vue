<template>
        <div class="col-lg-12">
            <div style="height: 360px; overflow-y: auto" class="card" >
                <div class="">
                    <div style="float: right">
                        <a v-if="auth.isSuperAdmin" target="_blank" href="/downloadExcel" class="btn btn-warning">Download Excel</a>
                        
                    </div>
                    <h6 class="text-muted px-3 py-2 text-uppercase">All Records</h6>
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
                    $ {{ record.offence }}</span
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

</template>
<script>
export default {
    data() {
        return {
            records: [],
            auth: window.user,
        };
    },
    methods:{
        downloadExcel(){
            window.axios.get('/downloadExcel').then((response) =>{
                console.log(response)
                Swal.fire(
                    'Downloaded!',
                    'Your file has been downloaded',
                    'success'
                )
            }).then((errors) =>{
                console.log(errors)
            });
        }
    },
    mounted() {
        //return records from DB
        window.axios.get("/records").then((response) =>
            (this.records = response.data.body.records.data));

    },
};
</script>

