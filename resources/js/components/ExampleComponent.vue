<template>
    
    <div class="container">
        <div class="hamburger_btn" v-on:click='ActiveBtn=!ActiveBtn'>
      <span class="line line_01" v-bind:class="{'btn_line01':ActiveBtn}"></span>
      <span class="line line_02" v-bind:class="{'btn_line02':ActiveBtn}"></span>
      <span class="line line_03" v-bind:class="{'btn_line03':ActiveBtn}"></span>
    </div>
    <!--サイドバー-->
    <transition name="menu">
      <div class="menu" v-show="ActiveBtn">
          <ul>
               <li><router-link  :to="{name: 'top'}"><a href="#">トップ画面</a></router-link></li>
              <li><router-link  :to="{name: 'setGoal'}"><a href="#">目標設定</a></router-link></li>
              <li><router-link  :to="{name: 'register'}"><a href="#">勉強内容登録</a></router-link></li>
              <li><router-link  :to="{name: 'edit'}"><a href="#">勉強内容編集</a></router-link></li>
              <li><router-link  :to="{name: 'delete'}"><a href="#">勉強内容削除</a></router-link></li>
              <li><router-link  :to="{name: 'achieve'}"><a href="#">過去実績</a></router-link></li>
          </ul>
      </div>
      
  </transition>
  </div>
  
       
    
</template>

<script>
    export default {
         data: function() {
    return {
        ActiveBtn: false

    }
         },
        mounted() {
            console.log('Component mounted.')
             this.$router.push({name: 'top'})

        }
    }
</script>
