<template>
 <div class="card  mt-4 shadow">
        <div class="card-header bg-dark text-white">
                今月の勉強内容
        </div>
    
       <div class="card-body">
     
    
        <div class="overflow-auto scroll-area">
            <div class="d-flex">
           
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="table_header"></th>
                        <th class="table_header">勉強内容</th>
                        <th class="table_header">勉強時間</th>
                        <th class="table_header">MEMO</th>
                       
                    </tr>
                </thead>
                <tbody>
                <tr v-for="(studyContent, index) in studyContents" :key="index">
                    <th class="align-middle py-auto">
                      <input type="checkbox" :value="studyContent" v-model="selectedStudyContents">
                    </th>
                   
                    <td class="table_data align-middle">{{ studyContent.content }}</td>
                    <td class="table_data align-middle">{{ studyContent.time }}</td>
                    <td class="table_data align-middle">{{ studyContent.memo }}</td>
                   
                    
                    
                </tr>
                </tbody>
            </table>
              <div class="col-md-12 text-center my-3">
              
                <button type="button" class="btn btn-primary" @click="deleteStudy" >削除する</button>
            </div>
            </div>
         </div>
    </div>
</div>
</template>

<script>


     export default {   
       
         data: function() {
            return {
                
              studyContents:[],
              selectedStudyContents:[]
            }    
        }, 
      
        methods: {
          
            
            fetchStudyContent() {
                
                axios.get('/api/fetchStudyContent')
                    .then((res) => {
                      this.studyContents = res.data;
                      this.loading = false;   
                      
                     
    
                    });
                
            },
            deleteStudy(){
                console.log(this.studyContents)
                 //axios.post('http://localhost:8000/registerTime', this.time)
                  axios.post('api/deleteStudy', {selectedStudyContents:this.selectedStudyContents})
                .then((res) => {

                   
                     
                       this.studyContents = res.data;
                       
                        
                        this.$router.push({name: 'delete'})
                        .catch(()=>{});
                    })
            
            },
          
            
              
    },
   mounted() {
            this.fetchStudyContent();
            
        }
  }
</script>