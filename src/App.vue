<template>
  <div>
    <myheader></myheader>
    <p v-if="msg.length > 0">
    {{msg}}
    </p>
    <p v-else>
      no text
    </p>
    <input type="text" v-model="msg" >
    <button @click="getGarden()">get the garden!</button>
  </div>
</template>

<script>
import myheader from './components/myheader';

export default {
  components: {
    myheader,
  },
  data() {
    return {
      msg: 'longtime1116',
    };
  },
  methods: {
    clear() {
      this.msg = '';
    },
    getGarden() {
      fetch(`http://localhost:8081/getGarden.php?url=https://github.com/users/${this.msg}/contributions`)
        .then((response) => {
          console.log(response);
          // let reader = response.body.getReader();
          // let chunk = 0;

          // reader.read().then(function processResult(result) {
          //   if (result.done) {
          //     console.log("complete")
          //     return "Fetch complete"
          //   }
          //   console.log(result.value);
          //   return reader.read().then(processResult)
          // })
          return response.body;
        }).then((data) => {
          console.log(data);
        });
    },
  },
};
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
