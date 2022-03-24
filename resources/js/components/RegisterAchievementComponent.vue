<template>
     
          
        <div>
        

           <form v-on:submit.prevent="submit" novalidate ref="form">
            <div class="col-8 mx-auto">
            
               <label for="course">勉強内容</label>
                <input type="text" class="form-control" id="course" v-model="content">
               </div>
             <div class="col-8 mx-auto">
            
               <label for="course">勉強時間</label>
                <input type="number" class="form-control" id="course" v-model="time"  required>
               </div>
               <div class="col-8 mx-auto">
            
               <label for="course">MEMO</label>
                <textarea class="form-control" id="floatingTextarea" v-model="memo"></textarea>
               </div>
            <div class="col-md-12 text-center my-3">
              
                <button type="button" class="btn btn-primary" @click="submit" >登録</button>
            </div>
        </form>
        

            
        </div>

           
       

</template>

<script>

     export default {
       
        data: function() {
            return {
               
                memo:"",
                time:0,
                content:"",
                

               
            }
        
        },
        methods: {
           
            
            submit(){
                
                 //axios.post('http://localhost:8000/registerTime', this.time)
                  axios.post('api/submitStudy', {time:this.time,content:this.content,memo:this.memo})
                .then((res) => {

                   
                      //  this.courses = res.data;
                       
                        
                        this.$router.push({name: 'register'})
                        .catch(()=>{});
                    })
            
            },
          
            
           
        },
         mounted() {
            
         
        }
     }
</script>
