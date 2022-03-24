<template>
     
          
        <div>
        

           <form v-on:submit.prevent="submit" novalidate ref="form">
            <div class="col-8 mx-auto">
            
               <label for="course">目標時間</label>
                <span class="sample2a">{{goalTime}}</span>
               </div>
             <div class="col-8 mx-auto">
            
               <label for="course">目標内容</label>
                <div v-for="(goalContent,index) in goalContents" :key="index">
                <span class="sample2a">・{{goalContent.goal_content}}</span>
            </div>
               </div>
               <div class="col-8 mx-auto">
            
               <label for="course">今月の勉強内容</label>
               <div v-for="(studyContent,index) in studyContents" :key="index">
                <span class="sample2a">・{{studyContent.content}}</span>
            </div>

            <div class="col-8 mx-auto">
            
               <label for="course">今月の勉強時間</label>
                <span class="sample2a">{{studyTime}}</span>
               </div>
                
               </div>
           
        </form>
        

            
        </div>

           
       

</template>

<script>

     export default {
       
        data: function() {
            return {
               
                studyContents:[],
                goalTime:null,
                goalContents:[],
                studyTime:null,


                

               
            }
        
        },
        methods: {
           
            
           fetchThisGoal(){
                
                 //axios.post('http://localhost:8000/registerTime', this.time)
                  axios.get('api/fetchThisGoal')
                .then((res) => {

                   
                      this.goalTime = res.data[0][0].goal_time;
                      let contents =res.data[1]
                       let data = []
                     contents.forEach(function(element){
                        
                     data.push(element)
                        });
                        this.goalContents = data;
                       
                        
                       
                        
                    })
            
            },
            fetchStudyContent() {
                
                axios.get('/api/fetchStudyContent')
                    .then((res) => {
                      this.studyContents = res.data;
                      console.log(this.studyContents)
                      this.loading = false;   

                      this.sumStudyTime();
                      
                     
    
                    });
                
            },
            sumStudyTime(){

                 let studyTime = 0;
                 let studyContents = [];
                 studyContents = this.stduyContents
                this.studyContents.forEach(function(element){
                    
                    studyTime += element.time
                })
                this.studyTime = studyTime

            },

          
            
           
        },
         mounted() {

              this.fetchStudyContent();
                this.fetchThisGoal();
         
        }
     }
</script>
