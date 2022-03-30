<template>
    <div class="col-lg-12">
        <div style="height: 360px; overflow-y: auto" class="card">
            <div class="">
                <h6 class="text-muted px-3 py-2 text-uppercase">Commented Records</h6>
            </div>
            <div class="table-responsive font-12">
                <table class="table table-centered">
                    <thead class="thead-light">
                    <tr>
                        <th />
                        <th />
                        <th>#</th>
                        <th>Contributer Name</th>
                        <th>Comment</th>
                        <th>Date Added</th>
                        <th>Action</th>
                        <th />
                        <th />
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="comment in comments" :key="comment.id">
                        <td />
                        <td class="text-primary"></td>
                        <td class="font-weight-bolder">
                            {{ comment.id }}
                        </td>
                        <td class="font-weight-bolder">
                            {{ comment.contributer_name}}
                        </td>

                        <div class="text-primary font-weight-bolder">
                            <textarea class="form-control" v-model="comment.comment" rows="3">
                                    </textarea>
                        </div>
                        <td class="font-weight-bolder">
                            {{ comment.created_at }}
                        </td>

                        <td>
                            <router-link
                                :to="`/admin/correctRecord/${comment.id}`"
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
    data(){
        return{
            comments : [],
        };
    },
    mounted() {
        window.axios.get('notedRecords', this.comments).then((response) =>{
            this.comments = response.data.body.comments.data
            console.log(response)
        }).then((errors) =>{
            console.log(errors)
        });
    }
}
</script>
