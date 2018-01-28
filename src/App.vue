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
      const XHR = new XMLHttpRequest();
      const query = `http://localhost:8081/getGarden.php?url=https://github.com/users/${this.msg}/contributions`;
      XHR.open('GET', query, true);
      XHR.onreadystatechange = (() => {
        if (XHR.status === 200) {
          console.log(XHR.responseText);
        }
      });
      XHR.send(null);
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
