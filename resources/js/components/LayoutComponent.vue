<template>
   
       <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                        <button type="button" class="btn btn-primary">Primary</button>
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
        isActive: '',
      
       
     }
   },
   methods: {
      change: function(num){
          console.log('ok');
      this.isActive = num
      },
      submitTest(){
          console.log('a');
      }
   }
 }
 </script>