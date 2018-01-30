<template>
  <div>
    <myheader></myheader>
    <input type="text" v-model="msg" >
    <button @click="getGarden()">get the garden!</button>
    <p v-if="msg.length > 0 && svg.length > 0">
      user: {{msg}}
      <br/>
      <span v-html="svg"></span>
    </p>
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
      svg: '',
    };
  },
  methods: {
    getGarden() {
      const XHR = new XMLHttpRequest();
      const query = `http://localhost:8081/getGarden.php?username=${this.msg}`;
      XHR.open('GET', query, true);
      XHR.onreadystatechange = (() => {
        if (XHR.status === 200) {
          this.svg = XHR.responseText;
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
