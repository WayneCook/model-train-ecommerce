<template>
  <div class="top-bar-container">
    <div class="top-bar-wrapper">

    <div class="top-bar-left">
      <ul>
        <li v-if='signedIn'>
          <a href='####'>username</a></li>
        <li v-else>
          <a href='####'><span class="flaticons flaticon-user"></span>Sign in</a>
        </li>
        <li>
          <a href='####'><span class="flaticons flaticon-heart"></span>My Wish List</a>
        </li>
      </ul>
    </div>
    <div class="top-bar-right">
      <ul>
        <li><a href='####'><span class="flaticons flaticon-info"></span>About us</a></li>
        <li><a href='####'><span class="flaticons flaticon-blogger-letter-logotype"></span>Blog</a></li>
      </ul>
    </div>
  </div>
  </div>
</template>

<script>

    export default {
      data(){
        return {
          signedIn: false
        }
      }
    }
</script>

<style scoped>

.top-bar-container {
  padding: 4px;
  position: absolute;
  width: 100%;
}

.top-bar-wrapper {
  margin: auto;
  max-width: 1200px;
  display: flex;
  flex-direction: row;
  padding: 0px 20px;
}

.top-bar-container div {
  flex-grow: 1;
}

ul {
  list-style-type: none;
  padding-left: 0px;
  margin-bottom: 0px;
}

ul li {
  display: inline-block;
  margin-right: 24px;
  color: hsla(0, 0%, 45%, 1);
}

ul li a {
  color: hsla(0, 0%, 52%, 1);
  font-size: 12px;
  font-family: 'Montserrat', sans-serif;
  font-weight: 500;
  text-shadow: 1px 1px 0px hsla(0, 0%, 100%, 0.75);
}

.flaticons {
  color: hsla(210, 67%, 20%, 0.9);
}


ul li a:hover {
  color: #2ab73a;
  text-decoration: none;
}

ul li a:hover .flaticons {
  color: #2ab73a;
}

.top-bar-right {
  display: flex;
  flex-direction: row;
  justify-content: flex-end;
}

.user-nav-icons {
  width: 127px;
  fill: pink;
}

.flaticons:before {
  font-size: 11px;
  margin-right: 5px;
  font-weight: 600;
}


</style>
