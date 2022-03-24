<template>
 <div class="card  mt-4 shadow">
        <div class="card-header bg-dark text-white">
                今月の勉強内容
        </div>
    
        <div class="card-body">
            

            <table class="table table-bordered table-hover" v-for ="(studyContent,index) in studyContents" :key="index">
                <tr>
                    <td class="sub-title" style="width:25%">勉強内容</td>
                    <input type="text" class="form-control" id="course" v-model="studyContent.content">
                    
               </tr>
               <tr>
                 <td class="sub-title" style="width:25%">勉強時間</td>
                
                    <td class="sub-title" style="width:75%">{{studyContent.time }}</td>
              
                </tr>
               <tr>
                 <td class="sub-title" style="width:25%">MEMO</td>
                
                    <td class="sub-title" style="width:75%">{{studyContent.memo}}</td>
              
                </tr>
                
            </table>

            <div class="col-md-12 text-center my-3">
              
                <button type="button" class="btn btn-primary" @click="submit" >編集する</button>
            </div>
            
        </div>
    </div>
</template>

<script>


     export default {   
       
         data: function() {
            return {
                
              studyContents:[],
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
            submit(){
                console.log(this.studyContents)
                 //axios.post('http://localhost:8000/registerTime', this.time)
                  axios.post('api/editStudy', {studyContents:this.studyContents})
                .then((res) => {

                   
                     
                       this.studyContents = res.data;
                       
                        
                        this.$router.push({name: 'edit'})
                        .catch(()=>{});
                    })
            
            },
          
            
              
    },
   mounted() {
            this.fetchStudyContent();
            
        }
  }
</script>