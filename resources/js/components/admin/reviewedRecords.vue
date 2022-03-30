<template>
<div class="col-lg-12">
      <div style="height: 360px; overflow-y: auto" class="card">
        <div class="">
          <h6 class="text-muted px-3 py-2 text-uppercase">Reviewed Records</h6>
        </div>
        <div class="table-responsive font-12">
          <table class="table table-centered">
            <thead class="thead-light">
              <tr>
                <th />
                <th />
                <th>#</th>
                <th>Reviewer Name</th>
                <th>Review Status</th>
                <th>Review Count</th>
                <th>Time Reviewed</th>
                <th />
                <th />
              </tr>
            </thead>
            <tbody>
              <tr v-for="review in reviews" :key="review.id">
                <td />
                <td class="text-primary"></td>
                <td class="font-weight-bolder">
                  {{ review.id }}
                </td>
                <td class="font-weight-bolder">
                  {{ review.reviewer_name}}
                </td>
                <td class="font-weight-bolder">
                  {{ review.review_status }}
                </td>
                <td class="font-weight-bolder">
                  {{ review.review_count }}
                </td>
                <td class="font-weight-bolder">
                  {{ review.created_at }}
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
export default{
    data(){
        return{
            reviews: []
        }
    },
    mounted(){
           window.axios.get("/reviewedRecords").then((response) => {
               (this.reviews = response.data.body.reviews.data)})
               .then((errors) =>{
               console.log(errors)
           })
    }
}
</script>
