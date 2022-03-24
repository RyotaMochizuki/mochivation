<template>
     
          
        <div>
        

            <div class="card text-black bg-white">
                 <div class="card-header">登録と変更</div>
                  <div class="card-body">
                        <div class="text-right">
                 <button type="button" class="btn btn-primary" @click="showTimeRegisterModal">目標時間登録</button>
                  <button type="button" class="btn btn-primary" @click="showTimeModifyModal">目標時間変更</button>
                   <button type="button" class="btn btn-primary" @click="showContentRegisterModal">目標内容登録</button>
                    <button type="button" class="btn btn-primary" @click="showContentModifyModal">目標内容編集</button>
                    </div>
                    </div>
            </div>
           

        
            <div class="card text-black bg-white mt-4 ">
                <div class="card-header">今月の目標</div>
                <div class="card-body">
            <h4>
            今月の目標勉強時間:<span class="sample2a">{{time}}</span>
            </h4>
            <h4>
            今月の勉強内容
            <div v-for="(content,index) in contents" :key="index">
                <span class="sample2a">・{{content.goal_content}}</span>
            </div>

            </h4>
                </div>

            </div>
            

        

            
          
         
       
            <modal name="timeRegister-modal" transition="nice-modal-fade" :min-width="200" :min-height="200" :pivot-y="0.5" ::adaptive="true" :scrollable="true" :reset="true" height="auto">
      <h4 class="pt-3 text-center">目標時間を登録する</h4>
       
            <div v-if="successMessage"  role="alert">
                {{ successMessage }}
            </div>
      <div class="row g-3 px-5">
          <form>
           <div class="col-8 mx-auto">
               <label for="number">勉強時間<span class="badge badge-danger">必須</span></label>
               <input type="number" class="form-control" id="number" v-model="time"  required>
               <div class="errorMessage"></div>
            </div>

         
            <div class="col-md-12 text-center my-3">
                <button type="button" class="btn btn-primary" @click="hideTimeRegisterModal">戻る</button>
                <button type="submit" class="btn btn-primary" @click="registerTime" >登録</button>
            </div>
            </form>
        </div>
            
       
      
  </modal>
  <modal name="timeModify-modal" transition="nice-modal-fade" :min-width="200" :min-height="200" :pivot-y="0.5" ::adaptive="true" :scrollable="true" :reset="true" height="auto">
      <h4 class="pt-3 text-center">目標時間を変更する</h4>
       <form v-on:submit.prevent="submit" novalidate ref="form">
            <div v-if="successMessage"  role="alert">
                {{ successMessage }}
            </div>
      <div class="row g-3 px-5">

           <div class="col-8 mx-auto">
               <label for="number">勉強時間<span class="badge badge-danger">必須</span></label>
               <input type="number" class="form-control" id="number" v-model="time"  required>
               <div class="errorMessage"></div>
            </div>

         
            <div class="col-md-12 text-center my-3">
                <button type="button" class="btn btn-primary" @click="hideTimeModifyModal">戻る</button>
                <button type="submit" class="btn btn-primary" :disabled="isDisabled">登録</button>
            </div>
        </div>
            
        </form>
      
  </modal>
  <modal name="contentRegister-modal" transition="nice-modal-fade" :min-width="200" :min-height="200" :pivot-y="0.5" ::adaptive="true" :scrollable="true" :reset="true" height="auto">
      <h4 class="pt-3 text-center">目標内容を登録する</h4>
       <form v-on:submit.prevent="submit" novalidate ref="form">
            <div v-if="successMessage"  role="alert">
                {{ successMessage }}
            </div>
      <div class="row g-3 px-5">

           <div class="col-8 mx-auto">
               <label for="number">勉強内容<span class="badge badge-danger">必須</span></label>
               <input type="text" class="form-control" id="number" v-model="content"  required>
               <div class="errorMessage"></div>
            </div>

         
            <div class="col-md-12 text-center my-3">
                <button type="button" class="btn btn-primary" @click="hideContentRegisterModal">戻る</button>
                <button type="submit" class="btn btn-primary" @click="registerContent">登録</button>
            </div>
        </div>
            
        </form>
      
  </modal>
  <modal name="contentModify-modal" transition="nice-modal-fade" :min-width="200" :min-height="200" :pivot-y="0.5" ::adaptive="true" :scrollable="true" :reset="true" height="auto">
      <h4 class="pt-3 text-center">目標内容を編集する</h4>
       <form v-on:submit.prevent="submit" novalidate ref="form">
            <div v-if="successMessage"  role="alert">
                {{ successMessage }}
            </div>
      <div class="row g-3 px-5">

           <div class="col-8 mx-auto">
               <label for="number">勉強内容<span class="badge badge-danger">必須</span></label>
               <input type="text" class="form-control" id="number" v-model="content"  required>
               <div class="errorMessage"></div>
            </div>

         
            <div class="col-md-12 text-center my-3">
                <button type="button" class="btn btn-primary" @click="hideContentModifyModal">戻る</button>
                <button type="submit" class="btn btn-primary" :disabled="isDisabled">登録</button>
            </div>
        </div>
            
        </form>
      
  </modal>
        </div>

           
       

</template>

<script>

     export default {
       
        data: function() {
            return {
                successMessage: '',
                manager:{},
                isDisabled: true,
                time:0,
                content:"",
                contents:[],
                goal:{},

               
            }
        
        },
        methods: {
           
             hideTimeRegisterModal() {
               this.$modal.hide('timeRegister-modal');
            },
             showTimeRegisterModal() {
               this.$modal.show('timeRegister-modal');
            },
             showTimeModifyModal() {
               this.$modal.show('timeModify-modal');
            },
             showContentRegisterModal() {
               this.$modal.show('contentRegister-modal');
            },
             showContentModifyModal() {
               this.$modal.show('contentModify-modal');
            },
            
             hideTimeModifyModal() {
               this.$modal.show('timeModify-modal');
            },
             hideContentRegisterModal() {
               this.$modal.show('contentRegister-modal');
            },
             hideContentModifyModal() {
               this.$modal.show('contentModify-modal');
            },
            registerTime(){
                
                 //axios.post('http://localhost:8000/registerTime', this.time)
                  axios.post('api/registerTime', this.time)
                .then((res) => {

                   
                      //  this.courses = res.data;
                       
                        
                        this.$router.push({name: 'setGoal'})
                        .catch(()=>{});
                    })
            
            },
            registerContent(){
                
                 //axios.post('http://localhost:8000/registerTime', this.time)
                  axios.post('api/registerContent', {content:this.content})
                .then((res) => {

                   
                      //  this.courses = res.data;
                       
                        
                        this.$router.push({name: 'setGoal'})
                        .catch(()=>{});
                    })
            
            },
            fetchThisGoal(){
                
                 //axios.post('http://localhost:8000/registerTime', this.time)
                  axios.get('api/fetchThisGoal')
                .then((res) => {

                   
                      this.time = res.data[0][0].goal_time;
                      let contents =res.data[1]
                       let data = []
                     contents.forEach(function(element){
                        
                     data.push(element)
                        });
                        this.contents = data;
                       
                        
                        this.$router.push({name: 'setGoal'})
                        .catch(()=>{});
                    })
            
            },
            
           
        },
         mounted() {
            
            this.fetchThisGoal();
        }
     }
</script>
